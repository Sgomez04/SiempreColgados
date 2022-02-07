<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Empleado.list", [
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
        return view("Empleado.create");
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

        $empleado = new Empleado();
        $empleado->nombre=$request->nombre;
        $empleado->password=$request->password;
        $empleado->dni=$request->dni;
        $empleado->correo=$request->correo;
        $empleado->telefono=$request->telefono;
        $empleado->direccion=$request->direccion;
        $empleado->fecha_alta=$request->fechalta;
        $empleado->tipo=$request->cargo;


        $empleado->saveOrFail();

        return redirect()->route("empleados.index")->with([
            "success" => "El empleado [<strong>{$empleado->nombre}</strong>] fue registrado correctamente",
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
        $empleado = Empleado::find($id);
        return view("Empleado.delete", compact('empleado'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view("Empleado.edit", compact('empleado'));
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
        
        $empleado = Empleado::find($id);
        $empleado->fill($request->input())->saveOrFail();
        return redirect()->route("empleados.index")
            ->with(["success" => "Los datos del empleado [<strong>{$empleado->nombre}</strong>] fueron actualizados correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        
        return redirect()->route("Cliente.delete")->with([
            "warning" => "El empleado [<strong>{$empleado->nombre}</strong>] fue eliminado correctamente",
        ]);
    }
}
