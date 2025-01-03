<?php
namespace App\Livewire\Task;
use App\Models\Task;
use Livewire\Component;





class Edit extends Component
{
    public $modal = false;
    public $title = '';
    public $description = '';
    public $taskId;
    protected $listeners = ['editTask' => 'loadTask'];

    public function loadTask( $taskId)
    {
        $task = Task::find($taskId);
        $this->taskId = $taskId;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->modal = true;



    }
    public function updateTask()
    {

        // Validar el título
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:15|max:255',
        ]);
        $task = Task::find($this->taskId);
        $task->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);
        // Resetear los campos
        $this->reset(['taskId', 'title', 'description']);
        $this->modal = false;
        $this->dispatch('taskUpdated');
    }

    public function render()
    {
        return view('livewire.task.edit');
    }
}
