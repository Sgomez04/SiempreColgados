<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Paises;
use App\Http\Requests\EmpleadoValidate;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::all();
        return view("Cliente.list", [
            "clientes" => Cliente::Paginate(2),
            "paises" => Paises::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Paises::all();
        return view("Cliente.create", compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoValidate $request)
    {
        Cliente::createC($request);
        return redirect()->route("clientes.index")->with([
            "success" => "El cliente [<strong>{$request->nombre}</strong>] fue registrado correctamente",
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
        $paises = Paises::all();
        $cliente = Cliente::find($id);
        return view("Cliente.delete", compact('cliente', 'paises'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $paises = Paises::all();
        return view("Cliente.edit", compact('cliente', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoValidate $request, $id)
    {
        Cliente::updateC($request, $id);
        return redirect()->route("clientes.index")
            ->with(["success" => "Los datos del cliente fueron actualizados correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::destroyC($id);
        return redirect()->route("clientes.index")->with([
            "warning" => "El cliente fue eliminado correctamente",
        ]);
    }
}
