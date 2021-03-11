<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LocationRequest
 * @package App\Http\Requests\Driver
 *
 * @bodyParam longitude float longitude Driver location coordinates. Example: 30.3446761
 * @bodyParam latitude float latitude Driver location coordinates. Example: 59.932809
 *
 * @property float $latitude
 * @property float $longitude
 */
class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'latitude' => 'numeric',
            'longitude' => 'numeric',
        ];
    }
}
