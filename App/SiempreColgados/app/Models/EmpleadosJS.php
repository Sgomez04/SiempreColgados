<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadosJS extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $primaryKey = "id_empleado";

    protected $fillable = [
        'name',
        'dni',
        'email',
        'telefono',
        'direccion',
        'fecha_alta',
        'tipo'
    ];


}
