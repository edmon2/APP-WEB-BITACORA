<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\DevolucionController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\VisitanteFabController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VisitanteLabController;

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
 * Rutas para la autenticacion
 */

Route::middleware('auth')->group(function () {

    /**
     * Rutas que solo seran visibles para un admin
     */

    Route::middleware('adminDC')->group(function () {
       
        /**
         * Rutas para Usuarios
         */

        Route::get('/users', [UserController::class, "index"])->name('users.index');
        Route::get('/users/create', [UserController::class, "create"])->name('users.create');
        Route::post('/users', [UserController::class, "store"])->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/edit/{user}', [UserController::class, "edit"])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/find',[UserController::class, 'find'])->name('users.find');
        
         /**
     * Rutas para visitantes
     */ 
    Route::put('/visitantes/{visitante}', [VisitanteController::class, 'update'])->name('visitantes.update');
    Route::get('/visitantes/edit/{visitante}', [VisitanteController::class, "edit"])->name('visitantes.edit');
    Route::get('/visitantes/{visitante}', [VisitanteController::class, 'show'])->name('visitantes.show');
    Route::get('/visitante/create', [VisitanteController::class, "create"])->name('visitantes.create');
    Route::get('/visitante', [VisitanteController::class, "index"])->name('visitantes.index');
    Route::post('/visitantes', [VisitanteController::class, "store"])->name('visitantes.store');
    Route::delete('/visitantes/{visitante}', [VisitanteController::class, 'destroy'])->name('visitantes.destroy');
    Route::post('/visitantes/find',[VisitanteController::class, 'find'])->name('visitantes.find');
     /**
         * Ruta para generar reporte de bitacora de visitantes
         */
 
    Route::get('/', [ReporteController::class, "index"])->name('visitantes.index');
    Route::get('/export', [ReporteController::class, "export"])->name('export');
        /**
         * Eliminacion del perfil automatica solo pueden hacerlo los admins
         */
       Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

     


    
 Route::middleware('adminlab')->group(function () {
        Route::put('/visitanteslab/{visitantelab}', [VisitanteLabController::class, 'update'])->name('visitanteslab.update');
        Route::get('/visitanteslab/edit/{visitantelab}', [VisitanteLabController::class, "edit"])->name('visitanteslab.edit');
        Route::get('/visitanteslab/{visitantelab}', [VisitanteLabController::class, 'show'])->name('visitanteslab.show');
        Route::get('/visitantelab/create', [VisitanteLabController::class, "create"])->name('visitanteslab.create');
        Route::get('/visitantelab', [VisitanteLabController::class, "index"])->name('visitanteslab.index');
        Route::post('/visitanteslab', [VisitanteLabController::class, "store"])->name('visitanteslab.store');
        Route::delete('/visitanteslab/{visitantelab}', [VisitanteLabController::class, 'destroy'])->name('visitanteslab.destroy');
        Route::post('/visitanteslab/find',[VisitanteLabController::class, 'find'])->name('visitanteslab.find');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware('adminfab')->group(function () {
        Route::put('/visitantesfab/{visitantefab}', [VisitanteFabController::class, 'update'])->name('visitantesfab.update');
        Route::get('/visitantesfab/edit/{visitantefab}', [VisitanteFabController::class, "edit"])->name('visitantesfab.edit');
        Route::get('/visitantesfab/{visitantefab}', [VisitanteFabController::class, 'show'])->name('visitantesfab.show');
        Route::get('/visitantefab/create', [VisitanteFabController::class, "create"])->name('visitantesfab.create');
        Route::get('/visitantefab', [VisitanteFabController::class, "index"])->name('visitantesfab.index');
        Route::post('/visitantesfab', [VisitanteFabController::class, "store"])->name('visitantesfab.store');
        Route::delete('/visitantesfab/{visitantefab}', [VisitanteFabController::class, 'destroy'])->name('visitantesfab.destroy');
        Route::post('/visitantesfab/find',[VisitanteFabController::class, 'find'])->name('visitantesfab.find');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    /**
     * Home
     */

    Route::get('/', function () {
        return view('home');
    })->name('home');



});

require __DIR__ . '/auth.php'; 
