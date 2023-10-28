<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PostModel;
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

Route::get('/', function () {
    return view('posts/index', [
        'heading' => "People's favorite posts",
        'posts' => PostModel::allPosts()
    ]);
});

// Singel post
Route::get('/post/{id}', function($id) {
    return view('posts/post', [
        'heading' => "Found post:", 
        'post' =>  PostModel::findPost($id)
    ]);
});
// Auth::routes();

// Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');
// Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

// Route::get('/profile/{user}/edit',  [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
// Route::get('/profile/{user}/{post}/edit',  [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
// Route::post('/post', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');
// Route::get('/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');
