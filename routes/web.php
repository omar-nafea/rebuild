<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/categories', [IndexController::class, 'showCategories']);
Route::get('/category/create', [IndexController::class, 'createCategory']);

Route::resource('writers', WriterController::class);
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
