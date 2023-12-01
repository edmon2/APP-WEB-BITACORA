<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Recepcion Equipos | Restablecer Contraseña</title>
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
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
                        <button type="submit"
                            class="btn btn-primary">{{ __('Enviar Enlace de Restablecimiento') }}</button>
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
