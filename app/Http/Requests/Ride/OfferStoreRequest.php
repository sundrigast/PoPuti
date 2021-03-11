<?php

namespace App\Http\Requests\Ride;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OfferStoreRequest
 * @package App\Http\Requests\Ride
 *
 * @bodyParam driver_id int required User id who offers new ride price. Example: 1
 * @bodyParam ride_id int required Ride id to offer a new price. Example: 1
 * @bodyParam price int required Price offer. Example: 300
 */
class OfferStoreRequest extends FormRequest
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
            'price' => 'required|integer',
            'driver_id' => 'required|exists:users,id|integer',
            'ride_id' => 'required|exists:rides,id|integer'
        ];
    }
}
