<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
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
Route::get('/users', [ProfileController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [ProfileController::class, 'show'])->name('users.show');
// Search
Route::get('/search', [PostController::class, 'search'])->name('search');

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
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Comments routes
    Route::get('/posts/{post}/comments/create', [CommentController::class, 'create'])->name('posts.comments.create');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
    Route::get('/posts/{post}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('posts.comments.edit');
    Route::put('/posts/{post}/comments/{comment}', [CommentController::class, 'update'])->name('posts.comments.update');
    Route::post('/posts/{post}/comments/{comment}/like', [CommentController::class, 'like'])->name('posts.comments.like');
    Route::delete('/posts/{post}/comments/{comment}/unlike', [CommentController::class, 'unlike'])->name('posts.comments.unlike');
    Route::delete('/posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('posts.comments.destroy');

    // Tag routes
    Route::get('/tags', [TagController::class, 'index'])->name('posts.tags.index');
    Route::get('/tags/{tag}', [TagController::class, 'show'])->name('posts.tags.show');
    Route::get('/tags/add', [TagController::class, 'create'])->name('posts.tags.add');
    Route::post('/tags', [TagController::class, 'store'])->name('posts.tags.store');
    Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('posts.tags.edit');
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('posts.tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('posts.tags.destroy');


    // Friendships routes
    // Route::get('/users/{user}/following', [ProfileController::class, 'friends'])->name('users.friends');
    Route::post('/users/{user}/follow', [ProfileController::class, 'follow'])->name('users.follow');
    Route::delete('/users/{user}/unfollow', [ProfileController::class, 'unfollow'])->name('users.unfollow');
});

require __DIR__.'/auth.php';
