<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitante;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VisitanteController extends Controller{
  
    public function index(Request $request)
    {
        $noFilas = $request->input('rowsNumber', 5);

        $visitantes = Visitante::paginate($noFilas);
        return view('visitantes.index', compact('visitantes', 'noFilas'));
    }

    public function find(Request $request)
    {
        $request->validate([
            'find' => 'required|string'
        ]);

        $busqueda = $request->input('find');
        $noFilas = $request->input('rowsNumber', 5);

        $visitantes = Visitante::
        where('nombre_completo', 'like', '%' . $busqueda . '%')
        ->paginate($noFilas);

        return view('visitantes.index', compact('visitantes', 'noFilas', 'busqueda'));
    }

    public function create()
    {
        return view('visitantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'fecha_entrada' => 'required|date',
            'identidad' => 'required|string|max:13|min:13',
            'motivo_visita' => 'required|string',
            'departamento' => 'required|string',
            'hora_salida' => 'nullable|date',
        ]);

        $visitante = new Visitante();
        $visitante->nombre_completo = $request->input('nombre_completo');
        $visitante->fecha_entrada = $request->input('fecha_entrada');
        $visitante->no_identidad = $request->input('identidad');
        $visitante->motivo_visita = $request->input('motivo_visita');
        $visitante->departamento = $request->input('departamento');
        $visitante->hora_salida = $request->input('hora_salida');
        $visitante->registered_by = Auth::user()->id;
        $visitante->save();

        return redirect()->route('visitantes.create')->with('exito', 'El visitante se ha guardado correctamente');
    }

    public function show(Visitante $visitante)
    {
        return view('visitantes.show', compact('visitante'));
    }

    public function edit(Visitante $visitante)
    {
        return view('visitantes.edit', compact('visitante'));
    }

    public function update(Request $request, Visitante $visitante)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'fecha_entrada' => 'required|date',
            'identidad' => 'required|string|max:13|min:13',
            'motivo_visita' => 'required|string ',
            'departamento' => 'required|string',
            'hora_salida' => 'nullable|date',
        ]);

        $visitante->update([
            'nombre_completo' => $request->input('nombre_completo'),
            'fecha_entrada' => $request->input('fecha_entrada'),
            'no_identidad' => $request->input('identidad'),
            'motivo_visita' => $request->input('motivo_visita'),
            'departamento' => $request->input('departamento'),
            'hora_salida' => $request->input('hora_salida'),
        ]);

        return redirect()->route('visitantes.index')->with('exito', 'El visitante se ha actualizado correctamente');
    }

    public function destroy(Visitante $visitante)
    {
        $visitante->delete();
        return redirect()->route('visitantes.index')->with('exito', 'El visitante se ha eliminado correctamente');
    }
}

