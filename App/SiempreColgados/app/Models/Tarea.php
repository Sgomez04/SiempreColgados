<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tareas';
    protected $primaryKey = "id_tarea";

    protected $fillable = [
        'nombre',
        'telefono',
        'descripcion',
        'correo',
        'direccion',
        'estado',
        'fecha_crea',
        'fecha_rea',
        'anotacion_anterior',
        'anotacion_posterior',
        'fichero',
        'id_cliente'
    ];
}
