@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Editar Equipo
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Editar Equipo</h2>
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

                <!-- Input especial para los usuarios -->
                <div class="form-group mb-3">
                    <label for="autocompleteInput" class="form-label">Usuario Propietario:</label>
                    <input type="text" id="autocompleteInput" class="form-control" placeholder="Buscar usuario"
                        autocomplete="off" value="{{ $equipo->usuario->name }}">
                    <input type="hidden" name="id_usuario" id="selectedUserId" value="{{ $equipo->id_usuario }}">

                    <!-- Lista de usuarios oculta -->
                    <div style="z-index: 15; position: absolute;">
                        <ul id="userList" class="list-group" style="display: none; cursor: pointer;"></ul>
                    </div>
                </div>


                <div class="form-group mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <select name="estado" class="form-control" id="estado">
                        <option value="0" {{ $equipo->entregado == '0' ? 'selected' : '' }}>Sin Asignar</option>
                        <option value="1" {{ $equipo->entregado == '1' ? 'selected' : '' }}>Asignado</option>
                    </select>

                </div>

                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar Equipo</button>
                    <a href="{{ route('equipos.index') }}" class="btn btn-warning">Regresar</a>
                </div>

            </form>
        </div>
    </div>

    <script>
        /*listas de datos que se usaran para los scripts de autocompletado*/
        const users = {!! json_encode($usuarios) !!};
        {!! Vite::content('resources/js/autocompleteUsers.js') !!}
    </script>
@endsection
