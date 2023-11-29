@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Editar Entregas
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
            <form action="{{ route('entregas.update', $entrega->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               
                <!-- Input especial para los usuarios -->
                <div class="form-group mb-3">
                    <label for="autocompleteInput" class="form-label">Usuario:</label>
                    <input type="text" id="autocompleteInput" class="form-control" placeholder="Buscar usuario"
                        autocomplete="off" value="{{$entrega->usuario->name}}">
                    <input type="hidden" name="id_usuario" id="selectedUserId" value="{{$entrega->id_usuario}}">

                    <!-- Lista de usuarios oculta -->
                    <div style="z-index: 15; position: absolute;">
                        <ul id="userList" class="list-group" style="display: none; cursor: pointer;"></ul>
                    </div>

                </div>

                <!-- Input especial para los equipos -->
                <div class="form-group mb-3">
                    <label for="autocompleteInputEquipo" class="form-label">Equipo:</label>
                    <input type="text" id="autocompleteInputEquipo" class="form-control" placeholder="Buscar equipo"
                        autocomplete="off" value="{{$entrega->equipo->tipo_equipo . ' - ' . $entrega->equipo->no_serie }}">
                    <input type="hidden" name="id_equipo" id="selectedEquipoId" value="{{$entrega->id_equipo}}">

                    <!-- Lista de equipos oculta -->
                    <div style="z-index: 15; position: absolute;">
                        <ul id="equipoList" class="list-group" style="display: none; cursor: pointer;"></ul>
                    </div>
                </div>       

                

                <div class="form-group mb-3">
                    <label for="observaciones" class="mb-2">Observaciones:</label>
                    <textarea  class="form-control" name="observaciones" id="observaciones" rows="4" required>{{$entrega->observaciones}}</textarea>
                </div>

                <div class="text-left mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar Entrega</button>
                    <a href="{{route('entregas.index')}}" class="btn btn-warning">Regresar</a>
                </div>
                
            </form>
        </div>        
    </div>

    <script>
        /*listas de datos que se usaran para los scripts de autocompletado*/
        const equipos = {!! json_encode($equipos) !!};
        const users = {!! json_encode($usuarios) !!};
    </script>

    <!-- Script para autocompletar los usuarios -->
    <script>
        // Elementos del DOM
        const input = document.getElementById('autocompleteInput');
        const selectedUserIdInput = document.getElementById('selectedUserId');
        const userList = document.getElementById('userList');

        // Escucha el evento de entrada en el campo de texto
        input.addEventListener('input', function() {
            selectedUserIdInput.value = "";
            const query = input.value.toLowerCase();

            // Filtra los usuarios que coinciden con la consulta
            const filteredUsers = users.filter(user => user.name.toLowerCase().includes(query));

            // Muestra la lista de usuarios
            displayUserList(filteredUsers);
        });

        // Muestra la lista de usuarios
        function displayUserList(users) {
            // Limpia la lista existente
            userList.innerHTML = '';

            // Muestra la lista de usuarios filtrados
            users.forEach(user => {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.textContent = user.name;
                listItem.addEventListener('click', function() {
                    // Cuando se hace clic en un usuario, establece la ID en el campo oculto y el valor en el campo de texto
                    selectedUserIdInput.value = user.id;
                    input.value = user.name;
                    // Oculta la lista
                    userList.style.display = 'none';
                });
                userList.appendChild(listItem);
            });

            // Muestra la lista solo si hay usuarios filtrados
            userList.style.display = users.length > 0 ? 'block' : 'none';
        }

        // Agrega un evento focus a todos los inputs
        var inputs = document.querySelectorAll('input, textarea, select, div, form');
        inputs.forEach(function(input) {
            input.addEventListener('click', function() {
                // Oculta la lista cuando se cambia de input
                userList.style.display = 'none';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            autocompleteInput.addEventListener('keyup', function(event) {
                if (event.key === 'Escape') {
                    userList.style.display = 'none';
                }
            });
        });
    </script>

    <!-- Script para autocompletar los equipos -->
    <script>
        // Elementos del DOM para equipos
        const inputEquipo = document.getElementById('autocompleteInputEquipo');
        const selectedEquipoIdInput = document.getElementById('selectedEquipoId');
        const equipoList = document.getElementById('equipoList');

        // Escucha el evento de entrada en el campo de texto para equipos
        inputEquipo.addEventListener('input', function() {
            selectedEquipoIdInput.value = "";
            const query = inputEquipo.value.toLowerCase();

            // Filtra los equipos que coinciden con la consulta
            const filteredEquipos = equipos.filter(equipo => (equipo.tipo_equipo + ' - ' + equipo.no_serie)
                .toLowerCase().includes(query));

            // Muestra la lista de equipos
            displayEquipoList(filteredEquipos);
        });

        // Muestra la lista de equipos
        function displayEquipoList(equipos) {
            // Limpia la lista existente
            equipoList.innerHTML = '';

            // Muestra la lista de equipos filtrados
            equipos.forEach(equipo => {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.textContent = equipo.tipo_equipo + ' - ' + equipo.no_serie;
                listItem.addEventListener('click', function() {
                    // Cuando se hace clic en un equipo, establece la ID en el campo oculto y el valor en el campo de texto
                    selectedEquipoIdInput.value = equipo.id;
                    inputEquipo.value = equipo.tipo_equipo + ' - ' + equipo.no_serie;
                    // Oculta la lista
                    equipoList.style.display = 'none';
                });
                equipoList.appendChild(listItem);
            });

            // Muestra la lista solo si hay equipos filtrados
            equipoList.style.display = equipos.length > 0 ? 'block' : 'none';
        }

        // Agrega un evento focus a todos los inputs para equipos
        var inputs = document.querySelectorAll('input, textarea, select, div, form');
        inputs.forEach(function(input) {
            input.addEventListener('click', function() {
                // Oculta la lista cuando se cambia de input
                equipoList.style.display = 'none';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            inputEquipo.addEventListener('keyup', function(event) {
                if (event.key === 'Escape') {
                    equipoList.style.display = 'none';
                }
            });
        });
    </script>
@endsection
