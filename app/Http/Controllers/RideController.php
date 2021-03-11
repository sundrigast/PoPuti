<?php

namespace App\Http\Controllers;

use App\Events\PriceOffer;
use App\Events\RideChange;
use App\Events\RideCreate;
use App\Http\Filters\RideFilter;
use App\Http\Requests\Ride\UpdateRequest;
use App\Http\Requests\Ride\StoreRequest;
use App\Http\Resources\Ride\MessageResource;
use App\Http\Resources\Ride\OfferResource;
use App\Http\Resources\Ride\RideResource;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Ride;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Ride
 *
 * Class RideController
 * @package App\Http\Controllers
 */
class RideController extends Controller
{
    /**
     * Show all rides with filters
     * @queryParam status Filtering (searching) by ride status. Example:1
     * @queryParam date Filtering (searching) by dateTime ranges. Example: date[0] = '2020-01-01 00:00:00'; date[1] = '2020-01-01 12:30:00';
     * @queryParam rating Filtering (searching) by ride city. Example: Moscow
     * @queryParam duration Filtering (searching) by ride duration (hh:mm). Example: 02:11
     * @queryParam rating Filtering (searching) by price ranges. Example: price[0] = 1; price[1] = 4
     * @queryParam member Filtering (searching) by ride participant. Example: member[0] = Ivan; member[1] = Ivanov
     *
     * @param RideFilter $filters
     * @return AnonymousResourceCollection
     */
    public function index(RideFilter $filters)
    {
        return RideResource::collection(
            Ride::filter($filters)
                ->paginate()
        );
    }

    /**
     * Create ride
     * @authenticated
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $authUser = auth()->user();

        $ride = $authUser->ridesAsPassenger()->create(
            $validated
        );

        if ($ride->status_id == 1) {
            event(new RideCreate($ride));
        }

        return response() -> json([
            'message' => __('ride.create'),
            'ride' => $ride
        ], 201);
    }

    /**
     * Show ride
     *
     * @param Ride $ride
     * @return RideResource
     */
    public function show(Ride $ride)
    {
        return new RideResource(
            $ride
        );
    }

    /**
     * Update the ride information.
     * @authenticated
     *
     * @param UpdateRequest $request
     * @param Ride $ride
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(UpdateRequest $request, Ride $ride)
    {
        $validated = $request->validated();

        $ride->update(
            $validated
        );

        if ($request->status_id == 2){
            $ride->start_at = Carbon::now()->toDateTimeString();
        }

        if ($request->status_id == 5){
            $ride->finish_at = Carbon::now()->toDateTimeString();
            $ride->ride_duration = (new Carbon($ride->finish_at))
                ->diff(new Carbon($ride->start_at))->format('%H:%M:%S');
        }

        $ride->save();

        event(new RideChange($ride));

        return response()->json([
            'message' => __('ride.change'),
            'ride' => new RideResource(
                $ride
            )
        ], 201);
    }

    /**
     * Show ride price offers
     *
     * @param Ride $ride
     * @return AnonymousResourceCollection
     */
    public function offers(Ride $ride)
    {
        return OfferResource::collection(
            $ride->priceOffers
        );
    }

    /**
     * Show ride chat
     *
     * @param Ride $ride
     * @return AnonymousResourceCollection
     */
    public function chat(Ride $ride)
    {
        return MessageResource::collection(
            $ride->messages
        );
    }
}
