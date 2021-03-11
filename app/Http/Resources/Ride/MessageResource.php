<?php

namespace App\Http\Resources\Ride;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'author' => new PassengerResource($this->author),
            'text' => $this->text,
            'created_at' => Carbon::parse($this->created_at)->toTimeString(),
            'is_read' => $this->is_read
        ];
    }
}
