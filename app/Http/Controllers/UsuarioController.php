<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        // Verificar si hay sesión activa
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $usuario = Usuario::find(session('id'));
        return view('usuario.index', compact('usuario'));
    }

    // Actualizar propio perfil
    public function updatePerfil(Request $request)
    {
        $usuario = Usuario::find(session('id'));

        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|unique:usuarios,usuario,' . $usuario->id,
            'password' => 'nullable|min:4|confirmed'
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        // Actualizar sesión
        session(['nombre' => $usuario->nombre, 'usuario' => $usuario->usuario]);

        return redirect()->route('usuario.index')->with('success', 'Perfil actualizado');
    }
}