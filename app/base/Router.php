<?php

use CoffeeCode\Router\Router;

$router = $GLOBALS['router'] = new Router(URL_BASE); 

$router->group(null);

    $router->namespace("App\Modules");

        $router->get("/login", "Web:login");
        $router->get("/cadastro", "Web:register");

    $router->namespace("App\Modules\Register");
        $router->post("/cadastro", "RegisterController:register");
    
    $router->namespace("App\Modules\Login");
        $router->post("/login", "LoginController:login");

$router->group(null, \App\Middleware\User::class);
    $router->get("/", "Web:home");
    $router->get("/home", "Web:home");

$router->group("ooops");
    $router->get("/{errorCode}", "Web:error");

    if($router->error()){
        $router->redirect("ooops/".$router->error());
    }
    
$router->dispatch();
