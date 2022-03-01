<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadosJS;
use App\Http\Requests\EmpleadoJSValidate;


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
    public function store(EmpleadoJSValidate $request)
    {

        $empleados = EmpleadosJS::updateOrCreate(['id_empleado' => $request->id_empleado],[
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'dni' => $request->dni,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_alta' => $request->fecha_alta,
            'tipo' => $request->tipo        
        ]);

        
        // return response()->json(['code' => 500, 'message' => 'Post Created successfully', 'data' => print_r($request->all(), true)]);
        return response()->json(['code' => 200, 'message' => 'Post Created successfully', 'data' => $empleados]);

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