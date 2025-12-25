<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// welcome
Route::get('/', function(){return view('welcome');});
Route::get('/users', [UserController::class, 'users'])->name('users.users');
Route::get('/posts', [UserController::class, 'posts'])->name('users.posts');

// posts
Route::get('/users/{id}/posts', [UserController::class, 'posts_user'])->name('users.posts_user');
Route::post('/users/{id}/posts/create', [UserController::class, 'posts_create'])->name('users.posts_create');
Route::delete('/users/{id}/posts/delete', [UserController::class, 'posts_delete'])->name('users.posts_delete');

// comments
Route::get('/users/{id}/comments', [UserController::class, 'comments_user'])->name('users.comments_user');
Route::post('/users/{id}/comments/create', [UserController::class, 'comments_create'])->name('users.comments_create');
Route::delete('/users/{id}/comments/delete', [UserController::class, 'comments_delete'])->name('users.comments_delete');

// create
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// delete
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');

// edit
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
