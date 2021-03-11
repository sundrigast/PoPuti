<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserLoginRequest
 * @package App\Http\Requests\User
 *
 * @bodyParam  email string required Email of register user to login. Example: mail@gmail.com
 * @bodyParam  password string required Password of registered user to login. Example: 1234qwer
 *
 *  @property string $email
 *  @property string $password
 */
class UserLoginRequest extends FormRequest
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
            'email' => 'required|string',
            'password' => 'required|string'
        ];
    }
}
