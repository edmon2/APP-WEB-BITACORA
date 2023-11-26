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
            <p><strong>Estado:</strong>
                {{ $equipo->entregado == 0 ? 'Sin asignar a ningun Estudiante, por defecto asignado a un Admin' : 'Asignado a un Estudiante' }}
            </p>
            @if ($equipo->entregado == 1)
                <br>
                <p><strong>Datos del Propietario del Equipo</strong></p>
                <p><strong>Usuario del Propietario:</strong> {{ $equipo->usuario->name }}</p>
                <p><strong>Nombre del Propietario:</strong> {{ $equipo->usuario->propietario->nombre_completo }}</p>
            @endif
            <div class="text-left mt-3">
                <a href="{{ route('equipos.index') }}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
@endsection
