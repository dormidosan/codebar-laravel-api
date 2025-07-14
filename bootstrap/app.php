<?php

use App\Http\Middleware\LogAccessMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Run on every request
        $middleware->append(LogAccessMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        $exceptions->render(function (QueryException $e, $request) {
            return response()->json([
                'success' => false,
                'message' => "An error occurred while retrieving data. Please try again later.".$e->getMessage(),
            ], 500);
        });

        $exceptions->render(function (NotFoundHttpException $e, $request) {
            return response()->json([
                'success' => false,
                'message' => "Resource not found. ".$e->getMessage(),
            ], 404);
        });

        $exceptions->render(function (MethodNotAllowedHttpException $e, $request) {
            return response()->json([
                'success' => false,
                'message' => "Method not allowed.".$e->getMessage(),
            ], 405);
        });

        $exceptions->render(function (AuthenticationException $e, $request) {
            return response()->json([
                'success' => false,
                'message' => "Error authentication. ".$e->getMessage(),
            ], 401);
        });

        $exceptions->render(function (Throwable $e, $request) {
            return response()->json([
                'success' => false,
                'message' => "Unexpected error occurred. Please try again later.".$e->getMessage(),
            ], 500);
        });
    })->create();
