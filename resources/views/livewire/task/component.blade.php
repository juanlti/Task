<div wire:poll="loadTasks">
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
                            Estado
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($tasks->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">No hay tareas disponibles.</td>
                        </tr>
                    @else
                        @foreach($tasks as $task)
                            <tr class="border-b border-gray-200 bg-white">
                                <td class="px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{$task->title}}</p>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{$task->description}}</p>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <!-- Estado de la tarea -->
                                    @if($task->is_completed)
                                        <span class="text-green-600">✓</span> <!-- Tilde si está finalizada -->
                                    @else
                                        <span class="text-red-600">✘</span> <!-- X si no está finalizada -->
                                    @endif
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex flex-row justify-between">
                                        @if(!isset($task->pivot) && auth()->user()->id == $task->user_id)

                                        <button
                                                class="bg-red-800 text-white px-4 py-2 rounded-md hover:bg-red-400  mr-2"
                                                wire:click.prevent="confirmDelete({{ $task->id }})">
                                                Descompartir
                                            </button>
                                        @endif
                                        @if ( (isset($task->pivot) && $task->pivot->permission == 'edit') || auth()->user()->id == $task->user_id)

                                            <button
                                                class="bg-yellow-800 text-white px-4 py-2 rounded-md hover:bg-yellow-400  mr-2"
                                                wire:click.prevent="sharedTask({{ $task->id }})">
                                                Compartir
                                            </button>



                                            @if(!$task->is_completed)
                                                <button
                                                    class="bg-purple-800 text-white px-4 py-2 rounded-md hover:bg-purple-400  mr-2"
                                                    wire:click.prevent="editTask({{ $task->id }})">
                                                    Editar
                                                </button>
                                                <button
                                                    class="bg-green-800 text-white px-4 py-2 rounded-md hover:bg-green-400"
                                                    wire:click.prevent="markAsCompleted({{ $task->id }})">
                                                    Finalizar Tarea
                                                </button>
                                            @else
                                                <button
                                                    class="bg-red-800 text-white px-4 py-2 rounded-md hover:bg-red-400"
                                                    wire:click.prevent="confirmDelete({{ $task->id }})">
                                                    Eliminar
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modales -->
    <!-- Incluir el componente Add -->
    <livewire:task.add/>
    <!-- Incluir el componente Delete -->
    <livewire:task.delete/>
    <!-- Incluir el componente Edit -->
    <livewire:task.edit/>
    <!-- Incluir el componente Share -->
    <livewire:task.share/>
</div>
