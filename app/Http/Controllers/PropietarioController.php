<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
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
     * Insercion dde datos a la BD
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo'=>'required|string',
            'fecha_nac'=>'required|date',
            'identidad'=>'required|string|max:13|min:13',
            'estado_propietario'=>'required|boolean',
        ]);

        $propietario = new Propietario();
        $propietario->nombre_completo = $request->input('nombre_completo');
        $propietario->fecha_nacimiento = $request->input('fecha_nac');
        $propietario->no_identidad = $request->input('identidad');
        $propietario->estado = $request->input('estado_propietario');
        $propietario->save();

        return redirect('/formulario_propietarios')->with('exito', 'El propietario se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Propietario $propietario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propietario $propietario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Propietario $propietario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propietario $propietario)
    {
        //
    }
}
