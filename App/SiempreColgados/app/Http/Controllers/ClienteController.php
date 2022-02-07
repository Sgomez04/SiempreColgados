<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Paises;

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
            "clientes" => Cliente::all(),
            "paises" =>Paises::all(),
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
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'orden' => 'required|numeric|unique:clientes',
        //     'nombre' => 'required|max:255',
        //     'fecha_inicio' => 'required|date',
        //     'fecha_fin' => 'required|date|after:fecha_inicio'
        // ]);

        $paises = Paises::all();
        
        $cliente = new Cliente();
        $cliente->cif=$request->cif;
        $cliente->nombre=$request->nombre;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->cuenta_corriente=$request->cuenta;
        $cliente->id_pais= $request->pais;
        $cliente->moneda=$request->moneda;
        $cliente->cuota_mensual=$request->importe;
        

        $cliente->saveOrFail();
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
        $cliente = Cliente::find($id);
        return view("Cliente.delete", compact('cliente'));
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
        return view("Cliente.edit", compact('cliente','paises'));
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
        
        $cliente = Cliente::find($id);
        $cliente->fill($request->input())->saveOrFail();
        return redirect()->route("Cliente.index")
            ->with(["success" => "Los datos del cliente [<strong>{$cliente->nombre}</strong>] fueron actualizados correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route("Cliente.delete")->with([
            "warning" => "El cliente [<strong>{$cliente->nombre}</strong>] fue eliminado correctamente",
        ]);
    }



}
