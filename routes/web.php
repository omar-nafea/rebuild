<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use Pest\Plugins\Only;

Route::get('/', [IndexController::class, 'index']);
Route::get('/cat', [IndexController::class, 'createCategory']);
Route::resource('writers', WriterController::class);
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::resource('categories', CategoryController::class)->only(['index', 'create', 'store', 'show']);
