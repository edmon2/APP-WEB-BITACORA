<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\User;
use App\Models\Equipo;
use Illuminate\Http\Request;

class DevolucionController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'id_equipo'=>'required|integer',
            'id_usuario'=>'required|integer',
            'observaciones'=>'required|string|min:2|max:255',
        ]);

        $devolucion = new Devolucion();
        $devolucion->id_equipo = $request->input('id_equipo');
        $devolucion->id_usuario = $request->input('id_usuario');
        $devolucion->observaciones = $request->input('observaciones');
        $devolucion->fecha_devolucion = now();
        $devolucion->save();
    
        return redirect()->route('devoluciones.index')->with('exito', 'Se ha guardado correctamente la devolucion');
    }

   

    public function index()
    {
        $devoluciones = Devolucion::all();
        return view('devoluciones.index', compact('devoluciones'));
    }

    public function create()
    {   
        $equipos = equipo::all();
        $usuarios = User::all();
        return view('devoluciones.create', compact('usuarios' ,'equipos'));
    }

    public function show(Devolucion $devolucion)
    {
        
        $usuario = User::find($devolucion->id_usuario);
        $equipo = equipo::find($devolucion->id_equipo);
        return view('devoluciones.show', compact('usuario', 'equipo', 'devolucion'));
    }

    public function edit(Devolucion $devolucion)
    {
        
        return view('devoluciones.edit', compact('usuarios', 'devoluciones'));
    }
   
    public function destroy(Devolucion $devolucion)
    {
        $devolucion->delete();
        return redirect()->route('devoluciones.index')->with('exito', 'La devolucion se ha eliminado correctamente');
    }
}
