@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Crear Equipo
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Crear equipo</h2>
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
            <form action="{{ route('equipos.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="no_serie" class="mb-2">Numero de Serie:</label>
                    <input type="text" class="form-control" id="no_serie" name="no_serie" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tipo_equipo" class="mb-2">Tipo de Equipo:</label>
                    <input type="text" class="form-control" id="tipo_equipo" name="tipo_equipo" required>
                </div>

                <!-- Input especial para los usuarios -->
                <div class="form-group mb-3">
                    <label for="autocompleteInput" class="form-label">Usuario:</label>
                    <input type="text" id="autocompleteInput" class="form-control"
                        placeholder="Busca un usuario(por defecto admin)" autocomplete="off">
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
        
        // Cierra la lista cuando se hace clic fuera del campo de texto y la lista
        document.addEventListener('click', function(event) {
            if (!event.target.closest('#autocompleteInput') && !event.target.closest('#userList')) {
                userList.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            input.addEventListener('keyup', function(event) {
                if (event.key === 'Escape') {
                    userList.style.display = 'none';
                }
            });
        });
    </script>
@endsection
