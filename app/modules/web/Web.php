<?php

namespace App\Modules;

use Corviz\Crow\Crow;

class Web
{
    public function home($data){
        Crow::render('home/index', ['user' => $_SESSION['user']]);
    }

    public function login($data){
        Crow::render('auth/login');
    }

    public function register($data){
        Crow::render('auth/register');
    }

    public function error($data){
        echo "<h1>{$data['errorCode']}</h1>";
        var_dump($data);
    }
}
