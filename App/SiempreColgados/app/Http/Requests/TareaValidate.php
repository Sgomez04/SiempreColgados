<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CifValidateRule;

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
            // 'cif' => ['required' , new CifValidateRule],
            // 'cliente' => 'required',
            // 'telefono' => 'required|numeric',
            // 'descripcion' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            // 'correo' => 'required|email',
            // 'direccion' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            // 'poblacion' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            // 'cp' => 'required|numeric',
            // 'fecha_rea' => 'required|date',
            // 'operario' => 'required',
            // 'aa' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            // 'ap' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            // 'id_cliente' =>'required'

        ];
    }

    public function messages()
{
    return [
        'cif.required' => 'Es obligatorio completar el campo "CIF"',
        'cliente.required' => 'Es obligatorio completar el campo "Cliente"',
        'telefono.required' => 'Es obligatorio completar el campo "Telefono"',
        'descripcion.required' => 'Es obligatorio completar el campo "Descripcion"',
        'correo.required' => 'Es obligatorio completar el campo "Correo"',
        'direccion.required' => 'Es obligatorio completar el campo "Direccion"',
        'poblacion.required' => 'Es obligatorio completar el campo "Poblacion"',
        'cp.required' => 'Es obligatorio completar el campo "Codigo Postal"',
        'fecha_rea.required' => 'Es obligatorio completar el campo "Fecha de realizacion"',
        'operario.required' => 'Es obligatorio completar el campo "Opeario"',
        'aa.required' => 'Es obligatorio completar el campo "Anotaciones anteriores"',
        'ap.required' => 'Es obligatorio completar el campo "Anotaciones posteriores"',
        'id_cliente.required' => 'Es obligatorio completar el campo "Cliente"',

        'fecha_rea.date' => 'El campo "Fecha de realizacion" debe contener un formato valido (dia-mes-año)',

        'descripcion.regex' => 'El campo "Descripcion" no puede contener caracteres especiales',
        'direccion.regex' => 'El campo "Direccion" no puede contener caracteres especiales',
        'poblacion.regex' => 'El campo "Poblacion" no puede contener caracteres especiales',
        'aa.regex' => 'El campo "Anotaciones Anteriores" no puede contener caracteres especiales',
        'ap.regex' => 'El campo "Anotaciones Posteriores" no puede contener caracteres especiales',


    ];
}
}
