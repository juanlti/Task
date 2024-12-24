<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener las tareas del usuario
        $tasks = $user->tasks()->get(); // Ejecutamos la consulta para obtener los datos

        // Retornar la vista con las tareas
        return view('dashboard', compact('tasks'));
    }
}
