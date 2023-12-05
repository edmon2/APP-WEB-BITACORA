<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   

    <style>
        {!! Vite::content('resources/css/estilo.css') !!}
    </style>

    <title>@yield('titulo')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg  " data-bs-theme="dark" style="background-color: #E63946">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: black" href="{{ route('home') }}">RecepcionEquipos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: black" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    </li>
                    @if (Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('equipos.index') }}">Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('propietarios.index') }}">Propietarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('users.index') }}">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('entregas.index') }}">Entregas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('devoluciones.index') }}">Devoluciones</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('equipos.misequipos') }}">Mis Equipos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('datospersonales', Auth::user()->propietario->id)}}">Datos Personales</a>
                        </li>
                    @endif
                </ul>
                <div class="d-flex ">
                    <ul class="navbar-nav me-auto ">
                        <li class="nav-item dropdown " style="background-color: #1D3557">
                            <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </span>
                            <ul class="dropdown-menu bg-primary dropdown-menu-end ">
                                <li><a class="dropdown-item" style="color:rgb(255, 255, 255)"
                                        href="{{ route('profile.edit') }}">Perfil</a></li>
                                <li>
                                    <hr class="dropdown-divider bg-white" style="color: rgb(255, 255, 255)">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" style="color: rgb(255, 255, 255);"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            href="{{ route('logout') }}">Cerrar Sesión</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
    <article class="mb-5">
        @yield('content')
    </article>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
