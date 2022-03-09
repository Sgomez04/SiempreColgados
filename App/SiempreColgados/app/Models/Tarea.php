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

    public static function createT($request)
    {
        // Tarea::create([
        //     'id_cliente' => $request->cliente,
        //     'operario' => $request->operario,
        //     'telefono' => $request->telefono,
        //     'descripcion' => $request->descripcion,
        //     'correo' => $request->correo,
        //     'tipo' => 'admin',
        //     'direccion' => $request->direccion,
        //     'poblacion' => $request->poblacion,
        //     'cp' => $request->cp,
        //     'fecha_rea' => $request->fechaR,
        //     'anotacion_anterior' => $request->aa,
        //     'estado' => 'P',
        //     'fecha_crea' => date('Y-m-d', time()),
        // ]);
        $tarea = new Tarea();
        $tarea->id_cliente = $request->cliente;
        $tarea->operario = $request->operario;
        $tarea->telefono = $request->telefono;
        $tarea->descripcion = $request->descripcion;
        if ($tarea->correo != $request->correo) {
            $tarea->correo = $request->correo;
        }
        $tarea->direccion = $request->direccion;
        $tarea->tipo = 'admin';
        $tarea->estado = 'P';
        $tarea->poblacion = $request->poblacio;
        $tarea->cp = $request->cp;
        $tarea->fecha_rea = $request->fechaR;
        $tarea->fecha_crea  = date('Y-m-d', time());
        $tarea->anotacion_anterior = $request->aa;

        $tarea->saveOrFail();
    }

    public static function updateT($request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->id_cliente = $request->cliente;
        $tarea->operario = $request->operario;
        $tarea->telefono = $request->telefono;
        $tarea->descripcion = $request->descripcion;
        $tarea->correo = $request->correo;
        $tarea->direccion = $request->direccion;
        $tarea->poblacion = $request->poblacio;
        $tarea->cp = $request->cp;
        $tarea->fecha_rea = $request->fechaR;
        $tarea->fecha_crea = $request->fcreacion;
        $tarea->anotacion_anterior = $request->aa;
        if ($tarea->operario != null) {
            $tarea->tipo = 'admin';
        } else {
            $tarea->tipo = 'cliente';
        }

        $tarea->saveOrFail();
    }

    public static function updateTOperario($request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->estado = $request->estado;
        $tarea->anotacion_posterior = $request->ap;
        if ($request->hasFile('archivo')) {
            if ($request->file('archivo') != $tarea->fichero) {
                Storage::disk('tareasPDF')->delete('app/pdf/' . $tarea->fichero);
                $tarea->fichero = $request->file('archivo')->store('/', 'tareasPDF');
            }
        }
        $tarea->saveOrFail();
    }

    public static function createClient($request)
    {
        // $cliente = Cliente::where('cif', $request->cif)->first();
        // Tarea::create([
        //     'telefono' => $request->telefono,
        //     'descripcion' => $request->descripcion,
        //     'correo' => $request->correo,
        //     'id_cliente' => $cliente->id_cliente,
        //     'direccion' => $request->direccion,
        //     'poblacion' => $request->poblacion,
        //     'cp' => $request->cp,
        //     'fecha_rea' => $request->fechaR,
        //     'anotacion_anterior' => $request->aa,
        //     'estado' => 'P',
        //     'fecha_crea' => date('Y-m-d', time()),
        //     'tipo' => 'cliente',
        // ]);

        $tarea = new Tarea();
        $cliente = Cliente::where('cif', $request->cif)->first();
        $tarea->id_cliente = $cliente->id_cliente;
        $tarea->telefono = $request->telefono;
        $tarea->descripcion = $request->descripcion;
        $tarea->correo = $request->correo;
        $tarea->direccion = $request->direccion;
        $tarea->tipo = 'cliente';
        $tarea->estado = 'P';
        $tarea->poblacion = $request->poblacion;
        $tarea->cp = $request->cp;
        $tarea->fecha_rea = $request->fechaR;
        $tarea->fecha_crea = date('Y-m-d', time());
        $tarea->anotacion_anterior = $request->aa;

        $tarea->saveOrFail();
    }

    public static function destroyT($id)
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
