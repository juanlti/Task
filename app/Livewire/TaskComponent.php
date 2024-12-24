<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskComponent extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $modal = false;

    public function render()
    {
        return view('livewire.task-component');
    }

    public function mount()
    {
        $this->tasks =$this->getTask();
    }

    private function clearFields()
    {
        $this->title = '';
        $this->description = '';
    }

    public function openModal()
    {

        $this->clearFields();
        $this->modal = true;

    }

    public function closeModal()
    {
        $this->modal = false;
    }

    //test
    public function createTask()
    {
        // dd($this->title, $this->description);
        /*
        $this->validate([
            'title' => 'required|min:6|max:20',
            'description' => 'required|min:10|max:30',
        ]);
        */

        $newTask = Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);
        //dd($newTask->toArray());

       // $this->clearFields();
        $this->modal = false;
        //recargar las tareas
       // $this->emit('taskCreated');
        $this->getTask();


    }
    public function getTask()
    {
       return $this->tasks = Task::where('user_id', auth()->id())->get();
    }

}
