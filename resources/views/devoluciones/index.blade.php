@php
    $indice = 0;
@endphp

@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Devoluciones
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Devoluciones</h2>
        <br>
        {{-- <a href="{{ route('propietarios.create') }}" class="btn btn-primary mb-3">Crear Propietario</a> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Devolucion</th>
                    <th>Observaciones</th>
                    <th>Ver Detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devoluciones as $devolucion)
                    <tr>
                        <td>{{ $devolucion->fecha_devolucion}}</td>
                        <td>{{ $devolucion->observaciones}}</td>
                        {{-- <td>{{ $propietario->fecha_nacimiento }}</td> --}}

                        <!-- botones -->
                        {{-- <td><a href="{{route('propietarios.show', $propietario->id)}}" class="btn btn-info">Ver Detalles</a></td>
                        <td><a href="{{route('propietarios.edit', $propietario->id)}}" class="btn btn-warning">Editar</a></td> --}}
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
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Propietario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea eliminar esta devolucion?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="" method="post">
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
