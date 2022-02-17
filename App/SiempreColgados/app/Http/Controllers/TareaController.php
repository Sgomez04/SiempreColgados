<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Http\Requests\TareaValidate;
use Illuminate\Support\Facades\Auth;


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
            "tareas" => Tarea::Paginate(2),
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
        return view("Tarea.create", compact('clientes', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TareaValidate $request)
    {
        Tarea::createT($request);
        return redirect()->route("tareas.index")->with([
            "success" => "La nueva tarea fue registrado correctamente",
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
        $clientes = Cliente::all();
        $empleados = Empleado::all();

        return view("Tarea.delete", compact('tarea', 'clientes', 'empleados'));
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

        return view("Tarea.edit", compact('tarea', 'clientes', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TareaValidate $request, $id)
    {
        Tarea::updateT($request, $id);
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
        Tarea::destroyT($id);
        return redirect()->route("tareas.index")->with([
            "warning" => "La tarea fue eliminada correctamente",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClient()
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        return view("Tarea.createClient", compact('clientes', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClient(TareaValidate $request)
    {
        Tarea::createT($request);
        return redirect()->route("tareas.index")->with([
            "success" => "La nueva tarea fue registrado correctamente",
        ]);
    }

    //Operarios

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listTareaOP()
    {
        return view("Operario.listTarea", [
            "tareas" => Tarea::Paginate(2),
            "clientes" => Cliente::all(),
            "empleados" => Empleado::all()
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTareaOP($id)
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
    public function updateTareaOPshow(TareaValidate $request, $id)
    {
        Tarea::updateT($request, $id);
        return redirect()->route("tareasOP")
            ->with(["success" => "Los datos de la tarea fueron actualizados correctamente"]);
    }



}
