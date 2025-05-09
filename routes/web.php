<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('task.index');
});


Route::get('tasks/edit', [TaskController::class, 'edit'])
->name('tasks.edit');
Route::put('task/update', [TaskController::class, 'update'])
->name('tasks.update');
Route::resource('task', TaskController::class)
->except(['edit','update']);