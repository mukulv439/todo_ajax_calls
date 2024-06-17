<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;





    Route::get('/', [TaskController::class, 'show'])->name('cms_home');
    Route::get('/tasks', [TaskController::class, 'index'])->name('cms_home_add');
    Route::post('/tasks', [TaskController::class, 'store'])->name('cms_home_save');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('cms_home_edit');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('cms_home_update');

