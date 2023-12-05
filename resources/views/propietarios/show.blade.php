@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Detalles Propietario
@endsection
@section('content')
    <div class="container mt-5">
        @if (Auth::user()->isAdmin())
            <h2>Detalles del Propietario</h2>
        @else
            <h2>Tus datos Personales</h2>
        @endif
        <br>
        <div class="card-body">
            <img src="{{ asset('storage/' . $propietario->imagen) }}" class="img-thumbnail" alt="personal-img"
                style="max-width: 100%; max-height: 200px;">
            <br>
            <br>
            <p><strong>Nombre Completo:</strong> {{ $propietario->nombre_completo }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $propietario->fecha_nacimiento }}</p>
            <p><strong>Número de Identidad:</strong> {{ $propietario->no_identidad }}</p>
            <p><strong>Direccion:</strong> <br>{{ $propietario->direccion }}</p>
            <div class="text-left mt-3">
                @if (Auth::user()->isAdmin())
                    <a href="{{ route('propietarios.index') }}" class="btn btn-warning">Regresar</a>    
                @else
                    <a href="{{ route('datospersonales.edit') }}" class="btn btn-success ml-2 mr-2">Editar datos Personales</a>
                @endif
            </div>
        </div>
    </div>
@endsection
