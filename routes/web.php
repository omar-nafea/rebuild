<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

Route::get('/', [IndexController::class, 'index']);

Route::middleware('onlyMe')->group(function () {
  Route::get('/cat', [IndexController::class, 'createCategory']);
});

Route::middleware('auth')->group(function () {

    // Routes accessible only to Admins
    Route::middleware('role:admin')->group(function () {
        // This will create the following named routes, protected by the 'admin' role:
        // - posts.create
        // - posts.store
        // - posts.destroy
        Route::resource('posts', PostController::class)->only([
            'create', 'store', 'destroy'
        ]);
    });

    // Routes accessible to Viewers, Editors, and Admins
    Route::middleware('role:viewer,editor,admin')->group(function () {
        // This will create the following named routes:
        // - posts.index
        // - posts.show
        Route::resource('posts', PostController::class)->only([
            'index', 'show'
        ]);

        // Route::resource already creates named routes for comments by default
        // (e.g., comments.index, comments.store, etc.)
        Route::resource('comments', CommentController::class);
    });

    // Routes accessible only to Editors and Admins
    Route::middleware('role:editor,admin')->group(function () {
        // This will create the following named routes:
        // - posts.edit
        // - posts.update
        Route::resource('posts', PostController::class)->only([
            'edit', 'update'
        ]);
    });
});

Route::resource('comments', CommentController::class);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.show');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');