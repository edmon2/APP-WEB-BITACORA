@extends('layouts.app')

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
                    <label for="fecha_entrega" class="mb-2">Fecha de Entrega:</label>
                    <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" required>
                </div>

                <div class="form-group mb-3">
                    <label for="observaciones" class="mb-2">Observaciones:</label>
                    <input type="text" class="form-control" id="observaciones" name="observaciones" required>
                </div>

                
                    
                <div class="form-group mb-3">
                    <label for="correo" class="form-label">Usuario:</label>
                    <select name="users" class="form-control" id="users">
                        @foreach ($usuarios as $user)
                            <option value="{{ $usuarios->id }}"> {{ $usuarios->name }}</option>
                        @endforeach

                    </select>


                </div>
             
                <div class="form-group mb-3">
                    <label for="correo" class="form-label">Equipo:</label>
                    <select name="users" class="form-control" id="users">

                        <option value="" selected>Selecciona el equipo</option>
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}"> {{ $equipo->tipo_equipo }}</option>
                        @endforeach

                    </select>


                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar Devolucion</button>
                    <a href="{{route('devoluciones.index')}}" class="btn btn-warning">Regresar</a>
                </div>
                
            </form>
        </div>        
    </div>
@endsection
