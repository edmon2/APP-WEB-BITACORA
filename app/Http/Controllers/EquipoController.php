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
            'id_usuario' => 'required|integer',
            'estado_equipo' => 'required|boolean',
        ]);

        $equipo = new Equipo();
        $equipo->no_serie = $request->input('no_serie');
        $equipo->tipo_equipo = $request->input('tipo_equipo');
        $equipo->id_usuario = $request->input('id_usuario');
        $equipo->estado = $request->input('estado_equipo');
        $equipo->save();

        return redirect('/formulario_equipos')->with('exito', 'El equipo se ha guardado correctamente');

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
}
