<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DniValidateRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

  /**
  * Determine if the validation rule passes.
  *
  * @param string $attribute
  * @param mixed $value
  * @return bool
  */
  public function passes($attribute, $value)
  {
     return ($this->isValidDni($value));
  }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function isValidDni($dni)
    {
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        $valido = false;
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
          $valido=true;
        }else{
          $valido=false;
        }
        return $valido;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El DNI debe tener un formato correcto';
    }
}
