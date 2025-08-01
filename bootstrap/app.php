<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            // 'clear.application.session' => \App\Http\Middleware\ClearApplicationSession::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'stripe/*',
            'careers/job/*/apply',  // Add your route pattern here
            '/careers/check-status',  // Add your route pattern here
            '<career-applications></career-applications>/remove-ip',  // Add your route pattern here
            ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
