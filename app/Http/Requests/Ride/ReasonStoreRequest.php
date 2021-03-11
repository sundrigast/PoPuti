<?php

namespace App\Http\Requests\Ride;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ReasonStoreRequest
 * @package App\Http\Requests\Ride
 *
 * @bodyParam ride_id int required Ride id for cancellation. Example: 1
 * @bodyParam by_passenger bool required Whether the ride was canceled by the passenger. Example: true
 * @bodyParam text string Reason for cancellation. Example: The driver did not arrive
 */
class ReasonStoreRequest extends FormRequest
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
            'text' => 'string|nullable',
            'by_passenger' => 'boolean',
            'ride_id' => 'required|exists:rides,id|integer'
        ];
    }
}
