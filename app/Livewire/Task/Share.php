<?php

namespace App\Livewire\Task;

use App\Models\User;
use App\Models\Task;
use Livewire\Component;

class Share extends Component
{
    public $modal = false; // Controla la visibilidad del modal
    public $taskSelected; // Tarea seleccionada
    public $selectedUser = null; // Usuario seleccionado
    public $selectedPermission = 'view'; // Permiso seleccionado por defecto
    public $permission = [ // Lista de permisos
        'view' => 'Ver',
        'edit' => 'Editar',
        'delete' => 'Eliminar',
    ];
    public $showModalUnsshareTask=false;

    protected $listeners = ['shareTask' => 'showModal','unshareTask' => 'showModalUnsshareTask'];

    public function showModalUnsshareTask(Task $task){
        $showModalUnsshareTask=true;

    }
    public function unShareTask(){

        $user=$task::find(auth()->user()->id);
        $user->sharedTasks()->detach($task);
        $this->modal = true;
    }
    public function showModal(Task $task)
    {
        $this->taskSelected = $task;
        $this->modal = true;
    }
    public function shared()
    {
        // Verifica si la tarea y el usuario son válidos
        if ($this->taskSelected && $this->selectedUser) {
            $user = User::find($this->selectedUser);

            // Adjunta la tarea con el permiso seleccionado
            $this->taskSelected->sharedWith()->attach($user, [
                'permission' => $this->selectedPermission,
            ]);

            session()->flash('success', 'Tarea compartida exitosamente.');
            $this->modal = false; // Oculta el modal después de compartir
        } else {
            session()->flash('error', 'Por favor selecciona un usuario y un permiso válido.');
        }

    }

    public function render()
    {
        // Obtiene la lista de usuarios excluyendo al usuario actual
        $users = User::where('id', '!=', auth()->id())->get();

        return view('livewire.task.share', [
            'users' => $users,
        ]);
    }
}
