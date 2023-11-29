@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Editar Usuario
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Editar Usuario</h2>
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
            <form action="{{ route('users.update', $user->id) }}" method="POST">

                <div class="form-group mb-3">
                    @csrf
                    @method('PUT')
                    <div class="form-group  mb-3">
                        <label for="nombre_rol" class="mb-2">Nombre del Usuario:</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                            value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Correo del usuario</label>
                        <input class="form-control" type="email" name="correo_usuario" id="correo"
                            value="{{ $user->email }}">
                    </div>

                    <!-- Input especial para los propietarios -->
                    <div class="form-group mb-3">
                        <label for="autocompleteInput" class="form-label">Propietario:</label>
                        <input type="text" id="autocompleteInput" class="form-control" placeholder="Buscar propietario"
                            autocomplete="off" value="{{$user->propietario->nombre_completo}}">
                        <input type="hidden" name="propietario" id="selectedPropietarioId" value="{{$user->propietario->id}}">

                        <!-- Lista de propietarios oculta -->
                        <div style="z-index: 15; position: absolute;">
                            <ul id="propietarioList" class="list-group" style="display: none; cursor: pointer;"></ul>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tipo_usuario" class="mb-2">Rol del Usuario:</label>
                        <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                            <option value="Admin" {{ $user->rol == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Estudiante" {{ $user->rol == 'Estudiante' ? 'selected' : '' }}>Estudiante
                            </option>
                        </select>
                    </div>

                    <div class="text-left mb-3">
                        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                        <a href="{{ route('users.index') }}" class="btn btn-warning">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        /* Lista de datos que se usarán para los scripts de autocompletado */
        const propietarios = {!! json_encode($propietarios) !!};
    </script>

    <!-- Script para autocompletar los propietarios -->
    <script>
        // Elementos del DOM
        const propietarioInput = document.getElementById('autocompleteInput');
        const selectedPropietarioIdInput = document.getElementById('selectedPropietarioId');
        const propietarioList = document.getElementById('propietarioList');

        // Escucha el evento de entrada en el campo de texto
        propietarioInput.addEventListener('input', function () {
            selectedPropietarioIdInput.value = "";
            const query = propietarioInput.value.toLowerCase();

            // Filtra los propietarios que coinciden con la consulta
            const filteredPropietarios = propietarios.filter(propietario => propietario.nombre_completo.toLowerCase().includes(query));

            // Muestra la lista de propietarios
            displayPropietarioList(filteredPropietarios);
        });

        // Muestra la lista de propietarios
        function displayPropietarioList(propietarios) {
            // Limpia la lista existente
            propietarioList.innerHTML = '';

            // Muestra la lista de propietarios filtrados
            propietarios.forEach(propietario => {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.textContent = propietario.nombre_completo;
                listItem.addEventListener('click', function () {
                    // Cuando se hace clic en un propietario, establece la ID en el campo oculto y el valor en el campo de texto
                    selectedPropietarioIdInput.value = propietario.id;
                    propietarioInput.value = propietario.nombre_completo;
                    // Oculta la lista
                    propietarioList.style.display = 'none';
                });
                propietarioList.appendChild(listItem);
            });

            // Muestra la lista si hay propietarios filtrados, de lo contrario, la oculta
            propietarioList.style.display = propietarios.length > 0 ? 'block' : 'none';
        }

        // Cierra la lista cuando se hace clic fuera del campo de texto y la lista
        document.addEventListener('click', function (event) {
            if (!event.target.closest('#autocompleteInput') && !event.target.closest('#propietarioList')) {
                propietarioList.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            propietarioInput.addEventListener('keyup', function(event) {
                if (event.key === 'Escape') {
                    propietarioList.style.display = 'none';
                }
            });
        });
    </script>
@endsection
