<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PostModel;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('posts/index', [
//         'heading' => "People's favorite posts",
//         'posts' => PostModel::allPosts()
//     ]);
// });

// // Singel post
// Route::get('/post/{id}', function($id) {
//     return view('posts/post', [
//         'heading' => "Found post:", 
//         'post' =>  PostModel::findPost($id)
//     ]);
// });

// Auth::routes();
//all posts
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index']);
//single post
Route::get('/posts/{post}', [PostsController::class, 'show']);
//create post
Route::get('/posts/create', [PostsController::class, 'create'])->middleware('auth');
// Store Post data
Route::post('/posts', [PostsController::class, 'store'])->middleware('auth');
//edit and update
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->middleware('auth');
Route::put('/posts/{post}', [PostsController::class, 'update'])->middleware('auth');

//Delete
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->middleware('auth');

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
