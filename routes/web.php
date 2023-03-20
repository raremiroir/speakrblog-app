<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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


/* ========================
    Public routes 
======================== */
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/home', [PostController::class, 'index'])->name('home');

// Posts
Route::get('/posts/add', [PostController::class, 'create'])->name('posts.add');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/tags/{tag}', [PostController::class, 'indexByTag'])->name('posts.indexByTag');
// Users
Route::get('/users/{user}', [ProfileController::class, 'show'])->name('users.show');

/* ========================
    Authenticated routes
======================== */
Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Posts routes
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/add', [PostController::class, 'create'])->name('posts.add');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Comments routes
    // Route::get('/posts/{post}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    // Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    // Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    // Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    // Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Friendships routes
    // Route::get('/users/search', [FriendshipController::class, 'search'])->name('users.search');
    // Route::get('/users/{user}/friends', [FriendshipController::class, 'index'])->name('users.friends');
    // Route::post('/users/{user}/friendship', [FriendshipController::class, 'store'])->name('users.friendship.store');
    // Route::delete('/users/{user}/friendship', [FriendshipController::class, 'destroy'])->name('users.friendship.destroy');
});

require __DIR__.'/auth.php';
