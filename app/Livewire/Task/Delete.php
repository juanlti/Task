<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Delete extends Component
{
    public $taskId;
    public $modalVisible = false; // Estado del modal
    protected $listeners = ['confirmDelete' => 'showModal'];


    public function showModal($taskId)
    {
        $this->taskId = $taskId;
        $this->modalVisible = true;
    }

    public function deleteTask()
    {
        if ($this->taskId) {
            Task::find($this->taskId)?->delete();
            $this->dispatch('taskUpdated');
            $this->closeModal(); // Cierra el modal
        }
    }
    public function closeModal()
    {
        $this->modalVisible = false;
        $this->reset('taskId'); // Resetea el ID de la tarea
    }


    public function render()
    {
        return view('livewire.task.delete');
    }
}
