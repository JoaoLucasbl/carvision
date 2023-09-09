<?php
session_start(); 
include "../../../base/DatabaseConnection.php";

$bits = explode('?',$_SERVER['HTTP_REFERER']);
$redirect = $bits[0];

if((!isset($_POST['username']) || empty($_POST['username']))){
    header('Location: ' . $redirect . '?error=Username é obrigatório');
    exit();
}

if((!isset($_POST['password']) || empty($_POST['password']))){
    header('Location: ' . $redirect . '?error=Senha é obrigatório');
    exit();
}

function validate($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;

 }

$username = validate($_POST['username']);
$password = sha1(validate($_POST['password']));

try{

    $stmt = $conn->prepare('SELECT 1 FROM `users` WHERE username = ? AND password = ?');
    $stmt->execute([$username, $password]);
    $row = $stmt->fetch();
    $userExists = (bool)$row;
    if($userExists){
        $_SESSION['user'] = [
            'id' => 1,
            'name' => '',
            'username' => ''
        ];

        header('Location: ../../../views/home');
        exit();
    } else {
        header('Location: ' . $redirect . '?error=Credenciais inválidas');
        exit();
    }

} catch (Exception $e){
    header('Location: ' . $redirect . '?error='.$e->getMessage());
    exit();
}


header('Location: ' . $redirect);
exit();