<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ConfirmationRequest
 * @package App\Http\Requests\Auth
 *
 * @bodyParam phone string required User's phone. Example: +79998880123
 * @bodyParam code int required Auth code. Example: 1234
 *
 * @property string $phone
 * @property int $code
 */
class ConfirmationRequest extends FormRequest
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
            'phone' => 'required|exists:users,phone',
            'code' => 'required|integer|exists:phone_verifications,code'
        ];
    }
}
