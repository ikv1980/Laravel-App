<?php

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
        // настройки режима обслуживания `php artisan down`
        $middleware->preventRequestsDuringMaintenance(except: ['admin*', 'test']);
        // добавление посредника в глобальное пространство
        // $middleware->append(\App\Http\Middleware\LogMiddleware::class);
        // удаление посредника из глобального пространства
        // $middleware->remove(Illuminate\Foundation\Http\Middleware\TrimStrings::class);
        // Ограничение 60 запросов в минуту для API
        // Регистрация алиасов
        $middleware->alias([
            'my_log' => \App\Http\Middleware\LogMiddleware::class,
            'active_user' =>\App\Http\Middleware\ActiveUserMiddleware::class,
            'active_admin' =>\App\Http\Middleware\ActiveAdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
