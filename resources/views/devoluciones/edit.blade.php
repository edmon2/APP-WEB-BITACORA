@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Editar Devolucion
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Editar Propietario</h2>
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
            <form action="{{route('devoluciones.update', $devolucion->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')                                           
                <!-- Input especial para los usuarios -->
                <div class="form-group mb-3">
                    <label for="autocompleteInput" class="form-label">Usuario:</label>
                    <input type="text" id="autocompleteInput" class="form-control" placeholder="Buscar usuario"
                        autocomplete="off" value="{{$devolucion->usuario->name}}">
                    <input type="hidden" name="id_usuario" id="selectedUserId" value="{{$devolucion->id_usuario}}">

                    <!-- Lista de usuarios oculta -->
                    <div style="z-index: 15; position: absolute;">
                        <ul id="userList" class="list-group" style="display: none; cursor: pointer;"></ul>
                    </div>

                </div>

                <!-- Input especial para los equipos -->
                <div class="form-group mb-3">
                    <label for="autocompleteInputEquipo" class="form-label">Equipo:</label>
                    <input type="text" id="autocompleteInputEquipo" class="form-control" placeholder="Buscar equipo"
                        autocomplete="off" value="{{$devolucion->equipo->tipo_equipo . ' - ' . $devolucion->equipo->no_serie }}">
                    <input type="hidden" name="id_equipo" id="selectedEquipoId" value="{{$devolucion->id_equipo}}">

                    <!-- Lista de equipos oculta -->
                    <div style="z-index: 15; position: absolute;">
                        <ul id="equipoList" class="list-group" style="display: none; cursor: pointer;"></ul>
                    </div>
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

    <script>
        const users = {!! json_encode($usuarios) !!};
        {!! Vite::content('resources/js/autocompleteUsers.js') !!}
    </script>

    <script>
        const equipos = {!! json_encode($equipos) !!};      
        {!! Vite::content('resources/js/autocompleteEquipos.js') !!}
    </script>   
@endsection
