<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\User
 *
 * @bodyParam first_name string User's first name.
 * @bodyParam last_name string  User's first surname.
 * @bodyParam email string Email of register user. Example: mail@gmail.com
 * @bodyParam city string User location city. Example: Moscow
 * @bodyParam verify bool User verification status.
 * @bodyParam calls_allowed bool Allowing the user to call him.
 * @bodyParam photo array Array of used uploaded photos.
 * @bodyParam photo.* int Id of uploaded photo.
 *
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $city
 * @property bool $verify
 * @property bool $calls_allowed
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
            'first_name' => 'string',
            'last_name' => 'string',
            'email' => 'string|nullable',
            'city' => 'string|nullable',
            'calls_allowed' => 'boolean',
            'verify' => 'boolean',
            'photo' => 'array',
            'password' => 'string|nullable',
            'photo.*' => 'exists:media,id|integer'
        ];
    }
}
