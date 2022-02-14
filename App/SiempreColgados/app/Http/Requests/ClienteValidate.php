<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CifValidateRule;


class ClienteValidate extends FormRequest
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
            // 'cif' => ['required' , new CifValidateRule],
            // 'nombre' => 'required|date',
            // 'telefono' => 'required|numeric',
            // 'correo' => 'required|email',
            // 'cuenta' => 'required|new CccValidateRule',
            // 'pais' => 'required',
            // 'moneda' => 'required',
            // 'importe' => 'required|numeric'
        ];
    }

    public function messages()
{
    return [
        'cif.required' => 'Es obligatorio completar el campo "CIF"',
        'nombre.required' => 'Es obligatorio completar el campo "Nombre"',
        'telefono.required' => 'Es obligatorio completar el campo "Telefono"',
        'correo.required' => 'Es obligatorio completar el campo "Correo"',
        'cuenta.required' => 'Es obligatorio completar el campo "Cuenta Corriente"',
        'pais.required' => 'Es obligatorio completar el campo "Pais"',
        'moneda.required' => 'Es obligatorio completar el campo "Moneda"',
        'importe.required' => 'Es obligatorio completar el campo "Importe Cuota Mensual"',

        'telefono.numeric' => 'El campo "Telefono" solo debe contener numeros',
        'importe.numeric' => 'El campo "Importe Cuota Mensual" solo debe contener numeros',

        'correo.email' => 'El campo "Correo Electronico" debe tener un formato correcto de email',

    ];
}
}
