<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropietarioController extends Controller
{

    public function index()
    {
        $propietarios = Propietario::all();
        return view('propietarios.index', compact('propietarios'));
    }

    public function create()
    {
        return view('propietarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'fecha_nac' => 'required|date',
            'identidad' => 'required|string|max:13|min:13',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'direccion' => 'required',
        ]);

        $imagePath = $request->file('imagen')->store('post_images', 'public');

        $propietario = new Propietario();
        $propietario->nombre_completo = $request->input('nombre_completo');
        $propietario->fecha_nacimiento = $request->input('fecha_nac');
        $propietario->no_identidad = $request->input('identidad');
        $propietario->imagen = $imagePath;
        $propietario->direccion = $request->input('direccion');
        $propietario->save();

        return redirect()->route('propietarios.create')->with('exito', 'El propietario se ha guardado correctamente');
    }

    public function show(Propietario $propietario)
    {
        return view('propietarios.show', compact('propietario'));
    }

    public function edit(Propietario $propietario)
    {
        return view('propietarios.edit', compact('propietario'));
    }

    public function update(Request $request, Propietario $propietario)
    {
        $request->validate([
            'nombre_completo' => 'required|string',
            'fecha_nac' => 'required|date',
            'identidad' => 'required|string|max:13|min:13',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'direccion' => 'required',
        ]);

        if ($request->hasFile('imagen')) {
            Storage::disk('public')->delete($propietario->imagen);
            $imagePath = $request->file('imagen')->store('post_images', 'public');
        } else {
            $imagePath = $propietario->imagen;
        }

        $propietario->update([
            'nombre_completo' => $request->input('nombre_completo'),
            'fecha_nacimiento' => $request->input('fecha_nac'),
            'no_identidad' => $request->input('identidad'),
            'imagen' => $imagePath,
            'direccion' => $request->input('direccion'),
        ]);

        return redirect()->route('propietarios.index')->with('exito', 'El propietario se ha actualizado correctamente');
    }

    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
        return redirect()->route('propietarios.index')->with('exito', 'El propietario se ha eliminado correctamente');
    }
}
