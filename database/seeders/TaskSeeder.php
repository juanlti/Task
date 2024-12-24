<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //eloquent
        $task=new Task();
        $task->title='Task 1';
        $task->description='descripcion de la tarea 1';
        $task->user_id=User::find(1)->id;
        $task->save();



    }
}


