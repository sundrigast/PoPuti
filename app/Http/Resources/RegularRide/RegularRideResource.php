<?php

namespace App\Http\Resources\RegularRide;

use Illuminate\Http\Resources\Json\JsonResource;

class RegularRideResource extends JsonResource
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
            'city' => $this->city,
            'from_lat' => $this->from_lat,
            'from_lng' => $this->from_lng,
            'position' => $this->position,
            'to_lat' => $this->to_lat,
            'to_lng' => $this->to_lng,
            'destination' => $this->destination,
            'price' => $this->price,
            'comment' => $this->comment,
            'status' => $this->status->name,
            'schedule' => new ScheduleResource($this->schedule)
        ];
    }
}
