<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DniValidateRule;


class EmpleadoValidate extends FormRequest
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
            'nombre' => 'required|regex:/[A-Za-z]/',
            'password' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            'dni' => ['required', new DniValidateRule],
            'correo' => 'required|email',
            'telefono' => 'required|numeric',
            'direccion' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            'fecha_alta' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Es obligatorio completar el campo "Nombre"',
            'password.required' => 'Es obligatorio completar el campo "Contraseña"',
            'dni.required' => 'Es obligatorio completar el campo "DNI"',
            'correo.required' => 'Es obligatorio completar el campo "Correo electronico"',
            'telefono.required' => 'Es obligatorio completar el campo "Telefono"',
            'direccion.required' => 'Es obligatorio completar el campo "Direccion"',
            'fecha_alta.required' => 'Es obligatorio completar el campo "Fecha de alta"',

            'fecha_alta.date' => 'El campo "Fecha de alta" debe contener un formato valido (dia-mes-año)',

            'telefono.numeric' => 'El campo "Telefono" solo debe contener numeros',

            'correo.email' => 'El campo "Correo Electronico" debe tener un formato correcto de email',

            'nombre.regex' => 'El campo "Nombre" solo puede contener letras',

            'password.regex' => 'El campo "Contraseña" no puede contener caracteres especiales',
            'direccion.regex' => 'El campo "Direccion" no puede contener caracteres especiales',

        ];
    }

}
