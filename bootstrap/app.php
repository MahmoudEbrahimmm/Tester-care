<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Spatie\Ignition\Exceptions\RenderableExceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        api: __DIR__ . '/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'check.admin' => \App\Http\Middleware\CheckAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
    $exceptions->render(function(HttpException $exception, Request $request) {
        if($request->is('api/*')) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status_code' => $exception->getStatusCode(),
            ], $exception->getStatusCode());
        }
    });
})->create();
