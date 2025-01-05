<?php

namespace App\Livewire\Task;

use App\Models\User;
use App\Models\Task;
use Livewire\Component;

class Share extends Component
{
    public $modal=false;
    public $users;
    public $taskSelected;
    public $selectedUser=null;
    protected $listeners = ['shareTask' => 'showModal'];

    public function showModal(Task $task)
    {
        $this->taskSelected = $task;
        $this->modal = true;
    }
    public function mount()
    {
        $this->users = User::where('id','!=',auth()->id())->get();


    }
    public function shared(){


        $selectedUser=User::find($this->selectedUser);
        $selectedUser->sharedTasks()->attach($this->taskSelected->id, ['permission' => $this->permiso]);

        dd($selectedUser);
        $selectedUser->sharedTasks()->attach($taskSelected->id, ['permission' => $this->permiso]);

    }
    public function render()
    {
        return view('livewire.task.share');
    }
}
