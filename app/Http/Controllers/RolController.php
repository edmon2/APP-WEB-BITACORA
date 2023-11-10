<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class Persona
{
    public $nombre;
    public $edad;

    // Constructor
    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Insercion de Registros
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rol' => 'required|min:2|string',
            'estado_rol' => 'required|boolean',
        ]);

        $rol = new Rol();
        $rol->descripcion_rol = $request->input('nombre_rol');
        $rol->estado_rol = $request->input('estado_rol');
        $rol->save();

        return redirect('/formulario_roles')->with('exito', 'El rol se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     */

    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        //
    }
}
