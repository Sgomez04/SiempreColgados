<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadosJS;
use App\Http\Requests\EmpleadoValidate;


class EmpleadoJsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = EmpleadosJS::all();

        return view('ViewJS.plantillaJs', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'nombre' => 'required|regex:/[A-Za-z]/',
            // 'dni' => 'required',
            // 'correo' => 'required|email',
            // 'telefono' => 'required|numeric',
            // 'direccion' => 'required|regex:/^[a-zA-Z0-9_\-]*$/',
            // 'fecha_alta' => 'required|date',
        ]);

        $empleados = EmpleadosJS::updateOrCreate(['id_empleado' => $request->id_empleado], [
            'name' => $request->nombre,
            'dni' => $request->dni,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
            'fecha_alta' => $request->fechalta,
            'tipo' => $request->cargo,
            'email' => $request->correo,
            'telefono' => $request->telefono

        ]);

        return response()->json(['code' => 200, 'message' => 'Post Created successfully', 'data' => $empleados], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = EmpleadosJS::find($id);

        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmpleadosJS::find($id)->delete();

        return response()->json(['success' => 'Post Deleted successfully']);
    }
}