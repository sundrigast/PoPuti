<?php

namespace App\Http\Resources\Ride;

use App\Http\Resources\Driver\DriverCarResource;
use App\Http\Resources\Driver\DriverLocationResource;
use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'rating' => $this->rating,
            'phone' => $this->phone,
            'car' => new DriverCarResource($this->driver),
            'driver_location' => new DriverLocationResource($this->driver),
            'photos' => MediaResource::collection($this->media),
        ];
    }
}
