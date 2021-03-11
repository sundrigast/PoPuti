<?php

namespace App\Http\Requests\Ride;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Ride
 *
 * @bodyParam driver_id int required User id being a driver. Example: 1
 * @bodyParam status_id int RideStatus id for ride status. Example: 1
 * @bodyParam price int Price for ride. Example: 300
 * @bodyParam comment string Comment on the ride. Example: Passenger with a child.
 * @bodyParam city string required City of ride. Example: Moscow
 * @bodyParam position string Position address. Example: "223127, Амурская область, город Чехов, пр. Ломоносова, 36"
 * @bodyParam from_lat numeric Position latitude. Example: 59.090273,
 * @bodyParam from_lng numeric Position longitude. Example: 30.075711,
 * @bodyParam destination string Destination address. Example: "738200, Самарская область, город Пушкино, ул. Балканская, 52"
 * @bodyParam to_lat numeric Destination latitude. Example: 59.090273,
 * @bodyParam to_lng numeric Destination longitude. Example: 30.075711,
 * @bodyParam start_at date Destination latitude. Example: '2020-01-01 00:00:00',
 * @bodyParam finish_at date required Destination longitude. Example: '2020-01-01 10:30:00',
 */
class UpdateRequest extends FormRequest
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
            'position' => 'string',
            'from_lat' => 'numeric',
            'from_lng' => 'numeric',
            'city' => 'string',
            'destination' => 'string',
            'to_lat' => 'numeric',
            'to_lng' => 'numeric',
            'price' => 'integer',
            'comment' => 'string|nullable',
            'driver_id' => 'exists:users,id|integer',
            'status_id' => 'exists:ride_statuses,id|integer',
            'start_at' => 'date|nullable',
            'finish_at' => 'date|nullable',
        ];
    }
}
