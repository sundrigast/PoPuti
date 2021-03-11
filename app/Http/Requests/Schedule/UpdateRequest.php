<?php

namespace App\Http\Requests\Schedule;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Schedule
 *
 * @bodyParam monday bool Monday availability on schedule.
 * @bodyParam tuesday bool Tuesday availability on schedule.
 * @bodyParam wednesday bool Wednesday availability on schedule.
 * @bodyParam thursday bool Thursday availability on schedule.
 * @bodyParam friday bool Friday availability on schedule.
 * @bodyParam saturday bool Saturday availability on schedule.
 * @bodyParam sunday bool Sunday availability on schedule.
 * @bodyParam time date Time for schedule(format:H:i).
 * @bodyParam ride_id int Ride id for ride schedule. Example: 1
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
            'monday' => 'boolean|nullable',
            'tuesday' => 'boolean|nullable',
            'wednesday' => 'boolean|nullable',
            'thursday' => 'boolean|nullable',
            'friday' => 'boolean|nullable',
            'saturday' => 'boolean|nullable',
            'sunday' => 'boolean|nullable',
            'time' => 'date_format:H:i|nullable'

        ];
    }
}
