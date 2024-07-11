@extends('layouts.app')

@section('titulo')
Fábrica-Visitantes | Detalles Visitante
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Detalles del Visitante</h2>
        <br>
        <div class="card-body">
          
            <p><strong>Nombre:</strong> {{ $visitantefab->nombre_completo }}</p>
            <p><strong>Fecha de Entrada:</strong> {{ $visitantefab->fecha_entrada }}</p>
            <p><strong>Motivo de Visita:</strong> {{ $visitantefab->motivo_visita }}</p>
            <p><strong>Departamento:</strong> {{ $visitantefab->departamento }}</p>
            <p><strong>Casco:</strong> {{ $visitantefab->casco ? 'Sí' : 'No' }}</p>
            <p><strong>Lentes:</strong> {{ $visitantefab->lentes ? 'Sí' : 'No' }}</p>
            <p><strong>Zapatos de Tipo Burro:</strong> {{ $visitantefab->zapatos ? 'Sí' : 'No' }}</p>
            <p><strong>Hora de Salida:</strong> {{ $visitantefab->hora_salida }}</p>

            <div class="text-left mt-3">
                <!-- Enlaces para regresar o editar si es necesario -->
                <a href="{{ route('visitantesfab.index') }}" class="btn btn-warning">Regresar</a>
               
            </div>
        </div>
    </div>
@endsection
