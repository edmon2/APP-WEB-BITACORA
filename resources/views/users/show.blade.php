@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Detalles Usuario
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Detalles del Usuario</h2>
        <br>        
        <div class="card-body">            
            <p><strong>Nombre de Usuario:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>     
            <p><strong>Rol:</strong> {{ $user->rol }}</p> 
            <p><strong>Propietario:</strong> {{ $user->propietario->nombre_completo }}</p>                                
            <div class="text-left mt-3">
                <a href="{{route('users.index')}}" class="btn btn-warning">Regresar</a>
            </div>
        </div>        
    </div>
@endsection
