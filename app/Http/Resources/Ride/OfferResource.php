<?php

namespace App\Http\Resources\Ride;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
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
            'driver_id' => new DriverResource($this->driver),
            'price' => $this->price,
            'created_at' => Carbon::parse($this->created_at)->toDateTimeString(),
        ];
    }
}
