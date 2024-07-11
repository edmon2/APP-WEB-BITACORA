@extends('layouts.app')

@section('titulo')
    Bitácora-Visitantes | Home
@endsection
@section('content')
    
<style>
    {!! Vite::content('resources/css/estilo.css') !!}
</style>

<body style="background: #FFEFBA;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #FFEFBA); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background-image: url('https://productoresdeazucarhonduras.com/wp-content/uploads/2023/10/El-azucar-hondurena-esta-fortificada-con-vitamina-A.jpg'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">
    
<div class="container">     
        <div class="text-center" style="height: 80vh; display: flex; align-items: center; justify-content: center; font-size: 1.5em; color:black">
            <div>
               
                <h2 class="mb-4">Bienvenido al Sistema {{Auth::user()->name}}</h2>        
                <p>{{ \Carbon\Carbon::now()->toDateString() }}</p>        
                <p id="reloj" class="mb-4">{{ \Carbon\Carbon::now()->toTimeString() }}</p>  
                <img src="{{ asset('images/Tres-Valles.png') }}" alt="Descripción de la imagen" style="width: 300px; height: auto;">               
            </div>                      
        </div>
    </div>

    <script>
        {!! Vite::content('resources/js/home.js') !!}
    </script>
@endsection