<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Tarea;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session(['avatar' => mt_rand(1, 10)]);
        if(auth()->user()->isAdmin()){
            session(['noti' => Tarea::where('tipo', 'cliente')->count()]);
            return redirect('tareas');
        } elseif(auth()->user()->isOperario()){
            return redirect('tareasOp');
        } elseif(auth()->user()->isInvitado()){
            return redirect('/info');

        } else{
            return view('Inicio.loginE');

        }
        
    }
}
