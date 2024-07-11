@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Crear Equipo
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Crear equipo</h2>
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
            <form action="{{ route('equipos.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="no_serie" class="mb-2">Numero de Serie:</label>
                    <input type="text" class="form-control" id="no_serie" name="no_serie" style="background-color: #E2E3E5" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tipo_equipo" class="mb-2">Tipo de Equipo:</label>
                    <input type="text" class="form-control" id="tipo_equipo" name="tipo_equipo" style="background-color: #E2E3E5" required>
                </div>

                <!-- Input especial para los usuarios -->
                <div class="form-group mb-3">
                    <label for="autocompleteInput" class="form-label">Usuario:</label>
                    <input type="text" id="autocompleteInput" class="form-control"
                        placeholder="Busca un usuario(por defecto admin)" autocomplete="off" style="background-color: #E2E3E5">
                    <input type="hidden" name="id_usuario" id="selectedUserId">

                    <!-- Lista de usuarios oculta -->
                    <div style="z-index: 15; position: absolute;">
                        <ul id="userList" class="list-group" style="display: none; cursor: pointer;"></ul>
                    </div>

                </div>


                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Guardar Equipo</button>
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
