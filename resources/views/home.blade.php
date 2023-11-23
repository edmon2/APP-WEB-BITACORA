@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Home
@endsection
@section('content')
    <div class="container">     
        <div class="text-center" style="height: 80vh; display: flex; align-items: center; justify-content: center;">
            <div>
                <h2 class="mb-4">Bienvenido al Sistema UserX</h2>        
                <p>{{ \Carbon\Carbon::now()->toDateString() }}</p>        
                <p id="reloj" class="mb-4">{{ \Carbon\Carbon::now()->toTimeString() }}</p>                  
            </div>                      
        </div>
    </div>

    <script>
        function actualizarReloj() {
            var ahora = new Date();
            var horas = ahora.getHours();
            var minutos = ahora.getMinutes();
            var segundos = ahora.getSeconds();

            document.getElementById('reloj').innerText = horas + ':' + minutos + ':' + segundos;
        }    
        setInterval(actualizarReloj, 1000);
    </script>
@endsection