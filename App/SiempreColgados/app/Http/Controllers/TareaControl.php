<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaControl extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Tarea.list", [
            "tareas" => Tarea::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Tarea.create");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        return view("Tarea.edit", [
            "tarea" => $tarea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        // $validated = $request->validate([
        //     'orden' => 'required|numeric',
        //     'nombre' => 'required|max:255',
        //     'fecha_inicio' => 'required|date',
        //     'fecha_fin' => 'required|date|after:fecha_inicio'
        // ]);

        $tarea->fill($request->input())->saveOrFail();
        return redirect()->route("Tarea.index")
            ->with(["success" => "Los datos de la tarea [<strong>{$tarea->nombre}</strong>] fueron actualizados correctamente"]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Tarea  $tarea
    //  * @return \Illuminate\Http\Response
    //  */
    // public function cdelete(Tarea $tarea)
    // {
    //     return view("Tarea.cdelete", [
    //         "tarea" => $tarea,
    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    
    public function delete(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route("tareas.list")->with([
            "warning" => "La tarea fue eliminada correctamente",
        ]);
    }
}
