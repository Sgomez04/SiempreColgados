<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CambioDivisa extends Model
{
    use HasFactory;

    public static function toEuros($valor,$moneda){
        $json = file_get_contents('https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/eur.json');

        $data = json_decode($json,true);
        
        return round($data['eur'][$moneda]*$valor, 2);

    }
}
