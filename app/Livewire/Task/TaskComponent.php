<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $modal = false;
    protected $listeners = ['taskUpdated' => 'loadTasks', 'taskAdded' => 'loadTasks'];

    public function mount()
    {
        $this->loadTasks();
    }

    public function addTask()
    {

        $this->dispatch('createTask');

    }

    public function loadTasks()
    {
        $this->tasks = Task::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.task.component');
    }

    public function confirmDelete($taskId)
    {
        $this->dispatch('confirmDelete', $taskId);
    }


    public function editTask($taskId)
    {
        $this->dispatch('editTask', $taskId);
    }
}
