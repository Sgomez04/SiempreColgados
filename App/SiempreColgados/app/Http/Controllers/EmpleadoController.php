<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Http\Requests\EmpleadoValidate;
use App\Http\Requests\EditEmpleadoValidate;



class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas['total'] = Empleado::all()->count();
        $paginas['mostrar'] = env('PAGINATE', 4);
        return view("Empleado.list", [
            "empleados" => Empleado::Paginate($paginas['mostrar']),
            "paginas" => $paginas
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
    public function store(EmpleadoValidate $request)
    {
        Empleado::createE($request);
        return redirect()->route("empleados.index")->with([
            "success" => "El nuevo empleado fue registrado correctamente",
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
    public function update(EditEmpleadoValidate $request, $id)
    {
        Empleado::updateE($request,$id);
        return redirect()->route("empleados.index")
            ->with(["success" => "Los datos del empleado fueron actualizados correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroyE($id);
        return redirect()->route("empleados.index")->with([
            "warning" => "El empleado fue eliminado correctamente",
        ]);
    }
}
