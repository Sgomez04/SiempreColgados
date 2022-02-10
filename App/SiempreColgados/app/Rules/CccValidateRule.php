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
        return 'La cuenta corriente debe tener un formato correcto';
    }

    function ccc_valido($ccc)
{
    //$ccc sería el 20770338793100254321
    $valido = true;

    ///////////////////////////////////////////////////
    //    Dígito de control de la entidad y sucursal:
    //Se multiplica cada dígito por su factor de peso
    ///////////////////////////////////////////////////
    $suma = 0;
    $suma += $ccc[0] * 4;
    $suma += $ccc[1] * 8;
    $suma += $ccc[2] * 5;
    $suma += $ccc[3] * 10;
    $suma += $ccc[4] * 9;
    $suma += $ccc[5] * 7;
    $suma += $ccc[6] * 3;
    $suma += $ccc[7] * 6;

    $division = floor($suma/11);
    $resto    = $suma - ($division  * 11);
    $primer_digito_control = 11 - $resto;
    if($primer_digito_control == 11)
        $primer_digito_control = 0;

    if($primer_digito_control == 10)
        $primer_digito_control = 1;

    if($primer_digito_control != $ccc[8])
        $valido = false;

    ///////////////////////////////////////////////////
    //            Dígito de control de la cuenta:
    ///////////////////////////////////////////////////
    $suma = 0;
    $suma += $ccc[10] * 1;
    $suma += $ccc[11] * 2;
    $suma += $ccc[12] * 4;
    $suma += $ccc[13] * 8;
    $suma += $ccc[14] * 5;
    $suma += $ccc[15] * 10;
    $suma += $ccc[16] * 9;
    $suma += $ccc[17] * 7;
    $suma += $ccc[18] * 3;
    $suma += $ccc[19] * 6;

    $division = floor($suma/11);
    $resto = $suma-($division  * 11);
    $segundo_digito_control = 11- $resto;

    if($segundo_digito_control == 11)
        $segundo_digito_control = 0;
    if($segundo_digito_control == 10)
        $segundo_digito_control = 1;

    if($segundo_digito_control != $ccc[9])
        $valido = false;

    return $valido;
}
}
