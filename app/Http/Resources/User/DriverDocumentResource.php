<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverDocumentResource extends JsonResource
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
            'verify' => $this->verify,
            'passport' => $this->passport,
            'drivers_license' => $this->drivers_license,
            'car_brand' => $this->car_brand,
            'car_model' => $this->car_model,
            'car_number' => $this->car_number,
            'registration' => $this->registration,
            
        ];
    }
}
