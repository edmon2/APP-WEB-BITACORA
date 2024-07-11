<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Visitante;


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
             
            ]);

            $usuario = new User();
            $usuario->name = $request->input('nombre_usuario');
            $usuario->email = $request->input('correo_usuario');
            $usuario->password = $request->input('contraseña_usuario');
            $usuario->rol = $request->input('tipo_usuario');
            $usuario->save();

            return redirect()->route('users.create')->with('exito', 'El usuario se ha guardado correctamente');

        } catch (\Illuminate\Database\QueryException $ex) {

            $errorCode = $ex->getCode();

            switch ($errorCode) {
                case 23000:
                    $mensajeError = 'El correo proporcionado ya está en uso.';
                    break;
                default:
                    $mensajeError = 'Ocurrió un error durante la insercion.';
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
       
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('exito', 'El usuario se ha eliminado correctamente');
    }

    public function edit(User $user)
    {
      
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {

            $request->validate([
                'nombre_usuario' => 'required|string|min:2',
                'correo_usuario' => 'required|email',
                'tipo_usuario' => 'required|string',
             
            ]);

            $user->update([
                'name' => $request->input('nombre_usuario'),
                'email' => $request->input('correo_usuario'),
                'rol' => $request->input('tipo_usuario'),
 
            ]);

            return redirect()->route('users.index')->with('exito', 'El usuario se ha correctamente');

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
            return redirect()->route('users.edit', compact('user', 'request'))->withErrors($errors);
        }

    }
    public function find(Request $request)
    {
        $request->validate([
            'find' => 'required|string'
        ]);

        $busqueda = $request->input('find');
        $noFilas = $request->input('rowsNumber', 5);
       
        $users = User::where('name', 'like', '%' . $busqueda . '%')->paginate($noFilas);

        return View('users.index', compact('users', 'noFilas','busqueda'));
    }
}
