@php
    $indice = 0;
@endphp

@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Equipos
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Equipos</h2>
        <br>
        <a href="{{ route('equipos.create') }}" class="btn btn-primary mb-3">Crear Equipos</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nº Serie</th>
                    <th>Equipo</th>
                    {{-- <th>Fecha de Nacimiento</th> --}}
                    <th>Ver Detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->no_serie }}</td>
                        <td>{{ $equipo->tipo_equipo }}</td>
                        {{-- <td>{{ $propietario->fecha_nacimiento }}</td> --}}

                        <!-- botones -->
                        <td><a href="{{route('equipos.show', $equipo->id)}}" class="btn btn-info">Ver Detalles</a></td>
                        <td><a href="{{route('equipos.edit', $equipo->id)}}" class="btn btn-warning">Editar</a></td>
                        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $indice }}">
                                Eliminar
                            </button></td>

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
                                        <form action="{{route('equipos.destroy', $equipo->id)}}" method="post">
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
    </div>
@endsection
