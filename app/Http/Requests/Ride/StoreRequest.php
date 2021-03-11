<?php

namespace App\Http\Requests\Ride;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Ride
 *
 * @bodyParam user_id int required User id being a passenger. Example: 1
 * @bodyParam status_id int RideStatus id for ride status. Example: 1
 * @bodyParam price int required Price for ride. Example: 300
 * @bodyParam comment string Comment on the ride. Example: Passenger with a child.
 * @bodyParam city string required City of ride. Example: Moscow
 * @bodyParam position string required Position address. Example: "223127, Амурская область, город Чехов, пр. Ломоносова, 36"
 * @bodyParam from_lat numeric required Position latitude. Example: 59.090273,
 * @bodyParam from_lng numeric required Position longitude. Example: 30.075711,
 * @bodyParam destination string required Destination address. Example: "738200, Самарская область, город Пушкино, ул. Балканская, 52"
 * @bodyParam to_lat numeric required Destination latitude. Example: 59.090273,
 * @bodyParam to_lng numeric required Destination longitude. Example: 30.075711,
 */
class StoreRequest extends FormRequest
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
            'position' => 'required|string',
            'from_lat' => 'required|numeric',
            'from_lng' => 'required|numeric',
            'city' => 'required|string',
            'destination' => 'required|string',
            'to_lat' => 'required|numeric',
            'to_lng' => 'required|numeric',
            'price' => 'required|integer',
            'comment' => 'string|nullable',
            'user_id' => 'required|exists:users,id|integer',
            'status_id' => 'exists:ride_statuses,id|integer',
        ];
    }
}
