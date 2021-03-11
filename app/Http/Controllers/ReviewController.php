<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\UpdateRequest;
use App\Http\Requests\Review\StoreRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Review
 *
 * Class ReviewController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
    /**
     * Create user review
     * @authenticated
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $authUser = auth()->user();

        $review = $authUser->authorReview()->create(
            $validated
        );

        return response()->json([
            'review' => $review
        ], 201);
    }
}
