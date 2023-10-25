<?php

namespace App\Middleware;

use CoffeeCode\Router\Router;

class User
{
    public function handle(Router $router): bool
    {
        $user = false;
        if ($user) {
            var_dump($router->current());
            return true;
        }
        $router->redirect("/login");
        return false;
    }
}