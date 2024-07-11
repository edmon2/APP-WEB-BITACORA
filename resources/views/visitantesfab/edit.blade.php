@extends('layouts.app')

@section('titulo')
Fábrica-Visitantes | Editar Visitante
@endsection

@section('content')
    <div class="container mt-5">
        <h2>Editar Visitante</h2>
        <br>
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
            <form action="{{ route('visitantesfab.update', $visitantefab->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="nombre_completo" class="mb-2">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo"
                        value="{{ $visitantefab->nombre_completo }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="fecha_entrada" class="mb-2">Fecha de Entrada:</label>
                    <input type="datetime-local" class="form-control" id="fecha_entrada" name="fecha_entrada"
                        value="{{ $visitantefab->fecha_entrada }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="motivo_visita" class="mb-2">Motivo de Visita:</label>
                    <input type="text" class="form-control" id="motivo_visita" name="motivo_visita"
                        value="{{ $visitantefab->motivo_visita }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="departamento" class="mb-2">Departamento:</label>
                    <select class="form-control" id="departamento" name="departamento" required>
                    <option value="">Selecciona un departamento</option>
                    <option value="Agricultura" {{ $visitantefab->departamento == 'Agricultura' ? 'selected' : '' }}>Agricultura</option>
                    <option value="Recursos Humanos" {{ $visitantefab->departamento == 'Recursos Humanos' ? 'selected' : '' }}>Recursos Humanos</option>
                    <option value="Compras" {{ $visitantefab->departamento == 'Compras' ? 'selected' : '' }}>Compras</option>
                    <option value="IT" {{ $visitantefab->departamento == 'IT' ? 'selected' : '' }}>IT</option>
                    <option value="Otro" {{ $visitantefab->departamento == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
                </div>  
                <div class="form-group mb-3">
                    <label for="casco" class="mb-2">Casco:</label>
                    <select class="form-control" id="casco" name="casco" required>
                        <option value="1" {{ $visitantefab->casco ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$visitantefab->casco ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <label for="lentes" class="mb-2">Lentes:</label>
                    <select class="form-control" id="lentes" name="lentes" required>
                        <option value="1" {{ $visitantefab->lentes ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$visitantefab->lentes ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <label for="zapatos" class="mb-2">Zapatos de Tipo Burro:</label>
                    <select class="form-control" id="zapatos" name="zapatos" required>
                        <option value="1" {{ $visitantefab->zapatos ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$visitantefab->zapatos ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <label for="hora_salida" class="mb-2">Hora de Salida:</label>
                    <input type="datetime-local" class="form-control" id="hora_salida" name="hora_salida"
                        value="{{ $visitantefab->hora_salida }}" required>
                </div>

                <div class="text-left mt-3">
                    <button type="submit" class="btn" style="background-color: #329702; color: #ffffff; ">Actualizar Visitante</button>
                    <a href="{{ route('visitantesfab.index') }}" class="btn btn-warning">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
