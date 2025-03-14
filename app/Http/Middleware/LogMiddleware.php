<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    // Логирование

    public function handle(Request $request, Closure $next): Response
    {
        // info('Запрос', ['key' => 'value']);
        // Вывод URL  и параметров запроса
        info($request->url(), $request->all());
        return $next($request);
    }
}
