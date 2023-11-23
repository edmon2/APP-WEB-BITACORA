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
        try {

            $request->validate([
                'nombre_usuario' => 'required|string|min:2',
                'correo_usuario' => 'required|email',
                'contraseña_usuario' => 'required|min:8|max:50',
                'tipo_usuario' => 'required|string',
                'propietario' => 'required|integer',
            ]);

            $usuario = new User();
            $usuario->name = $request->input('nombre_usuario');
            $usuario->email = $request->input('correo_usuario');
            $usuario->password = $request->input('contraseña_usuario');
            $usuario->rol = $request->input('tipo_usuario');
            $usuario->id_propietario = $request->input('propietario');
            $usuario->save();

            return redirect()->route('users.create')->with('exito', 'El usuario se ha guardado correctamente');

        } catch (\Illuminate\Database\QueryException $ex) {

            $errorCode = $ex->getCode();

            switch ($errorCode) {
                case 23000:
                    $mensajeError = 'El correo proporcionado ya está en uso.';
                    break;
                default:
                    $mensajeError = 'Ocurrió un error durante la actualización.';
                    break;
            }

            $errors = ['base_de_datos' => $mensajeError];
            return redirect()->route('users.create')->withErrors($errors);
        }

    }

    public function index(Request $request)
    {
        $noFilas = $request->input('rowsNumber', 5);
        
        $users = User::paginate($noFilas);
        return view('users.index', compact('users','noFilas'));
    }

    public function create()
    {
        $propietarios = Propietario::all();
        return view('users.create', compact('propietarios'));
    }

    public function show(User $user)
    {
        $propietario = Propietario::find($user->id_propietario);
        return view('users.show', compact('propietario', 'user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('exito', 'El usuario se ha eliminado correctamente');
    }

    public function edit(User $user)
    {
        $propietarios = Propietario::all();
        return view('users.edit', compact('user', 'propietarios'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|min:2',
            'correo_usuario' => 'required|email',
            'tipo_usuario' => 'required|string',
            'propietario' => 'required|integer',
        ]);

        $user->update([
            'name' => $request->input('nombre_usuario'),
            'email' => $request->input('correo_usuario'),
            'rol' => $request->input('tipo_usuario'),
            'id_propietario' => $request->input('propietario'),
        ]);

        return redirect()->route('users.index')->with('exito', 'El usuario se ha correctamente');

    }
}
