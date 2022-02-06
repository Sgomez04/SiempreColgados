<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoControl extends Controller
{
    //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view("Empleado.edit", [
            "empleado" => $empleado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        // $validated = $request->validate([
        //     'orden' => 'required|numeric',
        //     'nombre' => 'required|max:255',
        //     'fecha_inicio' => 'required|date',
        //     'fecha_fin' => 'required|date|after:fecha_inicio'
        // ]);

        $empleado->fill($request->input())->saveOrFail();
        return redirect()->route("Empleado.index")
        ->with(["success" => "Los datos del empleado [<strong>{$empleado->nombre}</strong>] fueron actualizados correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroyConfirm()
    {
        return redirect()->route("Empleado.cdelete");
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route("Cuota.delete")->with([
            "warning" => "Los datos del empleado [<strong>{$empleado->nombre}</strong>] fueron eliminados correctamente",
        ]);
    }
}
