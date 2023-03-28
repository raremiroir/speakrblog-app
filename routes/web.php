<?php

use App\Http\Controllers\ImageController;
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

// Posts
Route::controller(PostController::class)->group(function() {
    Route::get( '/',                 'index'     )->name('posts.index');
    Route::get( '/home',             'index'     )->name('home');
    Route::get( '/posts/add',        'create'    )->name('posts.add');
    Route::post('/posts',            'store'     )->name('posts.store');
    Route::get( '/posts/{post}',     'show'      )->name('posts.show');
    Route::get( '/posts/tags/{tag}', 'indexByTag')->name('posts.indexByTag');
});
// Users
Route::controller(ProfileController::class)->group(function() {
    Route::get('/users',                  'index'  )->name('users.index');
    Route::get('/users/{user}',           'show'   )->name('users.show');
    Route::get('/users/{user}/following', 'friends')->name('users.friends');
});
// Search
Route::get('/search', [PostController::class, 'search'])->name('search');

/* ========================
    Authenticated routes
======================== */
Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::controller(ProfileController::class)->group(function() {
        Route::get(   '/profile', 'edit'   )->name('profile.edit');
        Route::patch( '/profile/update', 'update' )->name('profile.update');
        Route::patch( '/profile/update/avatar', 'updateAvatar' )->name('profile.update_avatar');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
    
    // Posts routes
    Route::controller(PostController::class)->group(function() {
        Route::get(   '/posts',               'index'  )->name('posts');
        Route::get(   '/posts/add',           'create' )->name('posts.add');
        Route::post(  '/posts',               'store'  )->name('posts.store');
        Route::get(   '/posts/{post}',        'show'   )->name('posts.show');
        Route::get(   '/posts/{post}/edit',   'edit'   )->name('posts.edit');
        Route::put(   '/posts/{post}',        'update' )->name('posts.update');
        Route::post(  '/posts/{post}/like',   'like'   )->name('posts.like');
        Route::delete('/posts/{post}/unlike', 'unlike' )->name('posts.unlike');
        Route::delete('/posts/{post}',        'destroy')->name('posts.destroy');
    });

    // Comments routes
    Route::controller(CommentController::class)->group(function() {
        Route::get(   '/posts/{post}/comments/create',           'create' )->name('posts.comments.create');
        Route::post(  '/posts/{post}/comments',                  'store'  )->name('posts.comments.store');
        Route::get(   '/posts/{post}/comments/{comment}/edit',   'edit'   )->name('posts.comments.edit');
        Route::put(   '/posts/{post}/comments/{comment}',        'update' )->name('posts.comments.update');
        Route::post(  '/posts/{post}/comments/{comment}/like',   'like'   )->name('posts.comments.like');
        Route::delete('/posts/{post}/comments/{comment}/unlike', 'unlike' )->name('posts.comments.unlike');
        Route::delete('/posts/{post}/comments/{comment}',        'destroy')->name('posts.comments.destroy');
    });

    // Tag routes
    Route::controller(TagController::class)->group(function() {
        Route::get(   '/tags',            'index'  )->name('posts.tags.index');
        Route::get(   '/tags/{tag}',      'show'   )->name('posts.tags.show');
        Route::get(   '/tags/add',        'create' )->name('posts.tags.add');
        Route::post(  '/tags',            'store'  )->name('posts.tags.store');
        Route::get(   '/tags/{tag}/edit', 'edit'   )->name('posts.tags.edit');
        Route::put(   '/tags/{tag}',      'update' )->name('posts.tags.update');
        Route::delete('/tags/{tag}',      'destroy')->name('posts.tags.destroy');
    });


    // Friendships routes
    Route::controller(ProfileController::class)->group(function() {
        Route::get(   '/users/{user}/follow',    'follow'   )->name('users.follow');
        Route::delete('/users/{user}/unfollow',  'unfollow' )->name('users.unfollow');
    });

    // Image routes
    Route::controller(ImageController::class)->group(function() {
        Route::get( '/image-upload', 'index')->name('image.create');
        Route::post('/image-upload', 'store')->name('image.store');
    });
});

require __DIR__.'/auth.php';
