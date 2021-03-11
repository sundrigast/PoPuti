<?php

namespace App\Http\Controllers;

use App\Events\CancelOffer;
use App\Events\PriceOffer;
use App\Http\Resources\Ride\OfferResource;
use App\Models\Offer;
use App\Http\Requests\Ride\OfferStoreRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Ride
 *
 * Class OfferController
 * @package App\Http\Controllers
 */
class OfferController extends Controller
{
    /**
     * Create a price offer
     * @authenticated
     *
     * @param OfferStoreRequest $request
     * @return JsonResponse
     */
    public function store(OfferStoreRequest $request)
    {
        $validated = $request->validated();

        $offer = Offer::create(
            $validated
        );

        event(new PriceOffer($offer));

        return response()->json([
            'offer' => new OfferResource($offer)
        ], 201);
    }

    /**
     * Delete offer
     * @authenticated
     *
     * @param Offer $offer
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Offer $offer)
    {
        event(new CancelOffer($offer));

        $offer->delete();

        return response()->json([
            'message' => __('offer.decline'),
            'offer' => $offer
        ], 201);
    }
}
