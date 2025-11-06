<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/dashboard/task/{task}', [TaskController::class, 'show'])->name('task.show');
    Route::post('/dashboard/task', [TaskController::class, 'store'])->name('task.store');
    Route::delete('/dashboard/task/', [TaskController::class, 'destroy'])->name('task.destroy');
    Route::put('/dashboard/task/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::get('/dashboard/task/{id}/confirm-delete', [TaskController::class, 'confirmDelete'])->name('task.confirm-delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
