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

$router->namespace("App\Modules\Web");

$router->group(null);
$router->get("/", "Web:home");

$router->group("ooops");
// $router->get("/{errorCode}", "Web:error");
$router->get("/{errorCode}", function($data){
    echo "<h1>{$data['errorCode']}</h1>";
    var_dump($data);
});

$router->dispatch();

if($router->error()){
    $router->redirect("ooops/".$router->error());
}