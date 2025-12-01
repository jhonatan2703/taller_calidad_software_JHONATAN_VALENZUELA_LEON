<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoProductoController;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');



// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // CRUD Tipo Producto
    Route::resource('tipos-producto', TipoProductoController::class);
    
    // CRUD Producto
    Route::resource('productos', ProductoController::class);
});