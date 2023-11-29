@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Detalles Devoluciones
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Detalles de la Devolucion</h2>
        <br>
        <div class="card-body">
            <p><strong>Fecha de la Devolucion:</strong> {{ $devolucion->fecha_devolucion }}</p>
            <p><strong>Usuario del Estudiante:</strong> {{ $devolucion->usuario->name }}</p>
            <p><strong>Nombre del Estudiante:</strong> {{ $devolucion->usuario->propietario->nombre_completo }}</p>
            <p><strong>Equipo:</strong> {{ $devolucion->equipo->tipo_equipo.' - '.$devolucion->equipo->no_serie}}</p>
            <p><strong>Observaciones:</strong> <br> {{ $devolucion->observaciones }}</p>         
            <div class="text-left mt-3">
                <a href="{{route('devoluciones.index')}}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
@endsection
