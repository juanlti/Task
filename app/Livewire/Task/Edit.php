<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

// app/Livewire/Task/Edit.php
namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Edit extends Component
{
    public $modal = false;
    public $title = '';
    public $description = '';

    public function mount($taskId)
    {
        $task = Task::find($taskId);
        $this->title = $task->title;
        $this->description = $task->description;
        $modal = true;
    }

    public function updateTask()
    {
        dd('updateTask');
        // Validar el título
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:15|max:255',
        ]);



        // Resetear los campos
        $this->reset(['taskId', 'title', 'description']);
    }

    public function render()
    {
        return view('livewire.task.edit');
    }
}
