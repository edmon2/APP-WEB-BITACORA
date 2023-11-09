<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Roles</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-4">Formulario de Roles</h1>
            </div>
            <div class="card-body">
                <form action="{{route('rol.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre_rol" class="mb-2">Nombre del Rol:</label>
                        <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" required>
                    </div>

                    <div class="form-group">
                        <label for="estado_rol" class="mb-2">Estado del Rol:</label>
                        <select class="form-control" id="estado_rol" name="estado_rol">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar Rol</button>
                    </div>
                </form>
            </div>
        </div>

        @if (session('exito'))
            <br>
            <div class="alert alert-success">
                {{session('exito')}}
            </div>
        @endif

        @if ($errors->has('estado_rol'))
            <br>    
            <div class="alert alert-danger">
                {{$errors->first('correo')}}
            </div>
        @endif

        @if ($errors->has('nombre_rol'))
            <br>
            <div class="alert alert-danger">
                {{$errors->first('correo')}}
            </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>