<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\PostApiController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function () {
  Route::apiResource('posts', PostApiController::class)->middleware('auth:api');
  Route::prefix("auth")->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('api.v1.auth.login');

    Route::middleware("auth:api")->group(function () {
      Route::get('me', [AuthController::class, 'me'])->name('api.v1.auth.me');
      Route::post('logout', [AuthController::class, 'logout'])->name('api.v1.auth.logout');
      Route::post('refresh', [AuthController::class, 'refresh'])->name('api.v1.auth.refresh');
    });
  });
});