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
    if (preg_match("/^[a-zA-Z0-9-]*$/", $dni)) {
      $partes = explode('-', $dni);
      if (is_numeric($partes[0])) {
        $numeros = $partes[0];
        $letra = strtoupper($partes[1]);
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra)
          return true;
        else
          return false;
      } else {
        return false;
      }
    } else {
      return false;
    }
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
