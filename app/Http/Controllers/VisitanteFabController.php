<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitanteFab;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VisitanteFabController extends Controller
{
    public function index(Request $request)
    {
        $noFilas = $request->input('rowsNumber', 5);

        $visitantesfab = VisitanteFab::paginate($noFilas);
        return view('visitantesfab.index', compact('visitantesfab', 'noFilas'));
    }

    public function find(Request $request)
    {
        $request->validate([
            'find' => 'required|string'
        ]);

        $busqueda = $request->input('find');
        $noFilas = $request->input('rowsNumber', 5);

        $visitantesfab = VisitanteFab::
        where('nombre_completo', 'like', '%' . $busqueda . '%')
        ->paginate($noFilas);

        return view('visitantesfab.index', compact('visitantesfab', 'noFilas', 'busqueda'));
    }

    public function create()
    {
        return view('visitantesfab.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'fecha_entrada' => 'required|date',
            'motivo_visita' => 'required|string',
            'departamento' => 'required|string',
            'casco' => 'required|boolean',
            'lentes' => 'required|boolean',
            'zapatos' => 'required|boolean',
            'hora_salida' => 'nullable|date',
        ]);

        $visitantefab = new VisitanteFab();
        $visitantefab->nombre_completo = $request->input('nombre_completo');
        $visitantefab->fecha_entrada = $request->input('fecha_entrada');
        $visitantefab->motivo_visita = $request->input('motivo_visita');
        $visitantefab->departamento = $request->input('departamento');
        $visitantefab->casco = $request->input('casco', false);
        $visitantefab->lentes = $request->input('lentes', false);
        $visitantefab->zapatos = $request->input('zapatos', false);
        $visitantefab->hora_salida = $request->input('hora_salida');
        $visitantefab->registered_by = Auth::user()->id;
        $visitantefab->save();

        return redirect()->route('visitantesfab.create')->with('exito', 'El visitante se ha guardado correctamente');
    }

    public function show(VisitanteFab $visitantefab)
    {
        return view('visitantesfab.show', compact('visitantefab'));
    }

    public function edit(VisitanteFab $visitantefab)
    {
        return view('visitantesfab.edit', compact('visitantefab'));
    }

    public function update(Request $request, VisitanteFab $visitantefab)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'fecha_entrada' => 'nullable|date',
            'motivo_visita' => 'required|string',
            'departamento' => 'required|string',
            'casco' => 'nullable|boolean',
            'lentes' => 'nullable|boolean',
            'zapatos' => 'nullable|boolean',
            'hora_salida' => 'nullable|date',
        ]);

        $visitantefab->update([
            'nombre_completo' => $request->input('nombre_completo'),
            'fecha_entrada' => $request->input('fecha_entrada'),
            'motivo_visita' => $request->input('motivo_visita'),
            'departamento' => $request->input('departamento'),
            'casco' => $request->input('casco', false),
            'lentes' => $request->input('lentes', false),
            'zapatos' => $request->input('zapatos', false),
            'hora_salida' => $request->input('hora_salida'),
        ]);
    
        return redirect()->route('visitantesfab.index')->with('exito', 'El visitante se ha actualizado correctamente');
    }

    public function destroy(VisitanteFab $visitantefab)
    {
        $visitantefab->delete();
        return redirect()->route('visitantesfab.index')->with('exito', 'El visitante se ha eliminado correctamente');
    }
}


