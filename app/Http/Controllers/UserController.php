<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Propietario;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario'=>'required',
            'correo_usuario'=>'required',
            'contraseña_usuario'=>'required',
            'estado_usuario'=>'required',

        ]);

        $usuario = new User();
        $usuario->name = $request->input('nombre_usuario');
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = $request->input('contraseña_usuario');
        $usuario->estado = $request->input('estado_usuario');
        $usuario->id_rol = $request->input('tipo_usuario');
        $usuario->id_propietario = 1;
        $usuario->save();

        return redirect('/formulario_usuarios')->with('exito', 'El usuario se ha guardado correctamente');

    }

    public function returnView()
    {
        $roles = Rol::all();
        $Propietarios = Propietario::all();

        return view('usuarios',['roles'=> $roles,'propietarios'=> $Propietarios]);
    }
}
