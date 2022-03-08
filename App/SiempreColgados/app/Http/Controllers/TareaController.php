<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Http\Requests\TareaValidate;
use App\Http\Requests\EditTareaValidate;
use App\Http\Requests\TareaClienteValidate;


// use Illuminate\Support\Facades\Auth;


class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas['total'] = Tarea::all()->count();
        $paginas['mostrar'] = env('PAGINATE', 4);
        return view("Tarea.list", [
            "tareas" => Tarea::Paginate($paginas['mostrar']),
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
    public function update(EditTareaValidate $request, $id)
    {
        Tarea::updateT($request, $id);
        session(['noti' => Tarea::where('tipo', 'cliente')->count()]);
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
        session(['noti' => Tarea::where('tipo', 'cliente')->count()]);
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
        return view("TareaCliente.createClient", compact('clientes', 'empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listTareaClientes()
    {
        $paginas['total'] = Tarea::where('tipo', 'cliente')->count();
        $paginas['mostrar'] = env('PAGINATE', 4);
        session(['noti' => Tarea::where('tipo', 'cliente')->count()]);
        return view("TareaCliente.list", [
            "tareas" => Tarea::where('tipo', 'cliente')
            ->paginate($paginas['mostrar']),
            "paginas" => $paginas
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClient(TareaClienteValidate $request)
    {
        Tarea::createClient($request);
        return redirect()->route("tareainfo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tareainfo()
    {
        return view("TareaCliente.clienteInfoTarea");
    }
}
