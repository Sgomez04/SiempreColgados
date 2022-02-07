<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;
    protected $table = 'cuotas';
    protected $primaryKey = "id_cuota";

    protected $fillable = [
        'concepto',
        'fecha_emision',
        'importe',
        'pagada',
        'fecha_pago',
        'notas',
        'id_cliente'

    ];
}
