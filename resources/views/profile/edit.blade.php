@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Perfil
@endsection
@section('content')
    <div class="card-body">
        <div>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div>
            @include('profile.partials.update-password-form')
        </div>

        <!-- Solo al admin podra eliminar su cuenta el mismo
            Usuarios de tipo Estudiante no pueden hacerlo -->
        @if (Auth::user()->isAdmin())
            <div>
                @include('profile.partials.delete-user-form')
            </div>
        @endif
    </div>
@endsection
