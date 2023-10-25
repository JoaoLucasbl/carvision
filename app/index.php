<?php
// session_start();
// if(!isset($_SESSION['user'])){
//     header('Location: ./views/auth/login.php');
//     exit();
// } else {
//     header('Location: ./views/home/index.php');
//     exit();
// }

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router("http://localhost:8080"); 

$router->namespace("App\Modules");

$router->group(null);
$router->get("/", "Web:home");

$router->group("ooops");
$router->get("/{errorCode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("ooops/".$router->error());
}