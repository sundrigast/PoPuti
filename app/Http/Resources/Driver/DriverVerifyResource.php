<?php

namespace App\Http\Resources\Driver;

use App\Http\Resources\MediaResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverVerifyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws \Exception
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'verify' => $this->verify,
            'updated_at' => Carbon::parse($this->updated_at)->toDateTimeString(),
            'passport' => $this->passport,
            'drivers_license' => $this->drivers_license,
            'car_brand' => $this->car_brand,
            'car_model' => $this->car_model,
            'car_number' => $this->car_number,
            'registration' => $this->registration,
            'documents' => MediaResource::collection($this->media),
        ];
    }
}
