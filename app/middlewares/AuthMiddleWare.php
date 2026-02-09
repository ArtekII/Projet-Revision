<?php

namespace app\middlewares;

class AuthMiddleware
{
    public function handle($request, $response, $next)
    {
        if (!isset($_SESSION['user'])) {
            \Flight::redirect('/login');
            return;
        }

        $next();
    }
}
