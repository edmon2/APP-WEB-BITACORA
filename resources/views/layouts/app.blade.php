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

<nav class="navbar navbar-expand-lg  " data-bs-theme="dark" style="background-color: #ff9d0a ">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: black" href="{{ route('home') }}">Digitalización de Bitácora</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: black" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    </li>
                    @if (Auth::user()->isAdminDC())
                
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('visitantes.index') }}">Visitantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Perfiles</a>
                    </li>
                @endif
                    @if (Auth::user()->isAdminFab())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('visitantesfab.index') }}">Visitantes</a>
                    </li>
                @else
                    @if (Auth::user()->isAdminlab())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitanteslab.index') }}">Visitantes</a>
                        </li>
                      
                    @endif
                   
                @endif
                
           
                </ul>
                <div class="d-flex ">
                    <ul class="navbar-nav me-auto ">
                        <li class="nav-item dropdown " style="background-color: #1D3557">
                            <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </span>
                            <ul class="dropdown-menu  dropdown-menu-end " style="background-color: #329702">
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
