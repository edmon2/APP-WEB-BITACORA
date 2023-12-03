@extends('layouts.app')

@section('titulo')
Recepcion-Equipos | Mis Equipos
@endsection
@section('content')

<div class="container mt-5">

    @foreach ($equipos as $equipo)
    <div class="card">
        <div class="card-header" >
            $equipo ->tipo_equipo
            
        </div>
        <div class="card-body">
            <h5 class="card-title"> </h5>
            <p class="card-text"> </p>
        </div>
    </div>
    @endforeach
</div>
@endsection