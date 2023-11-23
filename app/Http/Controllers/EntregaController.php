<?php

namespace App\Http\Controllers;
use App\Models\Entrega;
use App\Models\Equipo;
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

        $entregas = Entrega::paginate($noFilas);
        return View('entregas.index', compact('entregas', 'noFilas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all();
        $equipos = Equipo::all();
        return view('entregas.create', compact('usuarios', 'equipos'));
    }

    /**
     * Insercion de Registros
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_equipo'=>'required|integer',
            'id_usuario'=>'required|integer',
            'observaciones'=>'required|string|min:2|max:255',

        ]);

        $entrega = new Entrega();
        $entrega->id_equipo = $request->input('id_equipo');
        $entrega->id_usuario = $request->input('id_usuario');
        $entrega->observaciones = $request->input('observaciones');;
        $entrega->fecha_entrega = now();
        $entrega->save();

        return redirect()->route('entregas.create')->with('exito', 'Se ha guardado correctamente la entrega');

    }
    /**
     * Display the specified resource.
     */
    public function show(Entrega $entrega)
    {
        return View('entregas.show',compact('entrega'));
    }
    
    public function edit(Entrega $entrega)
    {
        return View('entregas.edit',compact('entrega'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrega $entrega)
    {
        $request->validate([
        'observacion' => $request->input('observacion'),
        ]);
    }


    
    

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrega $entrega)
    {
        $entrega->delete();
        return redirect()->route('entregas.index')->with('Exito', 'Se ha eliminado');
    }
}
