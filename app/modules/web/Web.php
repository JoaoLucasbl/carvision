<?php

namespace App\Modules;

use Corviz\Crow\Crow;

class Web
{
    public function home($data){
        Crow::render('home/index');
    }

    public function login($data){
        Crow::render('auth/login');
    }

    public function error($data){
        echo "<h1>{$data['errorCode']}</h1>";
        var_dump($data);
    }
}
