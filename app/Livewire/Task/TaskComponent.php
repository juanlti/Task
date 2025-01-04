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

        $user = auth()->user();
        $myTask = $user->tasks;
        $sharedTask = $user->sharedTasks;
        $this->tasks = $myTask->merge($sharedTask);
        //dd($sharedTask->toArray());
        //  {{$task->permission}}


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
