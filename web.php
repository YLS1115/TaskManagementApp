<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Task routes
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'getTasks']);
    Route::post('/create', [TaskController::class, 'addTask']);
    Route::put('/update/{id}', [TaskController::class, 'updateTask']);
    Route::delete('/remove/{id}', [TaskController::class, 'deleteTask']);
});

Route::get('/', function () {
    return view('welcome');
});
