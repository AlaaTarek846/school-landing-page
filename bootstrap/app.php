<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Mockery\Exception\InvalidOrderException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'client' => \App\Http\Middleware\ClientMiddleware::class,
        ]);
        $middleware->web(append: [
            HandleInertiaRequests::class,
            SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        // 404 page when a model is not found
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'message' => 'Record not found.'
                    ], 404);
                }
                return response()->view('admin.error.404', [] ,404);
        });

        $exceptions->render(function (InvalidOrderException $e, Request $request) {
            if (config('app.env') == 'production') {
                return response()->view('admin.error.500', status: 500);
            }
            return response()->json(['message' => $e]);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Method Not Allowed'
                ], 405);
            }
            return response()->json(['message' => $e]);
        });

    })->create();
