<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin area
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');
    Route::get('admin/todos', [TodoController::class, 'todos'])->name('admin.users');
    Route::get('admin/addtodo', [TodoController::class, 'addtodo']);
    Route::post('/tasks', [TodoController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}/update-status', [TodoController::class, 'updateTaskStatus'])->name('tasks.update-status');

    Route::get('admin/edittodo/{id}', [TodoController::class, 'editTodo'])->name('todos.edit');
    Route::put('admin/updatetodo/{id}', [TodoController::class, 'updateTodo'])->name('todos.update');
    Route::get('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
    });

//user area
Route::get('user/todos', [UserController::class, 'todos'])->name('users');
Route::put('/tasks/{task}/update-status', [UserController::class, 'updateTaskStatus'])->name('tasks.update-status');

// Route::get('user/add_users', [App\Http\Controllers\UserController::class, 'index'])->name('add_users');
// Route::post('store', [App\Http\Controllers\UserController::class, 'store']);
// Route::get('user/show', [App\Http\Controllers\UserController::class, 'show'])->name('users');
// Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'user'])->name('user');
// Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
// Route::post('update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
// Route::get('delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete');




