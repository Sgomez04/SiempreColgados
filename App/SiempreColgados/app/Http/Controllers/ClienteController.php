<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Paises;
use App\Models\Cuota;
use App\Http\Requests\ClienteValidate;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas['total'] = Cliente::all()->count();
        $paginas['mostrar'] = env('PAGINATE', 4);
        return view("Cliente.list", [
            "clientes" => Cliente::Paginate($paginas['mostrar']),
            "paises" => Paises::all(),
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
        $paises = Paises::all();
        return view("Cliente.create", compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteValidate $request)
    {
        Cliente::createC($request);
        return redirect()->route("clientes.index")->with([
            "success" => "El cliente fue registrado correctamente",
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
    public function update(ClienteValidate $request, $id)
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

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserCuotas($id)
    {
        $paginas['total'] = 0;

        foreach(Cuota::all() as $cuota){
            if($cuota->id_cliente==$id){
                $paginas['total']++;
            }
        }
        $paginas['mostrar'] = 2;

        return view("Cuota.listC", [
            // "cuotas" => Cuota::paginate(2),
            "cuotas" => Cuota::all(),
            "cliente" => Cliente::find($id),
            "paginas" => $paginas
        ]);
    }
}
