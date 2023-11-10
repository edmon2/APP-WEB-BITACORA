<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EntregaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/** 
 * Rutas para roles
*/

Route::get('/formulario_roles', function () {
    return view('roles');
});

Route::post('/insertar_roles', [RolController::class, "store"])->name('rol.store');

Route::get('/formulario_entregas', function () {
    return view('entregas');
});

Route::post('/insertar_entregas', [EntregaController::class, "store"])->name('entrega.store');