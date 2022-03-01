<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Empleado;

class OperarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas['total'] = Tarea::all()->count();
        $paginas['mostrar'] = env('PAGINATE', 4);
        return view("Operario.listTarea", [
            "tareas" => Tarea::Paginate($paginas['mostrar']),
            "clientes" => Cliente::all(),
            "empleados" => Empleado::all(),
            "paginas" => $paginas
        ]);
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
        return view("Operario.editTarea", compact('tarea'));
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
        Tarea::updateTOperario($request, $id);

        return redirect()->route("tareasOp.index")
            ->with(["success" => "Los datos de la tarea fueron actualizados correctamente"]);
    }
}
