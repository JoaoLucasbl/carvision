<?php

namespace App\Modules\Login;

use App\Base\DatabaseConnection;
use App\Base\Service;
use Exception;

class LoginService extends Service
{

    public function login($data){
        
        session_start();

        if((!isset($data['username']) || empty($data['username']))){
            return ['error'=> 'Username é obrigatório'];
        }

        if((!isset($data['password']) || empty($data['password']))){
            return ['error'=> 'Senha é obrigatório'];
        }

        $username = $this->validate($data['username']);
        $password = sha1($this->validate($data['password']));

        try{

            $stmt = $this->conn->prepare('SELECT * FROM `users` WHERE `username` = ? AND `password` = ?');
            $stmt->execute([$username, $password]);
            $result = $stmt->get_result();
            $row = $result->fetch_array(MYSQLI_NUM);
            if((bool)$row){
                $_SESSION['user'] = [
                    'id' => $row[0],
                    'name' => $row[1],
                    'username' => $row[2],
                    'access_level_id' => $row[4]
                ];
                return ['user' => $_SESSION['user']];
            } else {
                return ['error'=> 'Credenciais inválidas'];
            }

        } catch (Exception $e){
            return ['error'=> $e->getMessage()];
        }

        return;
    }
}