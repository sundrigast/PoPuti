<?php

namespace App\Http\Controllers;

use App\Events\DriverLocation;
use App\Http\Requests\Driver\LocationRequest;
use App\Http\Resources\Driver\DriverLocationResource;
use App\Models\Driver;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Driver\StoreRequest;
use App\Http\Requests\Driver\UpdateRequest;
use App\Http\Resources\Driver\DriverVerifyResource;
use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Driver
 *
 * Class DriverController
 * @package App\Http\Controllers
 */
class DriverController extends Controller
{

    /**
     * Show unverified drivers
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return DriverVerifyResource::collection(
            Driver::verify(false)
                ->paginate()
        );
    }

    /**
     * Create Driver
     * [User registration as a driver]
     * @authenticated
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $authUser = auth()->user();

        $driver = $authUser->driver()->create(
            $validated
        );

        $driver->attachMedia($request->document);

        return response()->json([
            'driver' => $driver
        ], 201);
    }

    /**
     * Show driver
     *
     * @param Driver $driver
     * @return DriverVerifyResource
     */
    public function show(Driver $driver)
    {
        return new DriverVerifyResource(
            $driver
        );
    }

    /**
     * Update the driver information.
     * @authenticated
     *
     * @param UpdateRequest $request
     * @param Driver $driver
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Driver $driver)
    {
        $validated = $request->validated();

        $driver->update(
            $validated
        );

        $driver->attachMedia($request->document);

        return response()->json([
            'driver' => $driver
        ], 201);
    }

    /**
     * Show driver's documents
     *
     * @param Driver $driver
     * @return AnonymousResourceCollection
     */
    public function documents(Driver $driver)
    {
        return MediaResource::collection(
            $driver->media
        );
    }

    /**
     * Send driver location
     * @authenticated
     *
     * @param LocationRequest $request
     * @param Driver $driver
     * @return JsonResponse
     */
    public function location(LocationRequest $request, Driver $driver)
    {
        $driver->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        $driver->save();

        event(new DriverLocation($driver));

        return response() -> json([
            'location' => new DriverLocationResource($driver)
        ]);
    }
}
