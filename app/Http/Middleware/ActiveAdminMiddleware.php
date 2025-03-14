<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ActiveAdminMiddleware
{
    // Проверка доступа администратора

    /**
     * @throws AuthorizationException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isAdmin($request)) {
            return $next($request);
        }

        //abort(403);
        throw new AuthorizationException('Вы не являетесь администратором');
    }

    protected function isAdmin(Request $request): bool
    {
        // $user = $request->user();
        return false;
    }
}
