<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;


/**
 * Class StoreRequest
 * @package App\Http\Requests\Driver
 *
 * @bodyParam user_id int required User id to register as a driver. Example: 1
 * @bodyParam car_brand string required Driver's car brand. Example: Toyota
 * @bodyParam car_model string required Driver's car model. Example: Corolla
 * @bodyParam car_number string required Driver's car number. Example: c123cc
 * @bodyParam drivers_license string Document confirming the right to drive vehicles. Example: 1234543234567
 * @bodyParam passport string Identity document. Example: 12 34 567890
 * @bodyParam registration string Document containing information about the vehicle. Example: 1234567788
 * @bodyParam longitude numeric longitude Driver location coordinates. Example: 30.3446761
 * @bodyParam latitude numeric latitude Driver location coordinates. Example: 59.932809
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
            'user_id' => 'required|exists:users,id',
            'car_brand' => 'required|string',
            'car_model' => 'required|string',
            'car_number'=> 'required|string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'document' => 'array',
            'document.*' => 'exists:media,id|integer'
        ];
    }
}
