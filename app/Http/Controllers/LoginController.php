<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $usuario = Usuario::where('username', $request->username)->first();
        
        if ($usuario && Hash::check($request->password, $usuario->password)) {
            session([
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'username' => $usuario->username,
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
