@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Detalles Propietario
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Detalles del Propietario</h2>
        <br>        
        <div class="card-body">
            <img src="{{ asset('storage/' . $propietario->imagen)}}" class="img-thumbnail" alt="personal-img" style="max-width: 100%; max-height: 200px;">
            <br>
            <br>
            <p><strong>Nombre Completo:</strong> {{ $propietario->nombre_completo }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $propietario->fecha_nacimiento }}</p>
            <p><strong>Número de Identidad:</strong> {{ $propietario->no_identidad }}</p>   
            <p><strong>Direccion:</strong> <br>{{ $propietario->direccion }}</p>                                
            <div class="text-left mt-3">
                <a href="{{route('propietarios.index')}}" class="btn btn-warning">Regresar</a>
            </div>
        </div>        
    </div>
@endsection
