<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Equipos</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-4">Formulario de Equipos</h1>
            </div>
            <div class="card-body">
                <form action="{{route('equipo.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="no_serie" class="mb-2">Numero de Serie:</label>
                        <input type="text" class="form-control" id="no_serie" name="no_serie" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo_equipo" class="mb-2">Tipo de Equipo:</label>
                        <input type="text" class="form-control" id="tipo_equipo" name="tipo_equipo" required>
                    </div>

                    <div class="form-group">
                        <label for="id_usuario" class="form-label">Usuario Propietario:</label>
                        <select name="id_usuario" class="form-control" id="id_usuario">

                            <option value="" selected>Selecciona un tipo de usuario</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}"> {{ $usuario->name }}</option>
                            @endforeach

                        </select>

                    </div>
                    
                    <div class="form-group">
                        <label for="estado_equipo" class="mb-2">Estado del Equipo:</label>
                        <select class="form-control" id="estado_equipo" name="estado_equipo">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar Equipo</button>
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

        @if ($errors->has('no_serie'))
            <br>    
            <div class="alert alert-danger">
                {{$errors->first('no_serie')}}
            </div>
        @endif

        @if ($errors->has('tipo_equipo'))
            <br>
            <div class="alert alert-danger">
                {{$errors->first('tipo_equipo')}}
            </div>
        @endif

        @if ($errors->has('id_usuario'))
        <br>
        <div class="alert alert-danger">
            {{$errors->first('id_usuario')}}
        </div>

        
        @endif

        @if ($errors->has('estado_equipo'))
        <br>
        <div class="alert alert-danger">
            {{$errors->first('estado_equipo')}}
        </div>

        
        @endif

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>