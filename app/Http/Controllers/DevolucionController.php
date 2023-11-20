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
        
        return redirect('/formulario_devoluciones')->with('exito', 'Se ha guardado correctamente la devolucion');
    }

    public function returnView()
    {
        $usuarios = User::all();
        $equipos = Equipo::all();

        return view('devoluciones',['usuarios'=> $usuarios,'equipos'=> $equipos]);
    }

    public function index()
    {
        $devoluciones = Devolucion::all();
        return view('devoluciones.index', compact('devoluciones'));
    }
}
