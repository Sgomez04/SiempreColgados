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
        'operario',
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

    public static function updateT($request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->id_cliente = $request->cliente;
        $tarea->operario = $request->operario;
        $tarea->telefono = $request->telefono;
        $tarea->descripcion = $request->descripcion;
        if ($tarea->correo != $request->correo) {
            $tarea->correo = $request->correo;
        }
        $tarea->direccion = $request->direccion;
        $tarea->poblacion = $request->poblacio;
        $tarea->cp = $request->cp;
        $tarea->fecha_rea = $request->fechaR;
        $tarea->anotacion_anterior = $request->aa;
        $tarea->estado = $request->estado;
        if ($tarea->operario != null) {
            $tarea->tipo = 'admin';
        } else {
            $tarea->tipo = 'cliente';
        }

        $tarea->fill($request->input())->saveOrFail();
    }

    public static function updateTOperario($request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->estado = $request->estado;
        $tarea->anotacion_posterior = $request->ap;
        if ($request->hasFile('archivo')) {
            $tarea->fichero = $request->file('archivo')->store('/', 'tareasPDF');
        } else{
            $tarea->fichero = "noentro";

        }
        $tarea->fill($request->input())->saveOrFail();
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

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
    
    public function Empleado()
    {
        return $this->belongsTo(Empleado::class, 'operario');
    }
}
