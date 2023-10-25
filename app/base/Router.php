<?php

use CoffeeCode\Router\Router;

$router = $GLOBALS['router'] = new Router("http://localhost:8080"); 

$router->namespace("App\Modules");

$router->group(null);
$router->get("/login", "Web:login");

$router->group(null, \App\Middleware\User::class);
$router->get("/", "Web:home");
$router->get("/home", "Web:home");

$router->group("ooops");
$router->get("/{errorCode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("ooops/".$router->error());
}