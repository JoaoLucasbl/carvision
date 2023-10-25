<?php
// session_start();
// if(!isset($_SESSION['user'])){
//     header('Location: ./views/auth/login.php');
//     exit();
// } else {
//     header('Location: ./views/home/index.php');
//     exit();
// }

require __DIR__."/config.php";
require __DIR__."/vendor/autoload.php";
require __DIR__."/base/TemplateConfiguration.php";
require __DIR__."/base/Router.php";
