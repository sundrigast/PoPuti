<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Driver
 *
 * @bodyParam car_brand string Driver's car brand. Example: Toyota
 * @bodyParam car_model string Driver's car model. Example: Corolla
 * @bodyParam car_number string Driver's car number. Example: c123cc
 * @bodyParam drivers_license string Document confirming the right to drive vehicles. Example: 1234543234567
 * @bodyParam passport string Identity document. Example: 12 34 567890
 * @bodyParam registration string Document containing information about the vehicle. Example: 1234567788
 * @bodyParam longitude float longitude Driver location coordinates. Example: 30.3446761
 * @bodyParam latitude float latitude Driver location coordinates. Example: 59.932809
 * @bodyParam verify bool Driver verification status.
 * @bodyParam document array Array of used uploaded photos of documents.
 * @bodyParam document.* int Id of uploaded photos of documents.
 *
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $city
 * @property boolean $verify
 * @property int[]|array $photo
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
            'passport' => 'string|nullable',
            'drivers_license' => 'string|nullable',
            'car_brand' => 'string|nullable',
            'car_model' => 'string|nullable',
            'car_number'=> 'string|nullable',
            'registration'=> 'string|nullable',
            'verify' => 'boolean',
            'document' => 'array',
            'document.*' => 'exists:media,id'
        ];
    }
}
