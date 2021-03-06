<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CifValidateRule;
use App\Rules\cpValidateRule;



class TareaClienteValidate extends FormRequest
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
           'cif' => 'required',
           'telefono' => 'required|numeric',
           'descripcion' => 'required',
           'correo' => 'required|email',
           'direccion' => 'required',
           'poblacion' => 'required',
           'cp' => ['required' ,'numeric', new cpValidateRule],
           'fechaR' => 'required|date',
           'aa' => 'required',
       ];
   }

   public function messages()
{
   return [
       'cif.required' => 'Es obligatorio completar el campo "CIF"',
       'telefono.required' => 'Es obligatorio completar el campo "Telefono"',
       'descripcion.required' => 'Es obligatorio completar el campo "Descripcion"',
       'correo.required' => 'Es obligatorio completar el campo "Correo"',
       'direccion.required' => 'Es obligatorio completar el campo "Direccion"',
       'poblacion.required' => 'Es obligatorio completar el campo "Poblacion"',
       'cp.required' => 'Es obligatorio completar el campo "Codigo Postal"',
       'fechaR.required' => 'Es obligatorio completar el campo "Fecha de realizacion"',
       'aa.required' => 'Es obligatorio completar el campo "Anotaciones anteriores"',

       'telefono.numeric' => 'El campo telefono solo admite numeros',
       'cp.numeric' => 'El campo telefono solo admite numeros',
       'fechaR.date' => 'El campo "Fecha de realizacion" debe contener un formato valido (dia-mes-año)',

   ];
}
}
