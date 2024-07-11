@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Crear Usuario
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Crear Usuario</h2>
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
            <form action="{{ route('users.store') }}" method="POST">

                <div class="form-group mb-3">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nombre_rol" class="mb-2">Nombre del Usuario:</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                            required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Correo del usuario</label>
                        <input class="form-control" type="email" name="correo_usuario" id="correo">
                    </div>

                    <div class="form-group mb-3">
                        <label for="contraseña_usuario" class="mb-2">Contraseña del Usuario:</label>
                        <input type="password" class="form-control" id="contraseña_usuario"
                            name="contraseña_usuario" required>
                    </div>

                    
                 


                    <div class="form-group mb-3">
                        <label for="tipo_usuario" class="mb-2">Rol del Usuario:</label>
                        <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                            <option value="AdminDataCenter">Admin Data Center</option>
                            <option value="AdminFabrica">Admin Fabrica</option>
                            <option value="AdminLaboratorio">Admin Laboratorio</option>
                        </select>
                    </div>


                    <div class="text-left mb-3">
                        <button type="submit" class="btn" style="background-color: #329702; color: #ffffff;">Guardar Usuario</button>
                        <a href="{{route('users.index')}}" class="btn btn-warning">Regresar</a>
                    </div>
                </div>
            </form>
        </div>        
    </div>

    <script>
        /* Lista de datos que se usarán para los scripts de autocompletado */
               
        {!! Vite::content('resources/js/autocompletePropietarios.js') !!}
    </script>
@endsection
