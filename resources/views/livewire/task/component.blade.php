<!-- resources/views/livewire/task/component.blade.php -->
<div>
    <div class="mx-auto max-w-screen-lg px-4 py-8 sm:px-8">
        <div class="flex items-center justify-between pb-6">
            <div>
                <button class="bg-purple-800 text-white px-4 py-2 rounded-md hover:bg-purple-400"
                        wire:click.prevent="addTask">Agregar Tarea
                </button>
            </div>
        </div>
        <div class="overflow-hidden rounded-lg border">
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Título
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Descripción
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b border-gray-200 bg-white">
                            <td class="px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">{{$task->title}}</p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">{{$task->description}}</p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <!-- Botón para Editar -->
                                <button class="bg-purple-800 text-white px-4 py-2 rounded-md hover:bg-purple-400"
                                        wire:click.prevent="$emit('editTask', {{ $task->id }})">
                                    Editar
                                </button>
                                <!-- Botón para Eliminar con Confirmación -->
                                <button class="bg-red-800 text-white px-4 py-2 rounded-md hover:bg-red-400"
                                        wire:click.prevent="confirmDelete({{ $task->id }})">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Modales -->

    <!-- Incluir el componente Add -->
    <livewire:task.add/>
    <!-- Incluir el componente Delete -->
    <livewire:task.delete />
</div>
