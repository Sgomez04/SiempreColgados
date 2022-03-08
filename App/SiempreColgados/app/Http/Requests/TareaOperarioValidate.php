<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaOperarioValidate extends FormRequest
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
            'ap' => 'required',
        ];
    }

    public function messages()
    {
        return [
            
            'ap.required' => 'Es obligatorio completar el campo "Anotaciones posteriores"',

        ];
    }
}
