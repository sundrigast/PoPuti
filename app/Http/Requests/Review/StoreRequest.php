<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 * @package App\Http\Requests\Review
 *
 * @bodyParam from_id int required User id Review sender. Example: 1
 * @bodyParam to_id int required User id Review addressee. Example: 1
 * @bodyParam text string Review text. Example: Hice
 * @bodyParam rating int required Rating. Example: 4
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
            'text' => 'string|nullable',
            'rating' => 'required|integer',
            'from_id' => 'required|exists:users,id|integer',
            'to_id' => 'required|exists:users,id|integer',
        ];
    }
}
