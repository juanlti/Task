<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\User;
use Illuminate\Console\Command;
use function Laravel\Prompts\table;
use Illuminate\Support\Facades\DB;


class DeleteTaskPending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deletetaskpending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Borra todas las tareas que estan en softdelete';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //las tareas eliminadas con fecha superior a 5 dias respecto a la fecha actual, deben ser borradas de manera fisica


        //Task::withTrashed() obtenemos los registros que fueron eliminado de manera soft delete
        //whereNotNull('deleted_at') obtenemos los registros que no son nulos, tienen una fecha de borrado
        $tasks = Task::withTrashed()->whereNotNull('deleted_at')->where('deleted_at', '<', now()->subDays(5))->get();
        $tasks->each->forceDelete();
    }
}
