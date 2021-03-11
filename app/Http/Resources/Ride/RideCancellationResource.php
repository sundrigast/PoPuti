<?php

namespace App\Http\Resources\Ride;

use Illuminate\Http\Resources\Json\JsonResource;

class RideCancellationResource extends JsonResource
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
            'text' => $this->text,
            'by_passenger' => $this->by_passenger
        ];
    }
}
