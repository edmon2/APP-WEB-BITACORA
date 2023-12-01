<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Eliminar Cuenta') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su cuenta, descargue cualquier dato o información que desee conservar.') }}
            </p>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                {{ __('Eliminar Cuenta') }}
            </button>

            @if ($errors->userDeletion->any())                
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    <ul>
                        @foreach ($errors->userDeletion->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">
                                {{ __('Confirmar Eliminación de Cuenta') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <div class="modal-body">
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Ingrese su contraseña para confirmar que desea eliminar permanentemente su cuenta.') }}
                                </p>
                                <div class="mt-4">
                                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="{{ __('Contraseña') }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
                                <button type="submit" class="btn btn-danger">{{ __('Eliminar Cuenta') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Fin Modal -->
        </div>
    </div>
</div>
