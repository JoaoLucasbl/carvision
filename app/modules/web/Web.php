<?php

namespace App\Modules;

class Web
{
    public function home($data){
        echo "<h1>Olá mundo!</h1>";
        var_dump($data);
    }

    public function error($data){
        echo "<h1>{$data['errorCode']}</h1>";
        var_dump($data);
    }
}
