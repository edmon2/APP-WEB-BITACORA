@php
    $indice = 0;
@endphp

@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Entregas
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Entregas</h2>
        <br>
       <a href="{{ route('entregas.create') }}" class="btn btn-primary mb-3">Crear Entrega</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Entrega</th>
                    <th>Observaciones</th>
                    <th>Ver Detalles</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entregas as $entrega)
                    <tr>
                        <td>{{ $entrega->fecha_entrega}}</td>
                        <td>{{ $entrega->observaciones }}</td>

                        <!-- botones -->
                        <td><a href="{{route('entregas.show', $entrega->id)}}" class="btn btn-info">Ver Detalles</a></td>
                        <td><a href="{{route('entregas.edit', $entrega->id)}}" class="btn btn-warning">Editar</a></td>
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
                                        ¿Desea eliminar este propietario?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('entregas.destroy', $entrega->id)}}" method="post">
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
