<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use App\Models\Propietario;
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

        /* Actulizacion al campo del equipo para que podamos entregarlo
        de nuevo porque ya ha sido devuelto*/
        $devolucion->equipo->entregado = 0;
        $devolucion->equipo->id_usuario = $request->input('id_usuario');
        $devolucion->equipo->save();
    
        return redirect()->route('devoluciones.create')->with('exito', 'Se ha guardado correctamente la devolucion');
    }   

    public function update(Request $request, Devolucion $devolucion)
    {
        $request->validate([
            'id_equipo'=>'required|integer',
            'id_usuario'=>'required|integer',
            'observaciones'=>'required|string|min:2|max:255',
        ]);

        $devolucion->update([
            'id_equipo'=> $request->input('id_equipo'),
            'id_usuario'=> $request->input('id_usuario'),
            'observaciones'=> $request->input('observaciones'),
        ]);
        return redirect()->route('devoluciones.index')->with('exito', 'Se ha actualizado correctamente la devolucion');
    }

    public function index(Request $request)
    {
        $noFilas = $request->input('rowsNumber', 5);

        $devoluciones = Devolucion::with('usuario', 'equipo')->paginate($noFilas);
        return view('devoluciones.index', compact('devoluciones', 'noFilas'));
    }

    public function create()
    {   
        $equipos = Equipo::where('entregado', '1')->get();
        $usuarios = User::where('rol', 'Estudiante')->get();
        return view('devoluciones.create', compact('usuarios' ,'equipos'));
    }

    public function show(Devolucion $devolucion)
    {                  
        $usuario = User::find($devolucion->id_usuario);
        $equipo = Equipo::find($devolucion->id_equipo);
        $propietario = Propietario::find($usuario->id_propietario); 
        return view('devoluciones.show', compact('usuario', 'equipo', 'devolucion', 'propietario'));
    }

    public function edit(Devolucion $devolucion)
    {     
        $equipos = Equipo::all();
        $usuarios = User::where('rol', 'Estudiante')->get();   
        return view('devoluciones.edit', compact('usuarios', 'devolucion', 'equipos'));
    }
   
    public function destroy(Devolucion $devolucion)
    {
        $devolucion->delete();
        return redirect()->route('devoluciones.index')->with('exito', 'La devolucion se ha eliminado correctamente');
    }
}
