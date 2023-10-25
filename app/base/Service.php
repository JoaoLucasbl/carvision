<?php

namespace App\Base;

class Service
{
    public function __construct() {
        $this->conn = (new DatabaseConnection())->conn;
    }
    
    function validate($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }
}