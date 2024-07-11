<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Recepcion Equipos | Restablecer Contraseña</title>
</head>

<style>
    body{
     background: #fceabb;  /* fallback for old browsers */
 background: -webkit-linear-gradient(to right, #f8b500, #fceabb);  /* Chrome 10-25, Safari 5.1-6 */
 background: linear-gradient(to right, #f8b500, #fceabb); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
     border: 1px solid #030303;;
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
        <div class="container">
            <!-- Forgot Password Text -->
            <div class="mb-4 text-muted text-sm">
                ¿Olvidaste tu contraseña? No hay problema. Solo indícanos tu dirección de correo electrónico y te
                enviaremos un enlace para restablecer tu contraseña.
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Validation Errors -->
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

            @if (!session('status'))
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Correo') }}</label>
                        <input id="email" class="form-control" type="email" name="email"
                            value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" id="submit">{{ __('Enviar Enlace de Restablecimiento') }}</button>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
