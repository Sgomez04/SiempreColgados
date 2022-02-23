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
        'poblacion',
        'cp',
        'fecha_rea',
        'anotacion_anterior',
        'anotacion_posterior',
        'fichero',
        'id_cliente',
        'tipo',
    ];

    public function createT($request)
    {
        Tarea::create([
            'id_cliente' => $request->cliente,
            'operario' => $request->operario,
            'telefono' => $request->telefono,
            'descripcion' => $request->descripcion,
            'correo' => $request->correo,
            'tipo' => 'admin',
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'cp' => $request->cp,
            'fecha_rea' => $request->fechaR,
            'anotacion_anterior' => $request->aa,
            'estado' => 'P',
            'fecha_crea' => date('Y-m-d', time()),
        ]);
    }

    public function updateT($request, $id)
    {
        Tarea::find($id)->update([
            'id_cliente' => $request->cliente,
            'operario' => $request->operario,
            'telefono' => $request->telefono,
            'descripcion' => $request->descripcion,
            'correo' => $request->correo,
            'tipo' => 'admin',
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'cp' => $request->cp,
            'fecha_rea' => $request->fechaR,
            'anotacion_anterior' => $request->aa,
            'estado' => 'P',
            'fecha_crea' => date('Y-m-d', time()),
        ]);

        // if ($tarea->correo != $request->correo) {
        //     $tarea->correo = $request->correo;
        // } else {
        //     $tarea->correo = $tarea->correo;
        // }

        // if ($tarea->operario != null) {
        //     $tarea->tipo = 'admin';
        // } else {
        //     $tarea->tipo = 'cliente';
        // }

    }

    public function updateTOperario($request, $id)
    {
        Tarea::find($id)->update([
            'estado' => $request->estado,
            'anotacion_posterior' => $request->ap,
            'fichero' => $request->file('archivo')->store('public')
        ]);

        // if ($request->hasFile($request->archivo)) {
        //     $tarea->fichero = $request->file('archivo')->store('public');
        // } else {
        //     if ($tarea->fichero == null) {
        //         $tarea->fichero = null;
        //     } else {
        //         $tarea->fichero = $tarea->fichero;
        //     }
        // }

    }

    public function createClient($request)
    {
        $cliente = Cliente::where('cif', $request->cif)->first();
        Tarea::create([
            'telefono' => $request->telefono,
            'descripcion' => $request->descripcion,
            'correo' => $request->correo,
            'id_cliente' => $cliente->id_cliente,
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'cp' => $request->cp,
            'fecha_rea' => $request->fechaR,
            'anotacion_anterior' => $request->aa,
            'estado' => 'P',
            'fecha_crea' => date('Y-m-d', time()),
            'tipo' => 'cliente',

        ]);
    }

    public function destroyT($id)
    {
        $tarea = Tarea::find($id);
        Storage::delete($tarea->fichero);
        $tarea->delete();
    }


    public function Empleado()
    {
        return $this->belongsTo(Empleado::class, 'operario');
    }

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
