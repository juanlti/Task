<div>
    <div>
        @if ($modalVisible)
            <div class="fixed inset-0 z-10 flex items-center justify-center bg-gray-800 bg-opacity-75">
                <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                    <h2 class="text-lg font-semibold mb-4">Confirmar Eliminación</h2>
                    <p>¿Estás seguro de que deseas eliminar esta tarea?</p>
                    <div class="mt-6 flex justify-end space-x-4">
                        <button
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400"
                            wire:click="closeModal">
                            Cancelar
                        </button>
                        <button
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                            wire:click="deleteTask">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>


</div>
