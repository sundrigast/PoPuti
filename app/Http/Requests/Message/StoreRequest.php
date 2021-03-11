<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Message
 *
 * @bodyParam author_id int required User id which message author. Example: 1
 * @bodyParam ride_id int required Ride id to send a message to ride member. Example: 1
 * @bodyParam text string required Message text. Example: hello
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
            'text' => 'required|string',
            'author_id' => 'required|exists:users,id|integer',
            'ride_id' => 'required|exists:rides,id|integer',
        ];
    }
}
