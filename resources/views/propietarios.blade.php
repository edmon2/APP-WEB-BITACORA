<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Propietarios</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-4">Formulario de Propietarios</h1>
            </div>
            <div class="card-body">
                <form action="{{route('propietario.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre_completo" class="mb-2">Nombre Completo:</label>
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                    </div>

                    <div class="form-group">
                        <label for="fecha_nac" class="mb-2">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                    </div>

                    <div class="form-group">
                        <label for="identidad" class="mb-2">Numero de Identidad:</label>
                        <input type="text" class="form-control" id="identidad" name="identidad" required>
                    </div>

                    <div class="form-group">
                        <label for="estado_propietario" class="mb-2">Estado del Propietario:</label>
                        <select class="form-control" id="estado_propietario" name="estado_propietario">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar Propietario</button>
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

        @if ($errors->has('nombre_completo'))
            <br>    
            <div class="alert alert-danger">
                {{$errors->first('nombre_completo')}}
            </div>
        @endif

        @if ($errors->has('fecha_nac'))
            <br>
            <div class="alert alert-danger">
                {{$errors->first('fecha_nac')}}
            </div>
        @endif

        @if ($errors->has('identidad'))
        <br>
        <div class="alert alert-danger">
            {{$errors->first('identidad')}}
        </div>

        @if ($errors->has('estado_propietario'))
        <br>
        <div class="alert alert-danger">
            {{$errors->first('estado_propietario')}}
        </div>
    @endif
    @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>