@extends('layouts.app')

@section('titulo')
    Fábrica-Registro | Usuarios
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Registrar Visitante a Fábrica</h2>
        <br>
           <!-- Agrega este botón para exportar a Excel -->
          
        @if (session('exito'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
                {{ session('exito') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif
        <div class="card-body">
            <form action="{{ route('visitantesfab.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="nombre_completo" class="mb-2">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                </div>

                <div class="form-group mb-3">
                    <label for="fecha_entrada" class="mb-2">Fecha de Entrada:</label>
                    <input type="datetime-local" class="form-control" id="fecha_entrada" name="fecha_entrada" required>
                </div>

                <div class="form-group mb-3">
                    <label for="motivo_visita" class="mb-2">Motivo de Visita:</label>
                    <input type="text" class="form-control" id="motivo_visita" name="motivo_visita" required>
                </div>

                <div class="form-group mb-3">
                    <label for="departamento" class="mb-2">Departamento:</label>
                    <select class="form-control" id="departamento" name="departamento" required>
                        <option value="">Selecciona un departamento</option>
                        <option value="Agricultura">Agricultura</option>
                        <option value="Recursos Humanos">Recursos Humanos</option>
                        <option value="Compras">Compras</option>
                        <option value="IT">IT</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

             
                <div class="form-group mb-3">
                    <label for="casco" class="mb-2">Casco:</label>
                    <select class="form-control" id="casco" name="casco" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="lentes" class="mb-2">Lentes:</label>
                    <select class="form-control" id="lentes" name="lentes" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="zapatos" class="mb-2">Zapatos:</label>
                    <select class="form-control" id="zapatos" name="zapatos" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="hora_salida" class="mb-2">Hora de Salida:</label>
                    <input type="datetime-local" class="form-control" id="hora_salida" name="hora_salida">
                </div>

                <div class="text-left mt-3">
                    <button type="submit" class="btn" style="background-color: #329702; color: #ffffff; ">Guardar Visitante</button>
                    <a href="{{ route('visitantesfab.index') }}" class="btn btn-warning">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
