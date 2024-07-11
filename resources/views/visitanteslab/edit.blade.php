@extends('layouts.app')

@section('titulo')
Laboratorio-Visitantes | Editar Visitante
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Editar Visitante</h2>
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
            <form action="{{ route('visitanteslab.update', $visitante->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nombre_completo" class="mb-2">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo"
<<<<<<< HEAD:resources/views/visitanteslab/edit.blade.php
                        value="{{ $visitante->nombre_completo }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="fecha_entrada" class="mb-2">Fecha de Entrada:</label>
                    <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada"
                        value="{{ $visitante->fecha_entrada }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="motivo_visita" class="mb-2">Motivo de Visita:</label>
                    <input type="text" class="form-control" id="motivo_visita" name="motivo_visita"
                        value="{{ $visitante->motivo_visita }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="departamento" class="mb-2">Departamento:</label>
                    <input type="text" class="form-control" id="departamento" name="departamento"
                        value="{{ $visitante->departamento }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="hora_salida" class="mb-2">Hora de Salida:</label>
                    <input type="datetime-local" class="form-control" id="hora_salida" name="hora_salida"
                        value="{{ $visitante->hora_salida }}" required>
=======
                        value="{{ $propietario->nombre_completo }}" style="background-color: #E2E3E5" required>
                </div>

                <div class="form-group mb-3">
                    <label for="fecha_nac" class="mb-2">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                        value="{{ $propietario->fecha_nacimiento }}" style="background-color: #E2E3E5" required>
                </div>

                <div class="form-group mb-3">
                    <label for="identidad" class="mb-2">Número de Identidad:</label>
                    <input type="text" class="form-control" id="identidad" name="identidad"
                        value="{{ $propietario->no_identidad }}" style="background-color: #E2E3E5" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <textarea class="form-control" id="direccion" name="direccion" rows="5" style="background-color: #E2E3E5" required>{{ $propietario->direccion }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen (Personal):</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" style="background-color: #E2E3E5">
>>>>>>> d2f29c56afedeae808201d395706ea3bb4bb7308:resources/views/propietarios/edit.blade.php
                </div>

    
                <div class="text-left mt-3">
                    <button type="submit" class="btn" style="background-color: #329702; color: #ffffff;">Actualizar Visitante</button>
                    <a href="{{ route('visitanteslab.index') }}" class="btn btn-warning">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
