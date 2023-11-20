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
    public function index()
    {
        $entregas = Entrega::all();
        return View('entregas.index', compact('entregas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entregas.create');
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

        return redirect('/formulario_entregas')->with('exito', 'Se ha guardado correctamente');

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


    public function returnView()
    {
        $equipos = Equipo::all();
        $usuarios = User::all();

        return view('entregas',['equipos'=> $equipos,'usuarios'=> $usuarios]);
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
