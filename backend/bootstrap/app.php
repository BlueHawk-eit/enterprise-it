<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: ['api/*']);
        $middleware->api(append: [
            \Illuminate\Http\Middleware\HandleCors::class,
        ]);
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
            'csrfheader' => \App\Http\Middleware\VerifyClientHeader::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );

        // Belt and braces: even if APP_DEBUG is ever switched on in production,
        // API errors never include exception classes, file paths or stack traces.
        // Full details are still written to the log. Detailed errors are only
        // shown to requests made from the developer's own machine.
        $exceptions->render(function (\Throwable $e, Request $request) {
            if (!$request->is('api/*') || in_array($request->getHost(), ['localhost', '127.0.0.1'], true)) {
                return null;
            }
            if ($e instanceof \Illuminate\Validation\ValidationException
                || $e instanceof \Illuminate\Auth\AuthenticationException) {
                return null; // Laravel's own safe responses (422 / 401)
            }
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['success' => false, 'message' => 'Not found.'], 404);
            }
            if ($e instanceof HttpExceptionInterface) {
                $status = $e->getStatusCode();
                $message = $status === 404 ? 'Not found.' : ($status === 405 ? 'Method not allowed.' : ($status === 429 ? 'Too many requests.' : 'Request failed.'));
                return response()->json(['success' => false, 'message' => $message], $status, $e->getHeaders());
            }
            return response()->json(['success' => false, 'message' => 'Something went wrong. Please try again.'], 500);
        });
    })->create();
