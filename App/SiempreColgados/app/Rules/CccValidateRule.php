<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CccValidateRule implements Rule
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
        return ($this->ccc_valido($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La cuenta corriente debe tener un formato correcto (ej: ES66 2100 0418 4012 34567891)';
    }

    function ccc_valido($iban)
    {
        # definimos un array de valores con el valor de cada letra
        $letras = array("A" => 10, "B" => 11, "C" => 12, "D" => 13, "E" => 14, "F" => 15, "G" => 16, "H" => 17, "I" => 18, "J" => 19, "K" => 20, "L" => 21, "M" => 22, "N" => 23, "O" => 24, "P" => 25, "Q" => 26, "R" => 27, "S" => 28, "T" => 29, "U" => 30, "V" => 31, "W" => 32, "X" => 33, "Y" => 34, "Z" => 35);

        # Eliminamos los posibles espacios al inicio y final
        $iban = trim($iban);

        # Convertimos en mayusculas
        $iban = strtoupper($iban);

        # eliminamos espacio y guiones que haya en el iban
        $iban = str_replace(array(" ", "-"), "", $iban);

        if (strlen($iban) == 24) {
            # obtenemos los codigos de las dos letras
            $valorLetra1 = $letras[substr($iban, 0, 1)];
            $valorLetra2 = $letras[substr($iban, 1, 1)];

            # obtenemos los siguientes dos valores
            $siguienteNumeros = substr($iban, 2, 2);

            $valor = substr($iban, 4, strlen($iban)) . $valorLetra1 . $valorLetra2 . $siguienteNumeros;

            if (bcmod($valor, 97) == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
