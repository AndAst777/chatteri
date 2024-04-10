<?php

// use App\Http\Controllers\Post;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/main', [PostController::class, 'index'])->name('main');
// Route::get('/post{post}', [PostController::class, 'show'])->name('post.show');
// // Route::resource('posts.comments', CommentController::class)->only(['store'])->middleware('auth');

// Route::resource('posts', PostController::class)->only(['show']);


// Route::post('post/{post}/unlike', [PostLikeController::class, 'unlike'])->middleware('auth')->name('posts.unlike');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [PostController::class, 'index'])->name('main');
Route::get('/post{post} ', [PostController::class, 'show'])->name('posts.show');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
Route::post('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('post/{post}/like', [PostLikeController::class, 'like'])->middleware('auth')->name('posts.like');
Route::post('post/{post}/comments', [CommentController::class, 'store'])->middleware('auth')->name('posts.comments.store');
// Route::post('categories', [CategoryController::class, ''])->name()
Route::get('/navbar', function () {
    return view('navbar');
});
Route::get('/settings', function () {
    return view('settings');
});
