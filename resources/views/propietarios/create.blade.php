@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Crear Propietario
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Crear Propietario</h2>
        <br>
        @if (session('exito'))
            <div class="alert alert-success">
                {{session('exito')}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('propietario.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="nombre_completo" class="mb-2">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                </div>

                <div class="form-group mb-3">
                    <label for="fecha_nac" class="mb-2">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                </div>

                <div class="form-group mb-3">
                    <label for="identidad" class="mb-2">Número de Identidad:</label>
                    <input type="text" class="form-control" id="identidad" name="identidad" required>
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <textarea class="form-control" id="direccion" name="direccion" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen (Personal):</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>

                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Guardar Propietario</button>
                    <a href="{{route('propietarios.index')}}" class="btn btn-warning">Regresar</a>
                </div>
                
            </form>
        </div>        
    </div>
@endsection
