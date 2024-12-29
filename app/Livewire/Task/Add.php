<?php

namespace App\Livewire\Task;

use Livewire\Component;

class Add extends Component
{
    public $title;
    public $modal = false;
    public $description;
    public $successModal = false;
    protected $listeners = ['createTask' => 'showModal'];

    public function showModal()
    {
        $this->modal = true;
    }

    public function addTask()
    {
        // Validar el título y la descripción
        $this->validate([
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:15|max:255',
        ]);

        // Crear la tarea
        auth()->user()->tasks()->create([
            'title' => $this->title,
            'description' => $this->description,
        ]);
        $this->successModal = true;

        // Emitir el evento al componente general
        $this->dispatch('taskAdded');

        // Resetear los campos y cerrar el modal
        $this->reset(['title', 'description']);
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.task.add');
    }

    public function closeSuccessModal()
    {
        $this->successModal = false;
    }
}
