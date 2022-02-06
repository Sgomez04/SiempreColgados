<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteControl extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Cliente.list", [
            "clientes" => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Cliente.create");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view("Cliente.edit", [
            "cliente" => $cliente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        // $validated = $request->validate([
        //     'orden' => 'required|numeric',
        //     'nombre' => 'required|max:255',
        //     'fecha_inicio' => 'required|date',
        //     'fecha_fin' => 'required|date|after:fecha_inicio'
        // ]);

        $cliente->fill($request->input())->saveOrFail();
        return redirect()->route("Cliente.index")
            ->with(["success" => "Los datos del cliente [<strong>{$cliente->nombre}</strong>] fueron actualizados correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroyConfirm()
    {
        return redirect()->route("Cliente.cdelete");
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route("Cliente.delete")->with([
            "warning" => "El cliente [<strong>{$cliente->nombre}</strong>] fue eliminado correctamente",
        ]);
    }
}
