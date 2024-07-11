<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title> Bitacora Digital  | Nueva Contraseña</title>
    
=======
    <title>Recepcion Equipos | Nueva Contraseña</title>

>>>>>>> d2f29c56afedeae808201d395706ea3bb4bb7308
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <style>
        {!! Vite::content('resources/css/login.css') !!}
    </style>

    @vite(['resources/js/app.js'])
</head>

<body>
    <div class=" d-flex align-items-center justify-content-center" style="height: 100vh;">
        {{ $slot }}
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
