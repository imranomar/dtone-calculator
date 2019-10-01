<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MathRequest extends FormRequest
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
            'num1'=>'required|numeric',
            'num2'=>'sometimes|numeric',
        ];
    }
}
