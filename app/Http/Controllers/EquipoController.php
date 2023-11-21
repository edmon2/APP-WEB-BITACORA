<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;

class EquipoController extends Controller
{

    public function store(Request $request)
    {
        // Validación de campos
        $request->validate([
            'no_serie' => 'required|string|max:15|min:15',
            'tipo_equipo' => 'required|string|min:1|max:50',
            'id_usuario' => 'required|integer'
        ]);

        $equipo = new Equipo();
        $equipo->no_serie = $request->input('no_serie');
        $equipo->tipo_equipo = $request->input('tipo_equipo');
        $equipo->id_usuario = $request->input('id_usuario');
        $equipo->save();

        return redirect()->route('equipos.create')->with('exito', 'El equipo se ha guardado correctamente');

    }

    public function returnView()
    {
        $usuarios = User::all();
        return view('equipos',['usuarios'=> $usuarios]);
    }

    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index', compact('equipos'));
    }
    public function create()
    {
        $usuarios = User::all();
        return view('equipos.create', compact('usuarios'));
    }
    public function show(Equipo $equipo)
    {
        $usuario = User::find($equipo->id_usuario);
        return view('equipos.show', compact('usuario','equipo'));
    }
    public function edit(Equipo $equipo)
    {
        $usuarios = User::all();
        return view('equipos.edit', compact('equipo','usuarios'));
    }
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'no_serie' => 'required|string|max:15|min:15',
            'tipo_equipo' => 'required|string|min:1|max:50',
            'id_usuario' => 'required|integer'
        ]);


        $equipo->update([
            'no_serie' => $request->input('no_serie'),
            'tipo_equipo' => $request->input('tipo_equipo'),
            'id_usuario' => $request->input('id_usuario'),
        ]);

        return redirect()->route('equipos.create')->with('exito', $request->input('id_usuario'));
    }
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('exito', 'El equipo se ha eliminado correctamente');
    }
}
