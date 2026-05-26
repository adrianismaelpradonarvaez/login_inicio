<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('usuario', $request->usuario)->first();

        if ($usuario && Hash::check($request->password, $usuario->password)) {
            session([
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'usuario' => $usuario->usuario,
                'rol' => $usuario->rol
            ]);

            if ($usuario->rol == 'Administrador') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('usuario.index');
            }
        }

        return back()->with('error', 'Usuario o contraseña incorrectos');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}