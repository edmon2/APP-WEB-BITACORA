@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Mis Equipos
@endsection
@section('content')
    <div class="container mt-5">
        @forelse ($equipos as $equipo)
            <div class="card mb-4">
                <div class="card-header">
                    <h4>{{ $equipo->tipo_equipo }}</h4>

                </div>
                <div class="card-body">
                    <p><strong>N° Serie</strong></p>
                    <p class="card-text"> {{ $equipo->no_serie }} </p>
                    <p class="card-title"><strong>Fecha de Entrega </strong></p>
                    <p class="card-text"> {{ $equipo->updated_at }} </p>
                </div>
            </div>
        @empty
            <div class="alert alert-warning alert-dismissible fade show mb-4">
                <p>No tienes ningun equipo asignado aun</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endforelse
    </div>
@endsection
