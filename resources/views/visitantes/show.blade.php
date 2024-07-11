@extends('layouts.app')

@section('titulo')
Laboratorio-Visitantes | Detalles Visitante
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Detalles del Visitante</h2>
        <br>
        <div class="card-body">
          

            <p><strong>Nombre:</strong> {{ $visitante->nombre_completo }}</p>
            <p><strong>Fecha de Entrada:</strong> {{ $visitante->fecha_entrada }}</p>
            <p><strong>Número de Identidad:</strong> {{ $visitante->no_identidad }}</p>
            <p><strong>Motivo de Visita:</strong> {{ $visitante->motivo_visita }}</p>
            <p><strong>Departamento:</strong> {{ $visitante->departamento }}</p>
            <p><strong>Hora de Salida:</strong> {{ $visitante->hora_salida }}</p>

            <div class="text-left mt-3">
                <!-- Enlaces para regresar o editar si es necesario -->
                <a href="{{ route('visitantes.index') }}" class="btn btn-warning">Regresar</a>
               
            </div>
        </div>
    </div>
@endsection
