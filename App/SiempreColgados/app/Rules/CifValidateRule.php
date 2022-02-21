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
    return 'El CIF debe tener un formato correcto (ej: A80192727)';
  }

  public function isValidCif($cif)
  {
    $cif = strtoupper($cif);
    if (preg_match('~(^[XYZ\d]\d{7})([TRWAGMYFPDXBNJZSQVHLCKE]$)~', $cif, $parts)) {
      $control = 'TRWAGMYFPDXBNJZSQVHLCKE';
      $nie = array('X', 'Y', 'Z');
      $parts[1] = str_replace(array_values($nie), array_keys($nie), $parts[1]);
      $cheksum = substr($control, $parts[1] % 23, 1);
      return ($parts[2] == $cheksum);
    } elseif (preg_match('~(^[ABCDEFGHIJKLMUV])(\d{7})(\d$)~', $cif, $parts)) {
      $checksum = 0;
      foreach (str_split($parts[2]) as $pos => $val) {
        $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
      }
      $checksum = ((10 - ($checksum % 10)) % 10);
      return ($parts[3] == $checksum);
    } elseif (preg_match('~(^[KLMNPQRSW])(\d{7})([JABCDEFGHI]$)~', $cif, $parts)) {
      $control = 'JABCDEFGHI';
      $checksum = 0;
      foreach (str_split($parts[2]) as $pos => $val) {
        $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
      }
      $checksum = substr($control, ((10 - ($checksum % 10)) % 10), 1);
      return ($parts[3] == $checksum);
    }
    return false;
  }
}
