<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function indexE()
    {
        return view("Inicio.loginE");
    }

    public function indexC()
    {
        return view("Inicio.loginC");
    }

    public function accessC()
    {
        $credentials = request()->only('correo', 'password');

        if (Auth::attempt($credentials,)) {
            request()->session()->regenerate();
            return redirect()->route("accessC")->with([
                "success" => "Login realizado con exito",
            ]);
        } else {
            return redirect()->route("indexC")->with([
                "success" => "El login no pudo realizarse correctamente",
            ]);
        }
    }

    public function accessE()
    {
        $credentials = request()->only('correo', 'password');
        $remember = request()->filled('remember');

        if (Auth::attempt($credentials,$remember)) {
            request()->session()->regenerate();
            return redirect()->route("accessE")->with([
                "success" => "Login realizado con exito",
            ]);
        } else {
            return redirect()->route("indexE")->with([
                "success" => "El login no pudo realizarse correctamente",
            ]);
        }
    }

    public function logout(Request $request)
    {
        
        Auth::logout();

        //invalida la sesion y genera una nueva
        $request->session()->invalidate();
        //regenera el token scrf
        $request->session()->regenerateToken();


        return redirect()->url("/");
    }
}
