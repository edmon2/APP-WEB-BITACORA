@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Home
@endsection
@section('content')
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