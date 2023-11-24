@extends('layouts.app')PincheOscarDescargueseGit

@section('titulo')
    Recepcion-Equipos | Editar Devolucion
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Editar Propietario</h2>
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
            <form action="{{route('devoluciones.update', $devolucion->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')                                           
                <div class="form-group mb-3">
                    <label for="id_equipo" class="form-label">Usuario:</label>
                    <select name="id_usuario" class="form-control" id="id_usuario">

                        <option value="" selected>Selecciona un Usuario</option>
                        @foreach ($usuarios as $user)
                            <option value="{{ $user->id }}"  {{$user->id == $devolucion->id_usuario ? 'selected' : ''}}> {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
             
                <div class="form-group mb-3">
                    <label for="id_equipo" class="form-label">Equipo:</label>
                    <select name="id_equipo" class="form-control" id="id_equipo">

                        <option value="" selected>Selecciona un equipo</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}"  {{$equipo->id == $devolucion->id_equipo ? 'selected' : ''}}> {{ $equipo->tipo_equipo.' - '.$equipo->no_serie }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group mb-3">
                    <label for="observaciones" class="mb-2">Observaciones:</label>
                    <textarea class="form-control" name="observaciones" id="observaciones" rows="4" required>{{$devolucion->observaciones}}</textarea>
                </div>

                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar Devolucion</button>
                    <a href="{{route('devoluciones.index')}}" class="btn btn-warning">Regresar</a>
                </div>
                
            </form>                       
        </div>        
    </div>
@endsection
