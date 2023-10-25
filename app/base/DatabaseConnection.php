<?php

namespace App\Base;

class DatabaseConnection
{

    private $sname = DATABASE_HOST;
    private $unmae = DATABASE_USERNAME;
    private $password = DATABASE_PASSWORD;
    private $db_name = DATABASE_NAME;
    private $port = DATABASE_PORT;

    public $conn = null;

    public function __construct() {
        try {
            $this->conn = mysqli_connect($this->sname, $this->unmae, $this->password, $this->db_name, $this->port);
        } catch (\Throwable $th) {
            throw $th;
            // echo "Connection failed!";
            // echo $th;
            // header("Location: index.php?error=Não foi possível estabelecer uma conexão");
            // exit();
        }
    }
    
    
}
