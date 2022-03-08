<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuotaMensualValidate extends FormRequest
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
            'concepto' => 'required|regex:/[A-Za-z]/',
            'fechaemision' => 'required|date',
            'fechapago' => 'required|date',
            'notas' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'concepto.required' => 'Es obligatorio completar el campo "Concepto"',
            'fechaemision.required' => 'Es obligatorio completar el campo "Fecha de emision"',
            'fechapago.required' => 'Es obligatorio completar el campo "Fecha de pago"',
            'notas.required' => 'Es obligatorio completar el campo "Notas"',

            'fechaemision.date' => 'El campo "Fecha de emision" debe contener un formato valido (dia-mes-año)',
            'fechapago.date' => 'El campo "Fecha de pago" debe contener un formato valido (dia-mes-año)',

            'concepto.regex' => 'El campo "Concepto" solo debe contener letras',

        ];
    }
}
