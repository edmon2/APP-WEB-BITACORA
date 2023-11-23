@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Detalles Equipo
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Detalles del Equipo</h2>
        <br>
        <div class="card-body">
            <p><strong>Nº Serie:</strong> {{ $equipo->no_serie }}</p>
            <p><strong>Equipo:</strong> {{ $equipo->tipo_equipo }}</p>
            <br>
            <p><strong>Datos del Propietario del Equipo</strong></p>
            <p><strong>Usuario del Propietario:</strong> {{ $usuario->name }}</p>
            <p><strong>Nombre del Propietario:</strong> {{ $propietario->nombre_completo }}</p>
            <div class="text-left mt-3">
                <a href="{{route('equipos.index')}}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
@endsection
