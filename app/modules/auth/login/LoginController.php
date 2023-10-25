<?php

namespace App\Modules\Login;

use Corviz\Crow\Crow;
use App\Modules\Login\LoginService;

class LoginController
{
    public function __construct() {
        $this->login_service = new LoginService();
    }

    public function login($data){
        $response = $this->login_service->login($data);

        if(!isset($response['user'])){
            Crow::render('auth/login', ['error' => $response['error']]);
        } else {
            Crow::render('home/index', ['user' => $response['user']]);
        }
    }
}