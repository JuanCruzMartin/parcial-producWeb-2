<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\Auth\LoginController;

// Redirigir raíz al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::resource('reparaciones', ReparacionController::class)->parameters(['reparaciones' => 'reparacion']);
});
