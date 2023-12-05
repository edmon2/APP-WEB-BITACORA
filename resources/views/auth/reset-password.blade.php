<x-guest-layout>
    <div class="card p-4 mx-auto my-4" style="max-width: 500px">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <body>
                
            
            <div class="mb-4 text-muted text-sm">
                ¡Ya falta poco!, proporciona una nueva contraseña que cumpla con las caracteristicas minimas de
                seguridad y habremos terminado.
            </div>

            @if ($errors->any())                
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-3">
                <input id="email" class="form-control" type="hidden" name="email"
                    value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="new-password">
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                    required autocomplete="new-password">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" id="submit">{{ __('Reestablecer Contraseña') }}</button>
            </div>
        </form>
    </div>
    </div>
</body>
</x-guest-layout>
