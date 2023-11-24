<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Propietario;
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
        $equipo->entregado = 0;
        $equipo->save();

        return redirect()->route('equipos.create')->with('exito', 'El equipo se ha guardado correctamente');

    }

    public function returnView()
    {
        $usuarios = User::all();
        return view('equipos',['usuarios'=> $usuarios]);
    }

    public function index(Request $request)
    {       
        $noFilas = $request->input('rowsNumber', 5);
        
        $equipos = Equipo::paginate($noFilas);
        return view('equipos.index', compact('equipos', 'noFilas'));
    }
    public function create()
    {
        $usuarios = User::where('rol', 'Admin')->get();
        return view('equipos.create', compact('usuarios'));
    }
    public function show(Equipo $equipo)
    {
        $usuario = User::find($equipo->id_usuario);
        $propietario = Propietario::find($usuario->id_propietario);
        return view('equipos.show', compact('usuario', 'propietario','equipo'));
    }
    public function edit(Equipo $equipo)
    {
        $usuarios = User::where('rol', 'Estudiante')->get();
        $currentUser = User::find($equipo->id_usuario);
        return view('equipos.edit', compact('equipo', 'usuarios', 'currentUser'));
    }
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'no_serie' => 'required|string|max:15|min:15',
            'tipo_equipo' => 'required|string|min:1|max:50',
            'id_usuario' => 'required|integer',
            'estado' => 'required|boolean',
        ]);


        $equipo->update([
            'no_serie' => $request->input('no_serie'),
            'tipo_equipo' => $request->input('tipo_equipo'),
            'id_usuario' => $request->input('id_usuario'),
            'entregado' => $request->input('estado'),
        ]);

        return redirect()->route('equipos.index')->with('exito', 'El equipo se ha actualizado correctamente');
    }
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipos.index')->with('exito', 'El equipo se ha eliminado correctamente');
    }
}
