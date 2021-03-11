<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegularRide\RegularRideResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\Ride\RideResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group User (authorized)
 * @authenticated
 *
 * Authorized User Information: self, history, regular rides
 *
 * Class AuthUserController
 * @package App\Http\Controllers
 */
class AuthUserController extends Controller
{
    /**
     * Show authenticated user
     * @authenticated
     *
     * @return UserResource
     */
    public function showMe()
    {
        return UserResource::make(
            Auth::user()
        );
    }

    /**
     * Rides history as a driver
     * @authenticated
     *
     * @return AnonymousResourceCollection
     */
    public function driverHistory()
    {
        $user = auth()->user();

        return RideResource::collection(
            $user->ridesAsDriver
        );
    }

    /**
     * Rides history as a passenger
     * @authenticated
     *
     * @return AnonymousResourceCollection
     */
    public function passengerHistory()
    {
        $user = auth()->user();

        return RideResource::collection(
            $user->ridesAsPassenger()
                ->doesntHave('schedule')
                ->get()
        );
    }

    /**
     * Show reviews for an authorized user
     * @authenticated
     *
     * @return AnonymousResourceCollection
     */
    public function reviews()
    {
        $user = auth()->user();

        return ReviewResource::collection(
            $user->addresseeReview
        );
    }

    /**
     * Show regular rides
     * @authenticated
     *
     * @return AnonymousResourceCollection
     */
    public function regularRides()
    {
        $user = auth()->user();

        return RegularRideResource::collection(
            $user->ridesAsDriver()
                ->with('schedule')
                ->whereStatusId(7)
                ->get()
        );
    }

    /**
     * Show archived regular rides
     * @authenticated
     *
     * @return AnonymousResourceCollection
     */
    public function regularRidesArchived()
    {
        $user = auth()->user();

        return RegularRideResource::collection(
            $user->ridesAsDriver()
                ->with('schedule')
                ->whereStatusId(8)
                ->get()
        );
    }
}
