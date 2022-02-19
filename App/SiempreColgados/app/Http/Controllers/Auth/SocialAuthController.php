<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    public function externalLogin($provider)
    {
        $user = Socialite::driver($provider)->user();
        $userExists = User::where('external_id', $user->id)->where('external_auth', $provider)->first();
        if ($userExists) {
            Auth::login($userExists);
        } else {
            $empleadoNew =  User::create([
                'name' => $user->name,
                'email' => $user->email,
                'external_id' => $user->id,
                'external_auth' => $provider,
                'tipo' => 'I',
            ]);
            Auth::login($empleadoNew);
        }
        return redirect('/info'); // aqui llega logeado

    }

    public function loginRedirect($provider){
        return Socialite::driver($provider)->redirect();
    }
}
