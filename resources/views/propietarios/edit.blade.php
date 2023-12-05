@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Editar Propietario
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Editar Propietario</h2>
        <br>
        @if (session('exito'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
                {{ session('exito') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('propietarios.update', $propietario->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nombre_completo" class="mb-2">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo"
                        value="{{ $propietario->nombre_completo }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="fecha_nac" class="mb-2">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                        value="{{ $propietario->fecha_nacimiento }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="identidad" class="mb-2">Número de Identidad:</label>
                    <input type="text" class="form-control" id="identidad" name="identidad"
                        value="{{ $propietario->no_identidad }}" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <textarea class="form-control" id="direccion" name="direccion" rows="5" required>{{ $propietario->direccion }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen (Personal):</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>

                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar Propietario</button>
                    <a @if (Auth::user()->isAdmin()) href="{{ route('propietarios.index') }}"
                    @else
                    href="{{ route('datospersonales', Auth::user()->propietario->id) }}" @endif
                        class="btn btn-warning">Regresar</a>
                </div>

            </form>
        </div>
    </div>
@endsection
