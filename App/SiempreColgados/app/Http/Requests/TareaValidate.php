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
            // 'telefono' => 'required|numeric',
            // 'descripcion' => 'required|date',
            // 'correo' => 'required|email',
            // 'direccion' => 'required|',
            // 'poblacion' => 'required',
            // 'cp' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            // 'fecha_rea' => 'required|date',
            // 'id_cliente' =>'required'

        ];
    }

    public function messages()
{
    return [
        'telefono.required' => 'Es obligatorio completar el campo "Telefono"',
        'descripcion.required' => 'Es obligatorio completar el campo "Descripcion"',
        'correo.required' => 'Es obligatorio completar el campo "Importe"',
        'direccion.required' => 'Es obligatorio completar el campo "Fecha de pago"',
        'poblacion.required' => 'Es obligatorio completar el campo "Notas"',
        'cp.required' => 'Es obligatorio completar el campo "Cliente"',
        'fecha_rea.required' => 'Es obligatorio completar el campo "Fecha de realizacion"',
        'id_cliente.required' => 'Es obligatorio completar el campo "Cliente"',

        'fecha_rea.date' => 'El campo "Fecha de realizacion" debe contener un formato valido (dia-mes-año)',

        'telefono.numeric' => 'El campo "Telefono" solo puede contener numeros',
    ];
}
}
