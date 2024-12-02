<?php

namespace Interfaces\middlewares;

class AuthMiddleware
{
    public function __invoke($request, $response, $next)
    {
        session_start();

        if (empty($_SESSION['user'])) {
            return $response->withRedirect('/login');
        }

        return $next($request, $response);
    }
}