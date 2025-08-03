<?php

use App\Http\Middleware\OnlyMe;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    api: __DIR__ . '/../routes/api.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
      'onlyMe' => OnlyMe::class,
      'role' => RoleMiddleware::class
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions): void {
    // Handle the AuthenticationException for API requests
    $exceptions->render(function (AuthenticationException $e, Request $request) {
      if ($request->is('api/*')) {
        return response()->json([
          'message' => 'Unauthenticated',
        ], 401);
      }
    });

  })->create();
