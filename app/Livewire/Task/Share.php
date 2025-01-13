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
    public $showModalUnsshareTask=false;
    public $permission = [ // Lista de permisos
        'view' => 'Ver',
        'edit' => 'Editar',
        'delete' => 'Eliminar',
    ];


    protected $listeners = ['shareTask' => 'showModal','unShareTask' => 'showModalUnsshareTask'];

    public function showModalUnsshareTask(Task $task){

        $this->showModalUnsshareTask=true;
        $this->taskSelected = $task;


    }
    public function unShareTask()
    {
        // Obtengo el usuario registrado
        $user = User::find(auth()->user()->id);

        // Verifico si el usuario es el propietario de la tarea
        if ($this->taskSelected->user_id === $user->id) {
            // Desasocio la tarea de todos los usuarios con los que se ha compartido
            $this->taskSelected->sharedWith()->detach();

            $this->showModalUnsshareTask = false;
            session()->flash('success', 'Tarea descompartida exitosamente con todos los usuarios.');
        } else {
            session()->flash('error', 'No tienes permiso para descompartir esta tarea.');
        }
        $this->dispatch('taskUpdated');
    }
    public function showModal(Task $task)
    {
        $this->taskSelected = $task;
        $this->modal = true;
    }
    public function shared()
    {
        try {
            /*
            // Validar datos requeridos
            $this->validate([
                'taskSelected' => 'required|exists:tasks,id',
                'selectedUser' => 'required|exists:users,id',
                'selectedPermission' => 'required|in:edit,view',
            ]);
            */

            // Encuentra al usuario y adjunta la tarea con el permiso seleccionado
            $user = User::findOrFail($this->selectedUser);

            $this->taskSelected->sharedWith()->attach($user, [
                'permission' => $this->selectedPermission,
            ]);

            // Mensaje de éxito
            session()->flash('success', 'Tarea compartida exitosamente.');
            $this->dispatch('clear-messages');
            // Cierra el modal
            $this->reset(['modal', 'selectedUser', 'selectedPermission', 'taskSelected']);


            // Notifica a otros componentes
            $this->dispatch('taskUpdated');
        } catch (\Exception $e) {
            // Maneja errores y muestra un mensaje adecuado
            session()->flash('error', 'Ocurrió un error al compartir la tarea: ' . $e->getMessage());
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
