@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Editar Usuario
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Crear Usuario</h2>
        <br>        
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
            <form action="{{ route('users.update', $user) }}" method="POST">

                <div class="form-group mb-3">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="nombre_rol" class="mb-2">Nombre del Usuario:</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                        value="{{$user->name}}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Correo del usuario</label>
                        <input class="form-control" type="email" name="correo_usuario" id="correo" value="{{$user->email}}">
                    </div>                    
                    
                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Propietario:</label>
                        <select name="propietario" class="form-control" id="propietario">

                            <option value="" selected>Selecciona el propietario</option>
                            @foreach ($propietarios as $Propietario)
                                <option value="{{ $Propietario->id }}" @if ($Propietario->id == $user->id_propietario)
                                    {{'selected'}}
                                @endif> {{ $Propietario->nombre_completo }}</option>
                            @endforeach

                        </select>


                    </div>
                    <div class="form-group mb-3">
                        <label for="tipo_usuario" class="mb-2">Rol del Usuario:</label>
                        <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                            <option value="Admin" @if ($user->rol == "Admin")
                                {{'selected'}}
                            @endif>Admin</option>
                            <option value="Estudiante" @if ($user->rol == "Estudiante")
                                {{'selected'}}
                            @endif>Estudiante</option>
                        </select>
                    </div>


                    <div class="text-left mb-3">
                        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                        <a href="{{route('users.index')}}" class="btn btn-warning">Regresar</a>
                    </div>
                </div>
            </form>
        </div>        
    </div>
@endsection
