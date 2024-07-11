<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitantelab;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VisitanteLabController extends Controller{
  
    public function index(Request $request)
    {
        $noFilas = $request->input('rowsNumber', 5);

        $visitanteslab = Visitantelab::paginate($noFilas);
        return view('visitanteslab.index', compact('visitanteslab', 'noFilas'));
    }

    public function find(Request $request)
    {
        $request->validate([
            'find' => 'required|string'
        ]);

        $busqueda = $request->input('find');
        $noFilas = $request->input('rowsNumber', 5);

        $visitanteslab = Visitantelab::
        where('nombre_completo', 'like', '%' . $busqueda . '%')
        ->paginate($noFilas);

        return view('visitanteslab.index', compact('visitanteslab', 'noFilas', 'busqueda'));
    }

    public function create()
    {
        return view('visitanteslab.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'fecha_entrada' => 'required|date',
            'motivo_visita' => 'required|string',
            'departamento' => 'required|string',
            'hora_salida' => 'nullable|date',
        ]);

        $visitantelab = new Visitantelab();
        $visitantelab->nombre_completo = $request->input('nombre_completo');
        $visitantelab->fecha_entrada = $request->input('fecha_entrada');
        $visitantelab->motivo_visita = $request->input('motivo_visita');
        $visitantelab->departamento = $request->input('departamento');
        $visitantelab->hora_salida = $request->input('hora_salida');
        $visitantelab->registered_by = Auth::user()->id;
        $visitantelab->save();

        return redirect()->route('visitanteslab.create')->with('exito', 'El visitante se ha guardado correctamente');
    }

    public function show(Visitantelab $visitantelab)
    {
        return view('visitanteslab.show', compact('visitantelab'));
    }

    public function edit(Visitantelab $visitantelab)
    {
        return view('visitanteslab.edit', compact('visitantelab'));
    }

    public function update(Request $request, Visitantelab $visitantelab)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'fecha_entrada' => 'required|date',
            'identidad' => 'required|string|max:13|min:13',
            'motivo_visita' => 'required|string ',
            'departamento' => 'required|string',
            'hora_salida' => 'nullable|date',
        ]);

        $visitantelab->update([
            'nombre_completo' => $request->input('nombre_completo'),
            'fecha_entrada' => $request->input('fecha_entrada'),
            'no_identidad' => $request->input('identidad'),
            'motivo_visita' => $request->input('motivo_visita'),
            'departamento' => $request->input('departamento'),
            'hora_salida' => $request->input('hora_salida'),
        ]);

        return redirect()->route('visitanteslab.index')->with('exito', 'El visitante se ha actualizado correctamente');
    }

    public function destroy(Visitantelab $visitantelab)
    {
        $visitante->delete();
        return redirect()->route('visitanteslab.index')->with('exito', 'El visitante se ha eliminado correctamente');
    }
}

