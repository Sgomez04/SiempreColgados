<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaValidate extends FormRequest
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
            'concepto' => 'required',
            'fechaemision' => 'required|date',
            'importe' => 'required|numeric',
            'fechapago' => 'required|date',
            'notas' => 'required',
            'cliente' => 'required'
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

        'fechaemision.date' => 'El campo "Fecha de emision" debe contener una fecha',
        'fechapago.date' => 'El campo "Fecha de pago" debe contener una fecha',

        'importe.numeric' => 'El campo "Importe" solo debe contener numeros',
    ];
}
}
