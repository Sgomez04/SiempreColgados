<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CifValidateRule implements Rule
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
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value)
  {
    return ($this->isValidCif($value));
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
    return 'El CIF debe tener un formato correcto';
  }

  public function isValidCif($cif)
  {
    $cif = strtoupper($cif);
    for ($i = 0; $i < 9; $i++) {
      $num[$i] = substr($cif, $i, 1);
    }
    //si no tiene un formato valido devuelve error
    if (!preg_match("/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/", $cif)) {
      return false;
    }

    //algoritmo para comprobacion de codigos tipo CIF
    $suma = $num[2] + $num[4] + $num[6];
    for ($i = 1; $i < 8; $i += 2) {
      $suma += substr((2 * $num[$i]), 0, 1) + substr((2 * $num[$i]), 1, 1);
    }
    $n = 10 - substr($suma, strlen($suma) - 1, 1);

    //comprobacion de CIFs
    if (preg_match("/^[ABCDEFGHJNPQRSUVW]{1}/", $cif)) {
      if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1)) {
        return true;
      } else {
        return false;
      }
    }
    //si todavia no se ha verificado devuelve error
    return false;
  }
}
