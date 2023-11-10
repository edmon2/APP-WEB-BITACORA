<?php
if(isset($_POST['fecha_entrega'])) {
    $fecha_entrega = $_POST['fecha_entrega'];

    // Realizar alguna operación con la fecha seleccionada...

    echo "La fecha seleccionada es: " . $fecha_entrega;
}
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Entregas</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-4">Formulario de Entregas</h1>
            </div>
            <div class="card-body">
                <form action="{{route('entrega.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_equipo" class="mb-2">ID De Equipo:</label>
                        <input type="text" class="form-control" id="id_equipo" name="id_equipo" required>
                    </div>

                    <div class="form-group">
                        <label for="id_usuario" class="mb-2">ID De Usuario:</label>
                        <input type="text" class="form-control" id="id_usuario" name="id_usuario" required>
                    </div>
                    <br>
                     <div class="form-group">
                        <label for="fecha_entrega">Fecha De Entrega:</label>
                        <input type="date" id="fecha_entrega" name="fecha_entrega">

                    </div>
                    <br>

                    <div class="form-group">
                        <label for="observaciones" class="mb-2">Observaciones:</label>
                        <input type="text" class="form-control" id="observaciones" name="observaciones" required>
                    </div>



                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar Entrega</button>
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


       
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>