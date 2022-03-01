<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleadosjs extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = "id_empleado";

    protected $fillable = [
        'name',
        'password',
        'dni',
        'descripcion',
        'email',
        'telefono',
        'direccion',
        'fecha_alta',
        'tipo'
    ];

}
