<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'verify' => $this->verify,
            'rating' => $this->rating,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'calls_allowed' => $this->calls_allowed,
            'driver' => new DriverDocumentResource($this->driver),
            'photos' => MediaResource::collection($this->media),
        ];
    }
}
