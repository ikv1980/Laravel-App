<?php

//use App\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',       // Существующий маршрут
            __DIR__.'/../routes/user.php',      // Добавляем новый маршрут user
            __DIR__.'/../routes/admin.php',     // Добавляем новый маршрут admin
        ],
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // настройки режима обслуживания
        $middleware->preventRequestsDuringMaintenance(except: ['admin*', 'test']);
        // $middleware->append(\App\Http\Middleware\LogMiddleware::class);
        $middleware->alias([
            'my_log' => \App\Http\Middleware\LogMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
