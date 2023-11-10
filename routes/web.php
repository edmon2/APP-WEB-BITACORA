<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;

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

Route::get('/formulario_usuarios', function () {
    return view('usuarios')->with(['nombre_rol'=>'Rol_1','id'=>1]);
});

Route::post('/insertar_roles', [RolController::class, "store"])->name('rol.store');
Route::post('/insertar_usuarios', [UserController::class, "store"])->name('usuario.store');
