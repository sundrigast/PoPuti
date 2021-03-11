<?php

namespace App\Http\Resources\Ride;

use App\Http\Resources\Driver\DriverLocationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'from_lat' => $this->from_lat,
            'from_lng' => $this->from_lng,
            'position' => $this->position,
            'to_lat' => $this->to_lat,
            'to_lng' => $this->to_lng,
            'destination' => $this->destination,
            'price' => $this->price,
            'comment' => $this->comment,
            'start_at' => $this->start_at,
            'finish_at' => $this->finish_at,
            'duration' => $this->ride_duration,
            'passenger' => new PassengerResource($this->passenger),
            'driver' => new DriverResource($this->driver),
            'status_id' => $this->status->id,
            'status' => $this->status->name,
            'reason' => new RideCancellationResource($this->reasonForCancellation)
        ];
    }
}
