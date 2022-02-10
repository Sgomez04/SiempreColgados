<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;
use App\Http\Requests\CuotaValidate;

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
            "cuotas" => Cuota::Paginate(2),
            "clientes" => Cliente::all()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserCuotas($id)
    {
        return view("Cuota.listC", [
            "cuotas" => Cuota::paginate(2),
            "cliente" => Cliente::find("$id"),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("Cuota.create_mensual", [
            "clientes" => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createE()
    {
        return view("Cuota.create_excep", [
            "clientes" => Cliente::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuotaValidate $request)
    {
        Cuota::createM($request, Cliente::all());
        return redirect()->route("cuotas.index")->with([
            "success" => "Las cuotas mensuales fueron creadas correctamente",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeE(CuotaValidate $request)
    {

        Cuota::createE($request, Cliente::all());
        return redirect()->route("cuotas.index")->with([
            "success" => "Las cuota expecepcional fue creada correctamente",
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
        $clientes = Cliente::all();
        return view("Cuota.delete", compact('cuota', 'clientes'));
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
        $clientes = Cliente::all();
        return view("Cuota.edit", compact('cuota', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CuotaValidate $request, $id)
    {
        Cuota::updateC($request, $id);
        return redirect()->route("cuotas.index")
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
        Cuota::destroyC($id);
        return redirect()->route("cuotas.index")->with([
            "warning" => "La cuota fue eliminada correctamente",
        ]);
    }
}
