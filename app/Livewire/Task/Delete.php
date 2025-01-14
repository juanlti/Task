<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Delete extends Component
{
    public $taskId;
    public $modalVisibleDeleteAll = false;
    public $modalVisible = false; // Estado del modal
    protected $listeners = ['confirmDelete' => 'showModal', 'deleteAllTask' => 'showModalDeleteAll'];

    public function showModalDeleteAll()
    {
        $this->modalVisibleDeleteAll = true;
    }

    public function deleteAllTask()
    {
        // Eliminar todas las tareas
        Task::query()->delete();
        session()->flash('success', 'Todas las tareas han sido eliminadas.');
        $this->reset('taskId');
        $this->modalVisibleDeleteAll = false;
        $this->dispatch('taskUpdated');
    }

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
            $this->reset('taskId');
        }
    }

    public function render()
    {
        return view('livewire.task.delete');
    }
}
