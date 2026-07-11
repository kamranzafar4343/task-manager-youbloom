<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('index');

Route::get('/add', [App\Http\Controllers\TaskController::class, 'add'])->name('add');
Route::post('/store', [App\Http\Controllers\TaskController::class, 'store'])->name('store');