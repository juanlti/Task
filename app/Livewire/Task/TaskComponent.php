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
    protected $listeners = ['taskUpdated' => 'loadTasks', 'taskAdded' => 'loadTasks','taskUpdated' => 'loadTasks'];

    public function mount()
    {
        $this->loadTasks();
    }

    public function addTask()
    {

        $this->dispatch('createTask');

    }
    public function recoverAllTasks()
    {

        // Recuperar todas las tareas
        //buscamos el usuario logeado
        $user = auth()->user();
        //recuperamos todas las tareas eliminadas
        $myTask=$user->tasks()->restore();
        //recuperamos todas las tareas compartidas eliminadas
        $shareTask=$user->sharedTasks()->restore();
        //recargamos las tareas
        //$this->tasks = $myTask->merge($shareTask);
        $this->loadTasks();
        session()->flash('success', 'Todas las tareas eliminadas han sido recuperadas.');





    }

    public function loadTasks()
    {

        $user = auth()->user();
        $myTask = $user->tasks;
        $sharedTask = $user->sharedTasks;
        $this->tasks = $myTask->merge($sharedTask);
    }


    public function deleteAllTask(){
        $this->dispatch('deleteAllTask');
    }
    public function confirmDelete($taskId)
    {
        $this->dispatch('confirmDelete', $taskId);
    }


    public function editTask($taskId)
    {
        $this->dispatch('editTask', $taskId);
    }

    public function sharedTask($taskId)
    {

        $this->dispatch('shareTask', $taskId);
    }
    public function unSharedTask($taskId)
    {

        $this->dispatch('unShareTask', $taskId);
    }
    public function markAsCompleted($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $task->is_completed = true;
            $task->save();
            session()->flash('success', 'La tarea ha sido marcada como completada.');
        } else {
            session()->flash('error', 'La tarea no pudo ser encontrada.');
        }
    }

    public function render()
    {
        return view('livewire.task.component');
    }
}
