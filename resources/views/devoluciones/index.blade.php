@php
    $indice = 0;
    $listaNoFilas = [5, 10, 25, 50, 100];
@endphp

@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Devoluciones
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Devoluciones</h2>
        <br>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('devoluciones.create') }}" class="btn btn-primary mb-3">Crear Devolucion</a>
            <form action="{{ route('devoluciones.find') }}" method="post" class="form-inline">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="find" class="form-control" placeholder="Buscar..." aria-label="Buscar"
                        aria-describedby="button-addon2">
                    <button type="submit" class="btn btn-outline-primary" type="button" id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0">
                            </path>
                        </svg>
                    </button>
                    <a href="{{ route('devoluciones.index') }}" class="btn btn-danger" type="button" id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                          </svg>
                    </a>


                </div>
            </form>
            <!-- Opción de escoger las filas a mostrar en la tabla -->
            <form action="{{ route('devoluciones.index') }}" method="GET" class="form-inline">
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
                    <th>Fecha de Devolucion</th>
                    <th>Equipo</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devoluciones as $devolucion)
                    <tr>
                        <td>{{ $devolucion->fecha_devolucion }}</td>
                        <td>{{ $devolucion->equipo->tipo_equipo . ' - ' . $devolucion->equipo->no_serie }}</td>
                        <td>{{$devolucion->usuario->name}}</td>

                        <!-- botones -->
                        <td style="width: 300px">
                            <a href="{{ route('devoluciones.show', $devolucion->id) }}" class="btn btn-info">Ver Detalles</a>
                            <a href="{{ route('devoluciones.edit', $devolucion->id) }}" class="btn btn-warning">Editar</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Devolucion</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea eliminar esta devolucion?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('devoluciones.destroy', $devolucion->id) }}" method="post">
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
            {{ $devoluciones->appends(['rowsNumber' => $noFilas])->links() }}
        </div>
    </div>
@endsection
