<?php

use App\Livewire\Task\TaskComponent;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/informacion');
Route::get('informacion',TaskComponent::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
/*
Route::get('informacion',[DashboardController::class,'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
*/
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
