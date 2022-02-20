<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
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
        'id_cliente',
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
        $tarea->estado = "P";
        $tarea->fecha_crea = date('Y-m-d', time());
        $tarea->operario = $request->operario;
        $tarea->fecha_rea = $request->fechaR;
        $tarea->anotacion_anterior = $request->aa;

        $tarea->saveOrFail();
    }

    public static function updateT($request, $id)
    {
        $tarea = Tarea::find($id);
        //datos editados
        $tarea->id_cliente = $request->cliente;
        $tarea->telefono = $request->telefono;
        $tarea->descripcion = $request->descripcion;
        if ($tarea->correo != $request->correo) {
            $tarea->correo = $request->correo;
        } else {
            $tarea->correo = $tarea->correo;
        }
        $tarea->direccion = $request->direccion;
        $tarea->poblacion = $request->poblacion;
        $tarea->cp = $request->cp;
        $tarea->operario = $request->operario;
        $tarea->fecha_rea = $request->fechaR;
        $tarea->anotacion_anterior = $request->aa;

        //datos sin editar
        $tarea->fecha_crea = $tarea->fecha_crea;
        $tarea->estado = $tarea->estado;
        $tarea->anotacion_posterior = $tarea->anotacion_posterior;
        $tarea->fichero = $tarea->fichero;
        $tarea->fill($request->input())->saveOrFail();
    }

    public static function updateTOperario($request, $id)
    {
        $tarea = Tarea::find($id);
        //datos sin editar
        $tarea->id_cliente = $tarea->id_cliente;
        $tarea->telefono = $tarea->telefono;
        $tarea->descripcion = $tarea->descripcion;
        $tarea->correo = $tarea->correo;
        $tarea->direccion = $tarea->direccion;
        $tarea->poblacion = $tarea->poblacion;
        $tarea->cp = $tarea->cp;
        $tarea->fecha_crea = $tarea->fecha_crea;
        $tarea->operario = $tarea->operario;
        $tarea->fecha_rea = $tarea->fecha_rea;

        //datos editados
        $tarea->estado = $request->estado;
        $tarea->anotacion_anterior = $request->aa;
        $tarea->anotacion_posterior = $request->ap;
        //fichero
        if ($request->hasFile($request->archivo)) {
            $tarea->fichero = $request->file('archivo')->store('public');
        } else {
            if ($tarea->fichero == null) {
                $tarea->fichero = null;
            } else {
                $tarea->fichero = $tarea->fichero;
            }
        }

        $tarea->fill($request->input())->saveOrFail();
    }

    public static function createClient($request)
    {
        $tarea = new Tarea();
        $cliente = Cliente::where('cif', $request->cif)->first();

        //datos editados
        $tarea->telefono = $request->telefono;
        $tarea->descripcion = $request->descripcion;
        $tarea->correo = $request->correo;
        $tarea->id_cliente = $cliente->id_cliente;
        $tarea->direccion = $request->direccion;
        $tarea->poblacion = $request->poblacion;
        $tarea->cp = $request->cp;
        $tarea->fecha_rea = $request->fechaR;

        //datos sin editar
        $tarea->estado = 'P';
        $tarea->fecha_crea = date('Y-m-d', time());

        $tarea->saveOrFail();
    }

    public static function destroyT($id)
    {
        $tarea = Tarea::find($id);
        Storage::delete($tarea->fichero);
        $tarea->delete();
    }
}
