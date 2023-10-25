<?php

namespace App\Middleware;

use CoffeeCode\Router\Router;

class User
{
    public function handle(Router $router): bool
    {
        $user = $this->authenticated();
        if ($user) {
            // var_dump($router->current());
            return true;
        }
        $router->redirect("/login");
        return false;
    }

    private function authenticated(){
        session_start();
        if(!isset($_SESSION['user'])){
            return false;
        }
        return true;
    }
}