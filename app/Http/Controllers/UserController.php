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
            'contraseña_usuario'=>'required|min:8|max:50',
            'tipo_usuario'=>'required|string',
            'propietario'=>'required|integer',
        ]);

        $usuario = new User();
        $usuario->name = $request->input('nombre_usuario');
        $usuario->email = $request->input('correo_usuario');
        $usuario->password = $request->input('contraseña_usuario');
        $usuario->rol = $request->input('tipo_usuario');
        $usuario->id_propietario = $request->input('propietario');
        $usuario->save();

        return redirect()->route('users.create')->with('exito', 'El usuario se ha guardado correctamente');

    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {   
        $propietarios = Propietario::all();
        return view('users.create', compact('propietarios'));
    }

    public function show(User $user)
    {
        $propietario=Propietario::find($user->id_propietario);
        return view('users.show', compact('propietario','user'));
    }    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('exito', 'El usuario se ha eliminado correctamente');
    }

    public function edit(User $user)
    {
        $propietarios=Propietario::all();
        $propietario=Propietario::find($user->id_propietario);
        return view('users.edit', compact('propietario','user', 'propietarios'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre_usuario'=>'required|string|min:2',
            'correo_usuario'=>'required|email',
            'tipo_usuario'=>'required|string',
            'propietario'=>'required|integer',
        ]);

        $user->update([
            'name' => $request->input('nombre_usuario'),
            'rol' => $request->input('tipo_usuario'),
            'email'=> $request->input('correo_usuario'),
            'id_propietario' => $request->input('propietario'),
        ]);        

        return redirect()->route('users.index')->with('exito', 'El usuario se ha correctamente');

    }
}
