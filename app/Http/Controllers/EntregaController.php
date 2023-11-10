<?php

namespace App\Http\Controllers;
use App\Models\Entrega;
use Illuminate\Http\Request;



class EntregaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Insercion de Registros
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_equipo'=>'required',
            'id_usuario'=>'required',
            'fecha_entrega'=>'required',
            'observaciones'=>'required',

        ]);

        $entrega = new Entrega();
        $entrega->id_equipo = $request->input('id_equipo');
        $entrega->id_usuario = $request->input('id_usuario');
        $entrega->fecha_entrega = $request->input('fecha_entrega');
        $entrega->observaciones = $request->input('observaciones');

        $entrega->save();
        
        return redirect('/formulario_roles')->with('exito', 'Se ha guardado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Entrega $entrega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrega $entrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrega $entrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entrega $entrega)
    {
        //
    }
}
