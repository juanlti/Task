<div>
    <div>
        @if ($modal)

            <div class="fixed inset-0 z-10 flex items-center justify-center bg-gray-800 bg-opacity-75">
                <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                    <h2 class="text-lg font-semibold mb-4">Compartir tarea</h2>
                    <label for="">Selecciona un usuario</label>
                    <select wire:model="selectedUser" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">

                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>


                    <div class="mb-8 mt-4">
                        <label for="">Selecciona un permiso</label>
                        <select name="" id="" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                            <option value="view">Ver</option>
                            <option value="edit">Editar</option>
                        </select>
                    </div>

                    <div class="mt-6 flex justify-end space-x-4">
                        <button class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400" wire:click="$set('modal',false)">
                            Cancelar
                        </button>
                        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700" wire:click.prevent="shared()">
                            Compartir
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>


</div>
