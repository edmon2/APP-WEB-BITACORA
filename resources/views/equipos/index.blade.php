@php
    $indice = 0;
    $listaNoFilas = [5, 10, 25, 50, 100];
@endphp

@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Equipos
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Equipos</h2>
        <br>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('equipos.create') }}" class="btn btn-primary mb-3">Crear Equipos</a>
    
            <!-- Opción de escoger las filas a mostrar en la tabla -->
            <form action="{{ route('equipos.index') }}" method="GET" class="form-inline">
                <label for="rowsNumber" class="mr-2">Filas por página:</label>
                <select name="rowsNumber" id="rowsNumber" class="form-control" onchange="this.form.submit()">
                    @foreach ($listaNoFilas as $option)
                        <option value="{{ $option }}" {{ $noFilas == $option ? 'selected' : '' }}>
                            {{ $option }}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nº Serie</th>
                    <th>Equipo</th>
                    {{-- <th>Fecha de Nacimiento</th> --}}
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->no_serie }}</td>
                        <td>{{ $equipo->tipo_equipo }}</td>
                        {{-- <td>{{ $propietario->fecha_nacimiento }}</td> --}}

                        <!-- botones -->
                        <td style="width: 300px">
                            <a href="{{ route('equipos.show', $equipo->id) }}" class="btn btn-info ml-2 mr-2">Ver Detalles</a>
                            <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning ml-2 mr-2">Editar</a>
                            <button type="button" class="btn btn-danger ml-2 mr-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $indice }}">
                                Eliminar
                            </button>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $indice }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Equipo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea eliminar este Equipo?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>

                    <!-- Actualizacion del Indice -->
                    @php
                        $indice = $indice + 1;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $equipos->appends(['rowsNumber' => $noFilas])->links() }}
        </div>      
    </div>
@endsection
