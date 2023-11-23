@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Editar Equipo
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Editar Equipo</h2>
        <br>
        @if (session('exito'))
            <div class="alert alert-success">
                {{ session('exito') }}
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
            <form action="{{ route('equipos.update', $equipo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="no_serie" class="mb-2">Nº Serie:</label>
                    <input type="text" class="form-control" id="no_serie" name="no_serie"
                        value="{{ $equipo->no_serie }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tipo_equipo" class="mb-2">Equipo:</label>
                    <input type="text" class="form-control" id="tipo_equipo" name="tipo_equipo"
                        value="{{ $equipo->tipo_equipo }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="id_usuario" class="form-label">Usuario Propietario:</label>
                    <select name="id_usuario" class="form-control" id="id_usuario">

                        <option value="" selected>Selecciona un usuario</option>
                        @foreach ($usuarios as $usuario)
                            @if ($equipo->id_usuario == $usuario->id)
                            <option value="{{ $usuario->id }}" selected> {{ $usuario->name }}</option>
                            @else
                                <option value="{{ $usuario->id }}"> {{ $usuario->name }}</option>
                            @endif

                        @endforeach

                    </select>

                </div>



                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar Equipo</button>
                    <a href="{{ route('equipos.index') }}" class="btn btn-warning">Regresar</a>
                </div>

            </form>
        </div>
    </div>
@endsection