<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DniValidateRule;


class EmpleadoJSValidate extends FormRequest
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
            // 'name' => 'required',
            // 'password' => 'required',
            // 'dni' => ['required', new DniValidateRule],
            // 'email' => 'required|email',
            // 'telefono' => 'required|numeric',
            // 'direccion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Es obligatorio completar el campo "Nombre"',
            'password.required' => 'Es obligatorio completar el campo "Contraseña"',
            'dni.required' => 'Es obligatorio completar el campo "DNI"',
            'email.required' => 'Es obligatorio completar el campo "Correo electronico"',
            'telefono.required' => 'Es obligatorio completar el campo "Telefono"',
            'direccion.required' => 'Es obligatorio completar el campo "Direccion"',
    

            'telefono.numeric' => 'El campo "Telefono" solo debe contener numeros',

            'email.email' => 'El campo "Correo Electronico" debe tener un formato correcto de email',
        ];
    }
}
