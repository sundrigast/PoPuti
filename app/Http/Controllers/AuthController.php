<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ConfirmationRequest;
use App\Http\Requests\Auth\Request as AuthRequest;
use App\Http\Resources\User\UserResource;
use App\Models\PhoneVerification;
use App\Models\User;
use BonchDev\SMSRUSDK\RequestException;
use BonchDev\SMSRUSDK\SendException;
use BonchDev\SMSRUSDK\SMS as SMSService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * @group Auth
 *
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @var SMSService
     */
    private $SMSService;

    /**
     * Auth Request
     * register User with phone and request code from SMS.ru
     *
     * @param AuthRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function auth(AuthRequest $request)
    {
        $validated = $request->validated();

        $user = User::firstOrCreate([
            'phone' => $validated['phone']
        ]);

        $code = random_int(1000, 9999);

        $phoneVerification = new PhoneVerification([
            'code' => $code
        ]);

        $sms = $this->SMSService
            ->to($validated['phone'])
            ->msg($code);

        try {                                //sending SMS
            $sms->send();
        } catch (RequestException $exception) {
            Log::error(
                json_encode($exception->getJsonResponse(), JSON_UNESCAPED_UNICODE)
            );

            return response()->json([
                'message' => $exception->getMessage()
            ], 502);
        } catch (SendException $exception) {
            Log::error(
                json_encode($exception->getFailedMessages(), JSON_UNESCAPED_UNICODE)
            );

            return response()->json([
                'message' => __('auth.sms_failed')
            ], 502);
        }

        $user->verifications()->save(
            $phoneVerification
        );

        return response()->json([
            'message' => __('auth.await_confirm')
        ], 201);
    }

    /**
     * Login User
     * [Login User with verification code and return access token]
     *
     * @param ConfirmationRequest $request
     * @return JsonResponse
     */
    public function login(ConfirmationRequest $request)
    {
        $credentials = $request->only(['phone', 'code']);

        $user = User::where('phone', $credentials['phone'])
            ->first();

        if (!$user) {
            return response()->json([
                'message' => __('user.not_found')
            ], 404);
        }

        if ($user->verifications()->count() === 0) {
            return response()->json([
                'message' => __('code.not_send')
            ], 401);
        }

        if ($user->last_verification->code != $credentials['code']) {
            return response()->json([
                'message' => __('code.wrong_code')
            ], 401);
        }

        $token = $user->createToken($user->phone);

        return response()->json([
            'access_token' => $token->plainTextToken
        ]);
    }

    /**
     * Check User and return User's information
     * @authenticated
     *
     * @return UserResource
     */
    public function check(Request $request)
    {
        return new UserResource(
            $request->user()
        );
    }

    /**
     * Logout
     * @authenticated
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([
            'message' => __('auth.logout')
        ]);
    }

}
