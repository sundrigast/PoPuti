<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilter;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group User
 *
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Show all users with filters
     * @queryParam city Filtering (searching) by user city. Example: Moscow
     * @queryParam verify Filtering (searching) by user verification (true or false string). No-example
     * @queryParam phone Filtering (searching) by user phone. No-example
     * @queryParam name Filtering (searching) by user name. Example: name[0] = Ivan; name[1] = Ivanov
     * @queryParam rating Filtering (searching) by rating ranges. rating[0] = 1; rating[1] = 4
     * @queryParam driver Filtering (searching) for driver registration (true or false string). No-example
     *
     * @param UserFilter $filters
     * @return UserResource|AnonymousResourceCollection
     */
    public function index(UserFilter $filters)
    {
        return UserResource::collection(
            User::filter($filters)
                ->paginate()
        );
    }

    /**
     * Show user
     *
     * @param User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource(
            $user
        );
    }

    /**
     * Update user
     * @authenticated
     *
     * @param UpdateRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update(
            $request->validated()
        );

        $user->attachMedia($request->photo);

        return response()->json([
            'message' => __('user.change'),
            'user' => new UserResource($user)
        ], 201);
    }


    /**
     * Login to admin panel
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return response()->json([
                'message' => __('user.not_found')
            ], 404);
        }

        if ($user->password == null) {
            return response()->json([
                'message' => __('user.dont_have_access.')
            ], 403);
        }

        if ($user->password != $request->password) {
            return response()->json([
                'message' => __('wrong_data.')
            ], 401);
        }

        $token = $user->createToken('Personal Access Token');

        return response()->json([
            'access_token' => $token->plainTextToken
        ]);
    }

    /**
     * Show reviews for user
     *
     * @param User $user
     * @return AnonymousResourceCollection
     */
    public function reviews(User $user)
    {
        return ReviewResource::collection(
            $user->addresseeReview
        );
    }
}
