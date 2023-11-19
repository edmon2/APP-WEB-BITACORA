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
 * Rutas para roles
*/

Route::get('/formulario_roles', function () {
    return view('roles');
});

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

Route::post('/insertar_roles', [RolController::class, "store"])->name('rol.store');
Route::post('/insertar_usuarios', [UserController::class, "store"])->name('usuario.store');

/**
 * Rutas para propietarios
*/

Route::get('/propietarios/create', [PropietarioController::class, "create"])->name('propietarios.create');
Route::get('/propietarios/{propietario}', [PropietarioController::class, 'show'])->name('propietarios.show');
Route::get('/propietarios', [PropietarioController::class, "index"])->name('propietarios.index');
Route::get('/propietarios/edit/{propietario}', [PropietarioController::class, "edit"])->name('propietarios.edit');
Route::put('/propietarios/{propietario}', [PropietarioController::class, 'update'])->name('propietarios.update');
Route::post('/propietarios', [PropietarioController::class, "store"])->name('propietarios.store');
Route::delete('/propietarios/{propietario}', [PropietarioController::class, 'destroy'])->name('propietarios.destroy');

/**
 * Rutas para equipos
 */
Route::get('/equipos',[EquipoController::class, "index"])->name('equipos.index');
Route::get('/equipos/create', [EquipoController::class, "create"])->name('equipos.create');
Route::get('/equipos/{usuario}', [EquipoController::class, 'show'])->name('equipos.show');
Route::get('/equipos/edit/{usuario}', [EquipoController::class, "edit"])->name('equipos.edit');
Route::put('/equipos/{usuario}', [EquipoController::class, 'update'])->name('equipos.update');
Route::delete('/equipos/{usuario}', [EquipoController::class, 'destroy'])->name('equipos.destroy');


Route::get('/formulario_equipos',[EquipoController::class, "returnView"])->name('equipo.returnView');
Route::post('/equipos_guardar', [EquipoController::class, 'store'])->name('equipo.store');

Route::get('/formulario_entregas',[EntregaController::class, "returnView"])->name('entrega.returnView');

Route::post('/insertar_entregas', [EntregaController::class, "store"])->name('entrega.store');

/**
 * Rutas para equipos
 */

 Route::get('/formulario_devoluciones',[DevolucionController::class, "returnView"])->name('devolucion.returnView');
 Route::post('/devoluciones_guardar', [DevolucionController::class, 'store'])->name('devolucion.store');
