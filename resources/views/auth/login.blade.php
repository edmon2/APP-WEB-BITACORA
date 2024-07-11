<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title> Visitantes | Login</title>
</head>

<style>
    body {
        background: #fceabb;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #f8b500, #fceabb);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #f8b500, #fceabb);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        height: 100vh;

        #submit {
            padding: 10px 20px;
            color: #0e0d0d;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: 0.5s;
            letter-spacing: 2px;
            border: 1px solid #030303;
            ;
            margin: auto;
        }

        #submit:hover {
            background: #329702;
            color: #fcf8f8;
            border-radius: 5px;
            box-shadow: 0 0 5px #ffcc40, 0 0 25px #ffe607, 0 0 50px #ffd000, 0 0 100px #ffe600;
        }

    }
</style>



<body class="bg-light d-flex align-items-center justify-content-center">


    <div class="card p-4 mx-auto my-4" style="max-width: 500px;">
        <div id="logo">
            <img src="images/Tres-Valles.png" alt="Logo de Tres Valles"
                style="width: 120px; height: center; margin-top: -5%; margin-left: 35%">
        </div>
        <br>
        <div class="container">
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Errors -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-3 input-group">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i> <!-- Icono de sobre -->
                    </span>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                        required autofocus autocomplete="username" placeholder="Correo electrónico">
                </div>

                <!-- Password -->
                <div class="mb-3 input-group">
                    <span class="input-group-text">
                        <i class="fas fa-lock "></i> <!-- Icono de candado -->
                    </span>
                    <input id="password" class="form-control" type="password" name="password" required
                        autocomplete="current-password" placeholder="Contraseña">
                </div>


                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Recuerdame') }}</label>
                </div>

                <div class="d-flex justify-content-end">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-muted me-3">
                            {{ __('¿Has olvidado tu contraseña?') }}
                        </a>
                    @endif

                    <button type="submit" id="submit">{{ __('Iniciar Sesión') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
