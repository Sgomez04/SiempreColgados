<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuotaValidate extends FormRequest
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
            // 'concepto' => 'required|regex:/[A-Za-z]/',
            // 'fechaemision' => 'required|date',
            // 'importe' => 'required|numeric',
            // 'fechapago' => 'required|date',
            // 'notas' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            // 'cliente' => 'required'
        ];
    }

    public function messages()
{
    return [
        'concepto.required' => 'Es obligatorio completar el campo "Concepto"',
        'fechaemision.required' => 'Es obligatorio completar el campo "Fecha de emision"',
        'importe.required' => 'Es obligatorio completar el campo "Importe"',
        'fechapago.required' => 'Es obligatorio completar el campo "Fecha de pago"',
        'notas.required' => 'Es obligatorio completar el campo "Notas"',
        'cliente.required' => 'Es obligatorio completar el campo "Cliente"',

        'fechaemision.date' => 'El campo "Fecha de emision" debe contener un formato valido (dia-mes-año)',
        'fechapago.date' => 'El campo "Fecha de pago" debe contener un formato valido (dia-mes-año)',

        'importe.numeric' => 'El campo "Importe" solo debe contener numeros',

        'concepto.regex' => 'El campo "Concepto" solo debe contener letras',

        'notas.regex' => 'El campo "Notas" no puede contener caracteres especiales',

    ];
}
}
