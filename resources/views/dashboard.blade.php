<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-2xl text-purple-800">Bienvenido a tus tareas</h1>
                    @foreach($tasks as $task)
                        <p class="mt-4 text-log text-purple-600">
                            {{$task->title}}


                        </p>
                        <p class="mt-4 text-log text-red-600">
                        {{$task->description}}
                        </p>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
