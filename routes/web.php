<?php

use App\Http\Controllers\TasksController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/trash/{id}/restore', [TasksController::class, 'restore'])->middleware('auth')
    ->name('tasks.restore');

Route::post('/trash/{id}/delete', [TasksController::class, 'delete'])->middleware('auth')
    ->name('tasks.delete');

Route::get('/trash', [TasksController::class, 'trash'])->middleware('auth')
    ->name('tasks.trash');

Route::get('/tasks', [TasksController::class, 'index'])->middleware('auth')
    ->name('tasks.index');

Route::post('/tasks', [TasksController::class, 'index'])->middleware('auth');

Route::post('/tasks', [TasksController::class, 'store'])->middleware('auth')
    ->name('tasks.store');

Route::get('/tasks/create', [TasksController::class, 'create'])->middleware('auth')
    ->name('tasks.create');

Route::post('/tasks/{task}', [TasksController::class, 'update'])->middleware('auth')
    ->name('tasks.update');

Route::get('/tasks/{task}', [TasksController::class, 'update'])->middleware('auth')
    ->name('tasks.update');

Route::put('/tasks/{task}', [TasksController::class, 'update'])->middleware('auth')
    ->name('tasks.update');

Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])->middleware('auth')
    ->name('tasks.destroy');

Route::get('/tasks/{task}/edit', [TasksController::class, 'edit'])->middleware('auth')
    ->name('tasks.edit');

Route::post('/tasks/{task}/complete', [TasksController::class, 'complete'])->middleware('auth')
    ->name('tasks.complete');

require __DIR__ . '/auth.php';
