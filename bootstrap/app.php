<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/web.php'));
        },
    )

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectTo(function () {
            $request = request();        
            return $request->is('admin/*') ? route('admin.login') : route('staff_login');
        });
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
