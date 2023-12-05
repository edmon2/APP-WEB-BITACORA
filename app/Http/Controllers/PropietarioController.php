<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropietarioController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('find')) {
            $busqueda = $request->input('find');
            $noFilas = $request->input('rowsNumber', 5);

            $propietarios = Propietario::
            where('nombre_completo', 'like', '%' . $busqueda . '%')
            ->paginate($noFilas);

            return View('propietarios.index', compact('propietarios', 'noFilas','busqueda'));
        }else{
            $noFilas = $request->input('rowsNumber', 5);

            $propietarios = Propietario::paginate($noFilas);
            return view('propietarios.index', compact('propietarios', 'noFilas'));
        }
    }
    public function find(Request $request)
    {
        if ($request->has('find')) {
            $busqueda = $request->input('find');
            $noFilas = $request->input('rowsNumber', 5);

            $propietarios = Propietario::
            where('nombre_completo', 'like', '%' . $busqueda . '%')
            ->paginate($noFilas);

            return View('propietarios.index', compact('propietarios', 'noFilas','busqueda'));
        }else{
            $noFilas = $request->input('rowsNumber', 5);

            $propietarios = Propietario::paginate($noFilas);
            return view('propietarios.index', compact('propietarios', 'noFilas'));
        }

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

        $imagePath = $request->file('imagen')->store('images', 'public');

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

    public function datospersonales()
    {
        $propietario = Auth::user()->propietario;
        return view('propietarios.show', compact('propietario'));
    }

    public function edit(Propietario $propietario)
    {
        return view('propietarios.edit', compact('propietario'));
    }

    public function datospersonales_edit()
    {
        $propietario = Auth::user()->propietario;
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
            $imagePath = $request->file('imagen')->store('images', 'public');
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

        if (Auth::user()->isAdmin()) {
            return redirect()->route('propietarios.index')->with('exito', 'El propietario se ha actualizado correctamente');
        } else {
            return redirect()->route('datospersonales', Auth::user()->propietario->id)->with('exito', 'El propietario se ha actualizado correctamente');
        }

    }

    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
        return redirect()->route('propietarios.index')->with('exito', 'El propietario se ha eliminado correctamente');
    }
}
