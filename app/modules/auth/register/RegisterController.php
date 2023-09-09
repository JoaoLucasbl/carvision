<?php
// session_start(); 
include "../../../base/DatabaseConnection.php";

$bits = explode('?',$_SERVER['HTTP_REFERER']);
$redirect = $bits[0];

if(!isset($_POST['name']) || empty($_POST['name'])){
    header('Location: ' . $redirect . '?error=Nome é obrigatório');
    exit();
}

if((!isset($_POST['username']) || empty($_POST['username']))){
    header('Location: ' . $redirect . '?error=Username é obrigatório');
    exit();
}

if((!isset($_POST['password']) || empty($_POST['password']))){
    header('Location: ' . $redirect . '?error=Senha é obrigatório');
    exit();
}

if((!isset($_POST['access_level_id']) || empty($_POST['access_level_id']))){
    header('Location: ' . $redirect . '?error=Level de acesso é obrigatório');
    exit();
}

function validate($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;

 }

$username = validate($_POST['username']);
$name = validate($_POST['name']);
$password = sha1(validate($_POST['password']));
$access_level_id = intval($_POST['access_level_id']);

try{

    $stmt = $conn->prepare('SELECT 1 FROM `users` WHERE username = ?');
    $stmt->execute([$username]);
    $row = $stmt->fetch();
    $usernameExists = (bool)$row;
    if($usernameExists){
        header('Location: ' . $redirect . '?error=Este Username já está em uso');
        exit();
    }


    $sql = "INSERT INTO users 
    (username, name, password, access_level_id) 
    VALUES (
        '".$username."', 
        '".$name."',
        '".$password."',
        ".$access_level_id."
    );";

    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location: ' . $redirect . '?success=Usuário cadastrado com sucesso');
        exit();
    } else {
        header('Location: ' . $redirect . '?error=Erro ao cadastrar o usuário');
        exit();
    }

} catch (Exception $e){
    // echo validate($e->getMessage());
    header('Location: ' . $redirect . '?error='.$e->getMessage());
    exit();
}


header('Location: ' . $redirect);
exit();