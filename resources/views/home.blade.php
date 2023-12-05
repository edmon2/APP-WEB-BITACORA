@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Home
@endsection
@section('content')
    
<style>
    {!! Vite::content('resources/css/estilo.css') !!}
</style>

<body style="background: #0052D4;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #6FB1FC, #4364F7, #0052D4);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #6FB1FC, #4364F7, #0052D4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
    
<div class="container">     
        <div class="text-center" style="height: 80vh; display: flex; align-items: center; justify-content: center;">
            <div>
                <h2 class="mb-4">Bienvenido al Sistema {{Auth::user()->propietario->nombre_completo}}</h2>        
                <p>{{ \Carbon\Carbon::now()->toDateString() }}</p>        
                <p id="reloj" class="mb-4">{{ \Carbon\Carbon::now()->toTimeString() }}</p>                  
            </div>                      
        </div>
    </div>

    <script>
        {!! Vite::content('resources/js/home.js') !!}
    </script>
@endsection