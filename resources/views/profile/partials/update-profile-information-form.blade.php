<section>
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Información del Perfil') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Actualiza la información del perfil y la dirección de correo electrónico de tu cuenta.') }}
                </p>
            </div>

            <div class="card-body">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Nombre') }}</label>
                        <input id="name" name="name" type="text" class="form-control"
                            value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                        <input id="email" name="email" type="email" class="form-control"
                            value="{{ old('email', $user->email) }}" required autocomplete="username">

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div class="mt-2">
                                <p class="text-sm text-gray-800 dark:text-gray-200">
                                    {{ __('Tu dirección de correo electrónico no está verificada.') }}

                                    <button form="send-verification"
                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                        {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                        {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="btn " style="background-color: #329702; color: #ffffff;">{{ __('Guardar') }}</button>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Cerrar"></button>
                            </div>
                        @endif

                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                                {{ __('Informacion actualizada exitosamente.') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Cerrar"></button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


