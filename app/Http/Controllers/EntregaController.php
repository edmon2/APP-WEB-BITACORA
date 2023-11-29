<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Equipo;
use App\Models\Propietario;
use App\Models\User;
use Illuminate\Http\Request;



class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $noFilas = $request->input('rowsNumber', 5);

        $entregas = Entrega::with('usuario.propietario', 'equipo')->paginate($noFilas);
        return View('entregas.index', compact('entregas', 'noFilas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::where('rol', 'Estudiante')->get();
        $equipos = Equipo::where('entregado', '0')->get();
        return view('entregas.create', compact('usuarios', 'equipos'));
    }

    /**
     * Insercion de Registros
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_equipo' => 'required|integer',
            'id_usuario' => 'required|integer',
            'observaciones' => 'required|string|min:2|max:255',
        ]);

        $entrega = new Entrega();
        $entrega->id_equipo = $request->input('id_equipo');
        $entrega->id_usuario = $request->input('id_usuario');
        $entrega->observaciones = $request->input('observaciones');
        $entrega->fecha_entrega = now();
        $entrega->save();

        /* Actulizacion al campo del equipo para que podamos devolverlo
        de porque ya se asigno a un estudiante*/
        $entrega->equipo->entregado = 1;
        $entrega->equipo->id_usuario = $request->input('id_usuario');
        $entrega->equipo->save();

        return redirect()->route('entregas.create')->with('exito', 'Se ha guardado correctamente la entrega');

    }
    /**
     * Display the specified resource.
     */
    public function show(Entrega $entrega)
    {
        return View('entregas.show', compact('entrega'));
    }

    public function edit(Entrega $entrega)
    {
        $usuarios = User::where('rol', 'Estudiante')->get();
        $equipos = Equipo::all();
        return View('entregas.edit', compact('usuarios', 'equipos', 'entrega'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrega $entrega)
    {
        $request->validate([
            'id_equipo' => 'required|integer',
            'id_usuario' => 'required|integer',
            'observaciones' => 'required',
        ]);

        /* de haber actualizado el equipo el que estaba antes debe 
        regresar a su estado de no entregado*/
        $entrega->equipo->entregado = 0;
        $entrega->equipo->save();

        $entrega->update([
            'id_equipo' => $request->input('id_equipo'),
            'id_usuario' => $request->input('id_usuario'),
            'observaciones' => $request->input('observaciones'),
        ]);

        /* el nuevo equipo debera cambiar de estado y de propietario 
        para que se pueda volver a entregar */
        $newEquipo = Equipo::find($request->input('id_equipo'));
        $newEquipo->entregado = 1;
        $newEquipo->id_usuario = $request->input('id_usuario');
        $newEquipo->save();

        return redirect()->route('entregas.index')->with('exito', 'La entrega se ha actualizado correctamente');
    }

    public function destroy(Entrega $entrega)
    {
        $entrega->delete();
        return redirect()->route('entregas.index')->with('Exito', 'Se ha eliminado');
    }
}
