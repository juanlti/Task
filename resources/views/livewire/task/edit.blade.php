<div>
    @if($modal)
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <h1 class="mb-4 text-3xl font-extrabold">Editar la tarea</h1>
                        <form wire:submit.prevent="updateTask">
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Titulo</label>
                                <input type="text" wire:model="title" placeholder="Titulo de la tarea"
                                       class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                <input type="text" wire:model="description" placeholder="Descripcion de la tarea"
                                       class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                            </div>
                            <div class="flex space-x-4">
                                <button type="submit" class="p-3 bg-black rounded-full text-white w-full font-semibold">
                                    Actualizar tarea
                                </button>
                                <button type="button" class="p-3 bg-white border rounded-full w-full font-semibold hover:bg-red-400"
                                        wire:click="$set('modal', false)">Cancelar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
        @if ($successModal)
            <!-- Modal de éxito -->
            <div class="fixed inset-0 z-10 flex items-center justify-center bg-gray-800 bg-opacity-75">
                <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                    <h2 class="text-lg font-semibold mb-4">Tarea ID  {{$taskId}} editada</h2>
                    <p>La tarea se ha creado correctamente.</p>
                    <div class="mt-6 flex justify-end">
                        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                                wire:click="$set('successModal',false)">Cerrar
                        </button>
                    </div>
                </div>
            </div>
        @endif
</div>
