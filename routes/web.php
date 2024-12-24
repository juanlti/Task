<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::redirect('/', '/informacion');
Route::get('informacion',[DashboardController::class,'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
