<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;

// Rutas de autenticación
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de Administrador
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});

// Rutas de Usuario
Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::post('/update-perfil', [UsuarioController::class, 'updatePerfil'])->name('usuario.updatePerfil');
});
// Ruta de registro
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('register.post');