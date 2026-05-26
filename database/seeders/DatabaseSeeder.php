<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario Administrador Principal (Modificado)
        Usuario::create([
            'nombre' => 'Adrian Prado Narvaez',
            'usuario' => 'adrian123',
            'password' => Hash::make('12345678'),
            'rol' => 'Administrador'
        ]);

        // Omar Quispe Mamani - Cambiado a rol Usuario
        Usuario::create([
            'nombre' => 'Omar Quispe Mamani',
            'usuario' => 'omarqm',
            'password' => Hash::make('Omar411*'),
            'rol' => 'Usuario'
        ]);

        // 4 Usuarios adicionales restantes
        Usuario::create([
            'nombre' => 'Ana López García',
            'usuario' => 'analopez',
            'password' => Hash::make('password123'),
            'rol' => 'Usuario'
        ]);

        Usuario::create([
            'nombre' => 'Carlos Pérez Ruiz',
            'usuario' => 'carlosperez',
            'password' => Hash::make('password123'),
            'rol' => 'Usuario'
        ]);

        Usuario::create([
            'nombre' => 'María Flores Mendoza',
            'usuario' => 'mariaflores',
            'password' => Hash::make('password123'),
            'rol' => 'Usuario'
        ]);

        Usuario::create([
            'nombre' => 'José Ramírez Torres',
            'usuario' => 'joseramirez',
            'password' => Hash::make('password123'),
            'rol' => 'Usuario'
        ]);
    }
}