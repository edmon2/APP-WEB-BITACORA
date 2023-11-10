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
            'nombre_usuario'=>'required|string|min:2',
            'correo_usuario'=>'required|email',
            'contraseña_usuario'=>'required|alpha_num|min:8|max:50',
            'estado_usuario'=>'required|boolean',
            'tipo_usuario'=>'required|integer',
            'propietario'=>'required|integer',
        ]);

        $usuario = new User();
        $usuario->name = $request->input('nombre_usuario');
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = $request->input('contraseña_usuario');
        $usuario->estado = $request->input('estado_usuario');
        $usuario->id_rol = $request->input('tipo_usuario');
        $usuario->id_propietario = $request->input('propietario');
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
