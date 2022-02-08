<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Empleado;


class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Tarea.list", [
            "tareas" => Tarea::all(),
            "clientes" => Cliente::all(),
            "empleados" => Empleado::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        return view("Tarea.create", compact('clientes','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'orden' => 'required|numeric|unique:clientes',
        //     'nombre' => 'required|max:255',
        //     'fecha_inicio' => 'required|date',
        //     'fecha_fin' => 'required|date|after:fecha_inicio'
        // ]);

        $tarea = new Tarea();
        $tarea->id_cliente=$request->cliente;
        $tarea->telefono=$request->telefono;
        $tarea->descripcion=$request->descripcion;
        $tarea->correo=$request->correo;
        $tarea->direccion=$request->direccion;
        $tarea->poblacion=$request->poblacion;
        $tarea->cp=$request->cp;
        $tarea->estado=$request->estado;
        $tarea->fecha_crea=$request->fcreacion;
        $tarea->operario=$request->operario;
        $tarea->fecha_rea=$request->fechaR;
        $tarea->anotacion_anterior=$request->aa;
        $tarea->anotacion_posterior=$request->ap;
        // $tarea->fichero=$request->concepto;

        $tarea->saveOrFail();
        return redirect()->route("tareas.index")->with([
            "success" => "La tarea [<strong>{$tarea->nombre}</strong>] fue registrado correctamente",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);
        return view("Tarea.delete", compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $clientes = Cliente::all();
        $empleados = Empleado::all();

        return view("Tarea.edit", compact('tarea','clientes','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // $validated = $request->validate([
        //     'orden' => 'required|numeric',
        //     'nombre' => 'required|max:255',
        //     'fecha_inicio' => 'required|date',
        //     'fecha_fin' => 'required|date|after:fecha_inicio'
        // ]);
        
        $tarea = Tarea::find($id);
        $tarea->fill($request->input())->saveOrFail();
        return redirect()->route("tareas.index")
            ->with(["success" => "Los datos de la tarea fueron actualizados correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        return redirect()->route("Cliente.delete")->with([
            "warning" => "La tarea fue eliminada correctamente",
        ]);
    }
}
