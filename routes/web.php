<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('index');

//for adding a new task
Route::get('/add', [App\Http\Controllers\TaskController::class, 'add'])->name('add');
Route::post('/store', [App\Http\Controllers\TaskController::class, 'store'])->name('store');

//for editing an existing task
Route::get('/edit/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('update');

//for deleting a task
Route::get('/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete');

//for updating the status of a task
Route::post('/status/{id}', [App\Http\Controllers\TaskController::class, 'updateStatus'])
    ->name('status.update');