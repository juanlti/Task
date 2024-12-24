<div>
    <div class="mx-auto max-w-screen-lg px-4 py-8 sm:px-8">
        <div class="flex items-center justify-between pb-6">
            <div class="flex items-center justify-between">
                <div class="ml-10 space-x-8 lg:ml-40">
                </div>
            </div>
        </div>
        <div class="overflow-y-hidden rounded-lg border">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="bg-blue-600 text-left text-xs font-semibold uppercase tracking-widest text-white">
                        <th class="px-5 py-3">Titulo</th>
                        <th class="px-5 py-3">Descripcion</th>
                        <th class="px-5 py-3">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-500">
                    <button class="bg-purple-800 text-white px-4 py-2 rounded-md hover:bg-purple-400" wire:click="openModal">Agregar</button>
                    @foreach($tasks as $task)
                        <tr class="border-b border-gray-200 bg-white">
                            <td class="px-5 py-1 text-sm">
                        </tr>
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <p class="whitespace-no-wrap">{{$task->title}}</p>
                        </td>
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-full w-full rounded-full" src="/images/-ytzjgg6lxK1ICPcNfXho.png" alt=""/>
                                </div>
                                <div class="ml-3">
                                    <p class="whitespace-no-wrap">{{$task->description}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="border-b border-gray-200 bg-white px-5 py-5">
                            <button class="bg-purple-800 text-white px-4 py-y rounded-md hover:bg-purple-400">editar</button>
                            <button class="bg-red-800 text-white px-4 py-y rounded-md hover:bg-red-400">eliminar</button>
                        </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    @if($modal)
        <div class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
            <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
                <div class="w-full">
                    <div class="m-8 my-20 max-w-[400px] mx-auto">
                        <div class="mb-8">
                            <h1 class="mb-4 text-3xl font-extrabold">Crear nueva tarea</h1>
                            <form action="">
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Titulo</label>
                                    <input type="text" wire:model="title" placeholder="Titulo de la tarea" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 focus:ring-opacity-75">
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                    <input type="text" wire:model="description" placeholder="Descripcion de la tarea" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 focus:ring-opacity-75">
                                </div>
                            </form>
                        </div>
                        <div class="flex flex-row">
                            <button class="p-3 bg-white border rounded-full w-full font-semibold hover:bg-red-400" wire:click="closeModal">Cancelar</button>
                        </div>                            <button class="p-3 bg-black rounded-full text-white w-full font-semibold" wire:click="createTask">Crear tarea</button>

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
