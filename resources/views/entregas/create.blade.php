@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Crear entrega
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Crear entrega</h2>
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
            <form action="{{ route('entrega.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group mb-3">
                <label for="equipos" class="form-label">Equipo:</label>
                        <select name="id_equipo" class="form-control" id="id_equipo">

                            <option value="" selected>Selecciona el equipo</option>
                            @foreach ($equipos as $equipo)
                                <option value="{{ $equipo->id }}"> {{ $equipo->tipo_equipo  }}-{{ $equipo->no_serie  }}</option>
                            @endforeach

                        </select>
                </div>

                <div class="form-group mb-3">
                <label for="usuarios" class="form-label">Usuario:</label>
                        <select name="id_usuario" class="form-control" id="id_usuario">

                            <option value="" selected>Selecciona el usuario</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}"> {{ $usuario->name }}</option>
                            @endforeach

                        </select>
                </div>

                

                <div class="form-group mb-3">
                    <label for="observaciones" class="mb-2">Observaciones:</label>
                    <textarea class="form-control" name="observaciones" id="observaciones" rows="4" required></textarea>
                </div>

                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Guardar Entrega</button>
                    <a href="{{route('entregas.index')}}" class="btn btn-warning">Regresar</a>
                </div>
                
            </form>
        </div>        
    </div>
@endsection