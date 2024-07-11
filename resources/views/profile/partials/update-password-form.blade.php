<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Actualizar Contraseña') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Asegúrese de que su cuenta esté utilizando una contraseña larga y aleatoria para mantenerla segura.') }}
            </p>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="update_password_current_password"
                        class="form-label">{{ __('Contraseña Actual') }}</label>
                    <input id="update_password_current_password" name="current_password" type="password"
                        class="form-control" autocomplete="current-password">

                </div>

                <div class="mb-3">
                    <label for="update_password_password" class="form-label">{{ __('Nueva Contraseña') }}</label>
                    <input id="update_password_password" name="password" type="password" class="form-control"
                        autocomplete="new-password">

                </div>

                <div class="mb-3">
                    <label for="update_password_password_confirmation"
                        class="form-label">{{ __('Confirmar Contraseña') }}</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                        class="form-control" autocomplete="new-password">

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn" style="background-color: #329702; color: #ffffff;">{{ __('Guardar') }}</button>

                    @if ($errors->updatePassword->any())
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <ul>
                                @foreach ($errors->updatePassword->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            {{ __('Contraseña actualizada exitosamente.') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Cerrar"></button>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
