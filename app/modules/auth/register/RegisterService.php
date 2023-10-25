<?php

namespace App\Modules\Register;

use App\Base\DatabaseConnection;
use App\Base\Service;
use Exception;

class RegisterService extends Service
{
    public function __construct() {
        $this->conn = (new DatabaseConnection())->conn;
    }

    public function register($data){
        session_start();
        
        if(!isset($data['name']) || empty($data['name'])){
            return ['error' => 'Nome é obrigatório'];
        }
        
        if((!isset($data['username']) || empty($data['username']))){
            return ['error' => 'Username é obrigatório'];
        }
        
        if((!isset($data['password']) || empty($data['password']))){
            return ['error' => 'Senha é obrigatório'];
        }
        
        if((!isset($data['access_level_id']) || empty($data['access_level_id']))){
            return ['error' => 'Level de acesso é obrigatório'];
        }

        
        $username = $this->validate($data['username']);
        $name = $this->validate($data['name']);
        $password = sha1($this->validate($data['password']));
        $access_level_id = intval($data['access_level_id']);

        try{

            $stmt = $this->conn->prepare('SELECT 1 FROM `users` WHERE username = ?');
            $stmt->execute([$username]);
            $row = $stmt->fetch();
            $usernameExists = (bool)$row;
            if($usernameExists){
                return ['error' => 'Este Username já está em uso'];
            }


            $sql = "INSERT INTO users 
            (username, name, password, access_level_id) 
            VALUES (
                '".$username."', 
                '".$name."',
                '".$password."',
                ".$access_level_id."
            );";

            $result = mysqli_query($this->conn, $sql);

            if($result){
                return ['success' => 'Usuário cadastrado com sucesso'];
            } else {
                return ['error' => 'Erro ao cadastrar o usuário'];
            }

        } catch (Exception $e){
            return ['error' => $e->getMessage()];
        }
        return;
    }
}




