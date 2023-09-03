<?php

$sname= "carvision-db-1";
$unmae= "root";
$password = "root";
$db_name = "carvision_local";
$port = "3306";

try {
    $conn = mysqli_connect($sname, $unmae, $password, $db_name, $port);
} catch (\Throwable $th) {
    throw $th;
    // echo "Connection failed!";
    // echo $th;
    // header("Location: index.php?error=Não foi possível estabelecer uma conexão");
    // exit();
}