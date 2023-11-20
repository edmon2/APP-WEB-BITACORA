@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Detalles Devoluciones
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Detalles de la Devolucion</h2>
        <br>
        <div class="card-body">
            <br>
            <p><strong>Fecha de entrega:</strong> {{ $devolucion->fecha_devolucion }}</p>
            <p><strong>Observaciones:</strong> {{ $devolucion->observaciones }}</p>
            <p><strong>Usuario:</strong> {{ $usuario->name }}</p>
            <p><strong>Equipo:</strong> {{ $equipo->tipo_equipo.' - '.$equipo->no_serie}}</p>
         
            <div class="text-left mt-3">
                <a href="{{route('devoluciones.index')}}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
@endsection
