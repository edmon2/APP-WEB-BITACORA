@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Detalles Entregas
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Detalles de la Entrega</h2>
        <br>
        <div class="card-body">
            <p><strong>Fecha de la Entrega:</strong> {{ $entrega->fecha_entrega }}</p>            
            <p><strong>Usuario del Estudiante:</strong> {{ $usuario->name }}</p>
            <p><strong>Nombre del Estudiante:</strong> {{ $propietario->nombre_completo }}</p>
            <p><strong>Equipo:</strong> {{ $equipo->tipo_equipo.' - '.$equipo->no_serie}}</p>
            <p><strong>Observaciones:</strong> <br> {{ $entrega->observaciones }}</p>
            <div class="text-left mt-3">
                <a href="{{route('entregas.index')}}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
@endsection
