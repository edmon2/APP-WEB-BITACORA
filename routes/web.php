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

<<<<<<< HEAD
    Route::middleware('adminDC')->group(function () {
       
=======
    Route::middleware('admin')->group(function () {
        /**
         * Rutas para devoluciones
         */
        Route::get('/devoluciones', [DevolucionController::class, "index"])->name('devoluciones.index');
        Route::get('/devoluciones/create', [DevolucionController::class, "create"])->name('devoluciones.create');
        Route::get('/devoluciones/{devolucion}', [DevolucionController::class, 'show'])->name('devoluciones.show');
        Route::get('/devoluciones/edit/{devolucion}', [DevolucionController::class, "edit"])->name('devoluciones.edit');
        Route::put('/devoluciones/{devolucion}', [DevolucionController::class, 'update'])->name('devoluciones.update');
        Route::post('/devoluciones', [DevolucionController::class, "store"])->name('devoluciones.store');
        Route::delete('/devoluciones/{devolucion}', [DevolucionController::class, 'destroy'])->name('devoluciones.destroy');
>>>>>>> d2f29c56afedeae808201d395706ea3bb4bb7308
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
<<<<<<< HEAD
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
=======

        /**
         * Rutas para propietarios
         */
        Route::get('/propietarios/create', [PropietarioController::class, "create"])->name('propietarios.create');
        Route::get('/propietarios/edit/{propietario}', [PropietarioController::class, "edit"])->name('propietarios.edit');
        Route::get('/propietarios/{propietario}', [PropietarioController::class, 'show'])->name('propietarios.show');        
        Route::get('/propietarios', [PropietarioController::class, "index"])->name('propietarios.index');
        Route::post('/propietarios', [PropietarioController::class, "store"])->name('propietario.store');
        Route::delete('/propietarios/{propietario}', [PropietarioController::class, 'destroy'])->name('propietarios.destroy');
        Route::get('/propietarios/find',[PropietarioController::class, 'find'])->name('propietarios.find');
    
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
        Route::get('/equipos', [EquipoController::class, "index"])->name('equipos.index');
        Route::get('/equipos/create', [EquipoController::class, "create"])->name('equipos.create');
        Route::get('/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
        Route::get('/equipos/edit/{equipo}', [EquipoController::class, "edit"])->name('equipos.edit');
        Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
        Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
        Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');

>>>>>>> d2f29c56afedeae808201d395706ea3bb4bb7308
        /**
         * Eliminacion del perfil automatica solo pueden hacerlo los admins
         */
       Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });

<<<<<<< HEAD
=======
    /**
     * Rutas propias de una Estudiante
     */

    Route::middleware('student')->group(function () {
        Route::get('/misequipos', [EquipoController::class, "misequipos"])->name('equipos.misequipos');
        Route::get('/datospersonales', [PropietarioController::class, 'datospersonales'])->name('datospersonales');
        Route::get('/datospersonales/edit', [PropietarioController::class, "datospersonales_edit"])->name('datospersonales.edit');
    });

    /**
     * Rutas disponibles para todos los Usuarios
     */
    Route::put('/propietarios/{propietario}', [PropietarioController::class, 'update'])->name('propietarios.update');
>>>>>>> d2f29c56afedeae808201d395706ea3bb4bb7308
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
