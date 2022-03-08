<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class cpValidateRule implements Rule
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
        return ($this->isValidCp($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El Codigo Postal debe tener 5 cifras';
    }

    public function isValidCp($cp)
  {
    if(strlen($cp) > 5){
        return false;
    } else{
        return true;
    }
  }
}
