<?php

namespace App\Modules\Register;

use Corviz\Crow\Crow;
use App\Modules\Register\RegisterService;

class RegisterController
{
    public function __construct() {
        $this->register_service = new RegisterService();
    }

    public function register($data){
        $response = $this->register_service->register($data);
        
        if(isset($response['error'])){
            Crow::render('auth/register', ['error' => $response['error']]);
        } else {
            Crow::render('auth/register', ['success' => $response['success']]);
        }
    }
}




