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

    public static function createT($request)
    {
        $tarea = new Tarea();
        $tarea->id_cliente = $request->cliente;
        $tarea->telefono = $request->telefono;
        $tarea->descripcion = $request->descripcion;
        $tarea->correo = $request->correo;
        $tarea->direccion = $request->direccion;
        $tarea->poblacion = $request->poblacion;
        $tarea->cp = $request->cp;
        $tarea->estado = $request->estado;
        $tarea->fecha_crea = $request->fcreacion;
        $tarea->operario = $request->operario;
        $tarea->fecha_rea = $request->fechaR;
        $tarea->anotacion_anterior = $request->aa;
        $tarea->anotacion_posterior = $request->ap;
        // $tarea->fichero=$request->concepto;

        $tarea->saveOrFail();
    }

    public static function updateT($request, $id)
    {

        $tarea = Tarea::find($id);
        $tarea->id_cliente = $request->cliente;
        $tarea->telefono = $request->telefono;
        $tarea->descripcion = $request->descripcion;
        $tarea->correo = $request->correo;
        $tarea->direccion = $request->direccion;
        $tarea->poblacion = $request->poblacion;
        $tarea->cp = $request->cp;
        $tarea->estado = $request->estado;
        $tarea->fecha_crea = $request->fcreacion;
        $tarea->operario = $request->operario;
        $tarea->fecha_rea = $request->fechaR;
        $tarea->anotacion_anterior = $request->aa;
        $tarea->anotacion_posterior = $request->ap;
        $tarea->fill($request->input())->saveOrFail();
    }

    public static function destroyT($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
    }
}
