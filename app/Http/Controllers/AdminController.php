<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Mostrar panel admin con lista de usuarios
    public function index()
    {
        // Verificar si hay sesión activa
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        // Verificar que sea administrador
        if (session('rol') != 'Administrador') {
            return redirect()->route('usuario.index');
        }

        $usuarios = Usuario::all();
        return view('admin.index', compact('usuarios'));
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|unique:usuarios,usuario',
            'password' => 'required|min:4',
            'rol' => 'required|in:Administrador,Usuario'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'usuario' => $request->usuario,
            'password' => Hash::make($request->password),
            'rol' => $request->rol
        ]);

        return redirect()->route('admin.index')->with('success', 'Usuario creado exitosamente');
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|unique:usuarios,usuario,' . $id,
            'rol' => 'required|in:Administrador,Usuario'
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario;
        $usuario->rol = $request->rol;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('admin.index')->with('success', 'Usuario actualizado');
    }

    // Eliminar usuario
    public function delete($id)
    {
        $usuario = Usuario::findOrFail($id);
        
        // No permitir eliminar el propio usuario
        if ($usuario->id == session('id')) {
            return redirect()->route('admin.index')->with('error', 'No puedes eliminarte a ti mismo');
        }

        $usuario->delete();
        return redirect()->route('admin.index')->with('success', 'Usuario eliminado');
    }

    // Mostrar formulario editar
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.edit', compact('usuario'));
    }
}