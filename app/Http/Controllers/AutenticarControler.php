<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Usuario;
use App\Models\User;


class AutenticarControler extends Controller
{
    public function validar(Request $request)
    {
        $nombre   = $request->input('usuario');
        $usuario = User::where('nombre',$nombre)->first();
        if(is_null($usuario))
            return  redirect('/autenticar')->with('error', 'Usuario no registrado');
        else{
            $password = $request->input('password');
            $password_bd = $usuario->password;
            if (Hash::check($password, $password_bd)) {
                Auth::login($usuario);
                return  redirect('/tablero');
            }else
                return redirect('/autenticar')->with('error', 'Usuario no registrado');
        }
        
    }
}
