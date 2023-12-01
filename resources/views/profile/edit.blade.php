@extends('layouts.app')

@section('titulo')
    Recepcion-Equipos | Perfil
@endsection
@section('content')
    <div class="card-body">
        <div >            
            @include('profile.partials.update-profile-information-form')
        </div>

        <div >
            @include('profile.partials.update-password-form')
        </div>
        <div >
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection