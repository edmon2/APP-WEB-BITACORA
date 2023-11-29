<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\DevolucionController;

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
/**
 * Home
 */

Route::get('/', function () {
    return view('home');
})->name('home');


/**
 * Rutas para devoluciones
 */
Route::get('/devoluciones',[DevolucionController::class, "index"])->name('devoluciones.index');
Route::get('/devoluciones/create', [DevolucionController::class, "create"])->name('devoluciones.create');
Route::get('/devoluciones/{devolucion}', [DevolucionController::class, 'show'])->name('devoluciones.show');
Route::get('/devoluciones/edit/{devolucion}', [DevolucionController::class, "edit"])->name('devoluciones.edit');
Route::put('/devoluciones/{devolucion}', [DevolucionController::class, 'update'])->name('devoluciones.update');
Route::post('/devoluciones', [DevolucionController::class, "store"])->name('devoluciones.store');
Route::delete('/devoluciones/{devolucion}', [DevolucionController::class, 'destroy'])->name('devoluciones.destroy');

/**
 * Rutas para Usuarios
*/

Route::get('/users',[UserController::class, "index"])->name('users.index');
Route::get('/users/create', [UserController::class, "create"])->name('users.create');
Route::post('/users', [UserController::class, "store"])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/edit/{user}', [UserController::class, "edit"])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

/**
 * Rutas para propietarios
*/

Route::get('/propietarios/create', [PropietarioController::class, "create"])->name('propietarios.create');
Route::get('/propietarios/{propietario}', [PropietarioController::class, 'show'])->name('propietarios.show');
Route::get('/propietarios', [PropietarioController::class, "index"])->name('propietarios.index');
Route::get('/propietarios/edit/{propietario}', [PropietarioController::class, "edit"])->name('propietarios.edit');
Route::put('/propietarios/{propietario}', [PropietarioController::class, 'update'])->name('propietarios.update');
Route::post('/propietarios', [PropietarioController::class, "store"])->name('propietario.store');
Route::delete('/propietarios/{propietario}', [PropietarioController::class, 'destroy'])->name('propietarios.destroy');

/**
 * Rutas para Entregas
 */
Route::get('/entregas/create', [EntregaController::class, "create"])->name('entregas.create');
Route::get('/entregas/{entrega}', [EntregaController::class, 'show'])->name('entregas.show');
Route::get('/entregas', [EntregaController::class, "index"])->name('entregas.index');
Route::get('/entregas/edit/{entrega}', [EntregaController::class, "edit"])->name('entregas.edit');
Route::put('/entregas/{entrega}', [EntregaController::class, 'update'])->name('entregas.update');
Route::post('/entregas', [EntregaController::class, "store"])->name('entregas.store');
Route::delete('/entregas/{entrega}', [EntregaController::class, 'destroy'])->name('entregas.destroy');

/**
 * Rutas para equipos
 */
Route::get('/equipos',[EquipoController::class, "index"])->name('equipos.index');
Route::get('/equipos/create', [EquipoController::class, "create"])->name('equipos.create');
Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
Route::get('/equipos/edit/{equipo}', [EquipoController::class, "edit"])->name('equipos.edit');
Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');

