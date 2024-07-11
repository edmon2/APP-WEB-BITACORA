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

        <!-- Solo al admin podra eliminar su cuenta el mismo -->
            
         @if (Auth::user()->isAdminDC() || Auth::user()->isAdminFab() || Auth::user()->isAdminLab() )
            <div>
                @include('profile.partials.delete-user-form')
            </div>
        @endif
    </div>
@endsection
