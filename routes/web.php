<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipoController;

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

Route::get('/formulario_usuarios',[UserController::class, "returnView"])->name('usuario.returnView');

Route::post('/insertar_roles', [RolController::class, "store"])->name('rol.store');
Route::post('/insertar_usuarios', [UserController::class, "store"])->name('usuario.store');

/**
 * Rutas para propietarios
*/

Route::get('/formulario_propietarios', function () {
    return view('propietarios');
});

Route::post('/insertar_propietarios', [PropietarioController::class, "store"])->name('propietario.store');

/**
 * Rutas para equipos
 */

Route::get('/formulario_equipos',[EquipoController::class, "returnView"])->name('equipo.returnView');
Route::post('/equipos_guardar', [EquipoController::class, 'store'])->name('equipo.store');
