<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Cuota.list", [
            "cuotas" => Cuota::all()
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

        $cuota = new Cuota();
        $cuota->concepto=$request->concepto;
        $cuota->fecha_emision=$request->fechaemision;
        $cuota->importe=$request->importe;
        $cuota->pagada=$request->pagada;
        $cuota->fecha_pago=$request->fechapago;
        $cuota->notas=$request->notas;
        $cuota->id_cliente=$request->cliente;


        $cuota->saveOrFail();
        return redirect()->route("cuotas.index")->with([
            "success" => "La nueva cuota fue registrada correctamente",
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
        $cuota = Cuota::find($id);
        return view("Cuota.delete", compact('cuota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuota = Cuota::find($id);
        return view("Cuota.edit", compact('cuota'));
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
        
        $cuota = Cuota::find($id);
        $cuota->fill($request->input())->saveOrFail();
        return redirect()->route("Cuota.index")
            ->with(["success" => "Los datos de la cuota han sido actualizados"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuota = Cuota::find($id);
        $cuota->delete();
        return redirect()->route("Cuota.delete")->with([
            "warning" => "La cuota fue eliminada correctamente",
        ]);
    }
}
