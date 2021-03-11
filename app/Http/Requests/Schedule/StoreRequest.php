<?php

namespace App\Http\Requests\Schedule;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Schedule
 *
 * @bodyParam monday bool required Monday availability on schedule.
 * @bodyParam tuesday bool required Tuesday availability on schedule.
 * @bodyParam wednesday bool required Wednesday availability on schedule.
 * @bodyParam thursday bool required Thursday availability on schedule.
 * @bodyParam friday bool required Friday availability on schedule.
 * @bodyParam saturday bool required Saturday availability on schedule.
 * @bodyParam sunday bool required Sunday availability on schedule.
 * @bodyParam time date required Time for schedule(format:H:i).
 * @bodyParam ride_id int Ride id for ride schedule. Example: 1
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
            'monday' => 'required|boolean',
            'tuesday' => 'required|boolean',
            'wednesday' => 'required|boolean',
            'thursday' => 'required|boolean',
            'friday' => 'required|boolean',
            'saturday' => 'required|boolean',
            'sunday' => 'required|boolean',
            'time' => 'required|date_format:H:i',
            'ride_id' => 'required|exists:rides,id|integer'
        ];
    }
}
