<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = "id_empleado";

    protected $fillable = [
        'nombre',
        'password',
        'dni',
        'correo',
        'telefono',
        'direccion',
        'fecha_alta',
        'tipo'
    ];
}
