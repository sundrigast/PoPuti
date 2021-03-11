<?php

namespace App\Http\Controllers;

use App\Http\Resources\Ride\RideCancellationResource;
use App\Models\Reason;
use App\Http\Requests\Ride\ReasonStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Ride
 *
 * Class ReasonController
 * @package App\Http\Controllers
 */
class ReasonController extends Controller
{
    /**
     * Create a reason for canceling a trip
     * @authenticated
     *
     * @param ReasonStoreRequest $request
     * @return JsonResponse
     */
    public function store(ReasonStoreRequest $request)
    {
        $validated = $request->validated();

        $reason = Reason::create(
            $validated
        );

        return response()->json([
            'reason' => new RideCancellationResource($reason)
        ], 201);
    }
}
