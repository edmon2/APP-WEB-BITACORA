@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Crear Equipo
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Crear equipo</h2>
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
            <form action="{{route('equipos.store')}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="no_serie" class="mb-2">Numero de Serie:</label>
                    <input type="text" class="form-control" id="no_serie" name="no_serie" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tipo_equipo" class="mb-2">Tipo de Equipo:</label>
                    <input type="text" class="form-control" id="tipo_equipo" name="tipo_equipo" required>
                </div>

                <div class="form-group mb-3">
                    <label for="id_usuario" class="form-label">Usuario Propietario:</label>
                    <select name="id_usuario" class="form-control" id="id_usuario">

                        <option value="" selected>Selecciona un usuario(por defecto admin)</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}"> {{ $usuario->name }}</option>
                        @endforeach

                    </select>

                </div>


                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Guardar Equipo</button>
                    <a href="{{route('equipos.index')}}" class="btn btn-warning">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
