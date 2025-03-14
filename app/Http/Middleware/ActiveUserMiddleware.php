<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveUserMiddleware
{
    // Проверка доступа пользователя

    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isActive($request)) {
            return $next($request);
        }

        //abort(403);
        throw new AuthorizationException('Доступ запрещен');
    }

    protected function isActive(Request $request): bool
    {
        // $user = $request->user();
        return true;
    }
}
