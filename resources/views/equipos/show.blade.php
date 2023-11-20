@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Detalles Equipo
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Detalles del Equipo</h2>
        <br>
        <div class="card-body">
            <br>
            <p><strong>Nº Serie:</strong> {{ $equipo->no_serie }}</p>
            <p><strong>Equipo:</strong> {{ $equipo->tipo_equipo }}</p>
            <p><strong>Usuario:</strong> {{ $usuario->name }}</p>

            <div class="text-left mt-3">
                <a href="{{route('equipos.index')}}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
@endsection
