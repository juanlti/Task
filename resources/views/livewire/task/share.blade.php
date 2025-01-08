<div>
    <div>
        <!-- Mostrar mensajes de éxito -->
        @if (session()->has('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mostrar mensajes de error -->
        @if (session()->has('error'))
            <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
    </div>

@if ($modal)
        <div class="fixed inset-0 z-10 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-lg font-semibold mb-4">Compartir tarea</h2>

                <!-- Selección de usuario -->
                <label for="user-select">Selecciona un usuario</label>
                <select wire:model="selectedUser" id="user-select" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                    <option value="">Selecciona un usuario</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <!-- Selección de permiso -->
                <div class="mt-4">
                    <label for="permission-select">Selecciona un permiso</label>
                    <select wire:model="selectedPermission" id="permission-select" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                        @foreach ($permission as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones de acción -->
                <div class="mt-6 flex justify-end space-x-4">
                    <button wire:click="$set('modal', false)" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                        Cancelar
                    </button>
                    <button wire:click.prevent="shared" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Compartir
                    </button>
                </div>
            </div>
        </div>
    @endif
    @if($showModalUnsshareTask)
        <div class="fixed inset-0 z-10 flex items-center justify-center bg-gray-800 bg-opacity-75">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                <h2 class="text-lg font-semibold mb-4">Descompartir la tarea</h2>
                <p>¿Estás seguro de que deseas descompartir esta tarea?</p>
                <div class="mt-6 flex justify-end space-x-4">
                    <button
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400"
                        wire:click="$set('showModalUnsshareTask',false)">
                        Cancelar
                    </button>
                    <button
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                        wire:click="unShareTask">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
        @endif
</div>
