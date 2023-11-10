<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Usuarios</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-4">Formulario de Usuarios</h1>
            </div>
            <div class="card-body">
                <form action="{{route('usuario.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre_rol" class="mb-2">Nombre del Usuario:</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Correo del usuario</label>
                        <input  class="form-control" type="text" name="correo_usuario" id="correo">
                        @if($errors->has('correo'))
                   <div class="alert alert-success"> 
                    {{$errors->first('correo')}}
                   </div>
                   @endif

                   <div class="form-group">
                    <label for="contraseña_usuario" class="mb-2">Contraseña del Usuario:</label>
                    <input type="password" class="form-control" id="contraseña_usuario" name="contraseña_usuario" required>
                </div>


                    <div class="form-group">
                        <label for="estado_usuario" class="mb-2">Estado del Usuario:</label>
                        <select class="form-control" id="estado_usuario" name="estado_usuario">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                    </div>
                </form>
            </div>
        </div>

        {{$nombre_rol}}

        @if (session('exito'))
            <br>
            <div class="alert alert-success">
                {{session('exito')}}
            </div>
        @endif

        @if ($errors->has('estado_usuario'))
            <br>    
            <div class="alert alert-danger">
                {{$errors->first('estado_usuario')}}
            </div>
        @endif

        @if ($errors->has('nombre_usuario'))
            <br>
            <div class="alert alert-danger">
                {{$errors->first('nombre_usuario')}}
            </div>
        @endif
    </div>
    
    @if ($errors->has('rol_usuario'))
    <br>
    <div class="alert alert-danger">
        {{$errors->first('rol_usuario')}}
    </div>
@endif
</div>

@if ($errors->has('contraseña_usuario'))
    <br>
    <div class="alert alert-danger">
        {{$errors->first('contraseña_usuario')}}
    </div>
@endif
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>