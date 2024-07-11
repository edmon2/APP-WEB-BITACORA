@php
    $indice = 0;
    $listaNoFilas = [5, 10, 25, 50, 100];
@endphp

@extends('layouts.app')

@section('titulo')
    Fábrica | Visitantes
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Visitante de Fábrica</h2>
        <br>
       
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('visitantesfab.create') }}" class="btn mb-3" style="background-color: #329702; color: #ffffff;">Registrar Visitante</a>
            <form action="{{ route('visitantesfab.find') }}" method="post" class="form-inline">
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
                    <a href="{{ route('visitantesfab.index') }}" class="btn" style="background-color: #fd0000;" type="button" id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                          </svg>
                    </a>
                </div>
            </form>
            <!-- Opción de escoger las filas a mostrar en la tabla -->
            <form action="{{ route('visitantesfab.index') }}" method="GET" class="form-inline">
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
                    <th>Nombre Completo</th>
                    <th>Fecha de Entrada</th>
                    <th>Motivo de Visita</th>
                    <th>Departamento</th>
                    <th>Casco</th>
                    <th>Lentes</th>
                    <th>Burros</th>
                    <th>Hora de Salida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitantesfab as $visitantefab)
                    <tr>
                        <td>{{ $visitantefab->nombre_completo }}</td>
                        <td>{{ $visitantefab->fecha_entrada }}</td>
                        <td>{{ $visitantefab->motivo_visita }}</td>
                        <td>{{ $visitantefab->departamento }}</td>
                        <td>{{ $visitantefab->casco ? 'Sí' : 'No' }}</td>
                        <td>{{ $visitantefab->lentes ? 'Sí' : 'No' }}</td>
                        <td>{{ $visitantefab->zapatos ? 'Sí' : 'No' }}</td>
                        <td>{{ $visitantefab->hora_salida }}</td>
              
                        <!-- botones -->
                        <td style="width: 300px">
                            <a href="{{ route('visitantesfab.show', $visitantefab->id) }}"
                                class="btn ml-2 mr-2" style="background-color: #329702; color: #ffffff; ">Ver Detalles</a>
                            <a href="{{ route('visitantesfab.edit', $visitantefab->id) }}"
                                class="btn btn-warning ml-2 mr-2">Editar</a>
                            <button type="button" class="btn ml-2 mr-2" style="background-color: #fd0000; color: #ffffff; ;" data-bs-toggle="modal"
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
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Visitante</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea eliminar este visitante?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('visitantesfab.destroy', $visitantefab->id) }}" method="post">
                                       
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn" style="background-color: #fd0000; color: #ffffff;">Eliminar</button>
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
            {{ $visitantesfab->appends(['rowsNumber' => $noFilas])->links() }}
        </div>
    </div>
@endsection
