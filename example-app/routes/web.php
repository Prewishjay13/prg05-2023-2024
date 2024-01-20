<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdminController;
use App\Models\PostModel;

// Auth::routes();
//all posts
Route::get('/', [PostsController::class, 'index']);

//single post
Route::get('/post/{post}', [PostsController::class, 'show']);
//create post
Route::get('/posts/create', [PostsController::class, 'create'])->middleware('auth');
// Store Post data
Route::post('/posts', [PostsController::class, 'store'])->middleware('auth');
//edit and update
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->middleware('auth');
Route::put('/posts/{post}', [PostsController::class, 'update'])->middleware('auth');

//Delete
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->middleware('auth');

//deactivate post
Route::put('/posts/{post}/deactivate', [PostsController::class, 'deactivate'])->middleware('auth');
//manage posts
Route::get('/posts/manage', [PostsController::class, 'manage'])->middleware('auth');

//register user form
Route::get('/register', [UsersController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UsersController::class, 'store']);

// Log User Out
Route::post('/logout', [UsersController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');

// Log in User
Route::post('/users/authenticate', [UsersController::class, 'authenticate']);

//likes
Route::post('/posts/{post}/like', [PostsController::class, 'addLike'])->name('posts.like')->middleware('auth');

Route::get('/admin/manage', [PostsController::class, 'adminManage'])->name('admin.manage');

Route::post('/posts/{post}/deactivate', [PostsController::class, 'deactivate'])->name('posts.deactivate');

Route::post('/posts/{post}/activate', [PostsController::class, 'activate'])->name('posts.activate');