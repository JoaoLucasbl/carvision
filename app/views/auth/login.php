<?php
session_start(); 
if(isset($_SESSION['user']))
    $_SESSION['user'] = NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CarVision - Identifique-se</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="icon_aba.ico" type="image/x-icon">
<style>
  body {
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #3F2350;  
  }
  
  .logo-background{
    position: relative;
    left: -150px;
  }

  .container-box {
    width: 470px;
    height: 525px;
    background-color: white;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    position: absolute;
    right: 94px; 
    top: 50%;
    transform: translateY(-50%);
  }

  .logo{
    margin-top: 74px;
    margin-bottom: 52px;
    width: 135px;
    height: auto;
    line-height: normal;
    text-align: center;
  }

  .input-box {
    width: 100%;
    max-width: 358px;
    height: 50px;
    margin-top: 5px;
    margin-bottom: 10px;
    padding: 10px;
    border: 2px solid #3F2350;
    border-radius: 5px;
    transition: border-color 0.3s;
  }

  .input-box:hover {
    border-color: #3F2350;
  }

  .btn-entrar {
    margin-top: 20px;
    color: white;
    background-color: #3F2350;
    border-color: #3F2350;
    border-radius: 20px;
    width: 358px;
    height: 45px;;
  }

  .btn-cadastrar {
    width: 100%;
    max-width: 358px;
    color: #3F2350;
    background-color: white;
    border-radius: 20px;
  }

  .btn-entrar:hover{
    background-color: white;
    color: #3F2350;
    border-color: #3F2350;
  }
  .btn-cadastrar:hover {
    background-color: #3F2350;
  }

  .or-box {
    width: 100%;
    max-width: 358px;
    height: 16px;
    text-align: center;
    background-color: white;
    color: #3F2350;
    margin: 10px 0;
    margin-bottom: 20px;
  }


  .diagonal{
    width: 0;
    height: 0;
    margin-bottom: 0px;
    border-left: 100vw solid transparent;
    border-bottom: 90vw solid #ccc;
    bottom: 0px;
    z-index: -1;
    position: fixed;
  }
</style>
</head>
<body>
  <div class="diagonal"></div>  
  <div>
    <img class="logo-background" src="icon_background.png">
  </div>
  <section>
  <div class="container-box">
    <div>
      <img class="logo" src="icon_txt.png">
    </div>
    <?php
        if(isset($_GET['error'])){
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Aviso: </strong> <?php echo $_GET['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>
    <?php
        if(isset($_GET['success'])){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Aviso: </strong> <?php echo $_GET['success'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>
    <form method="POST" action="../../modules/auth/login/LoginController.php">
      <input name="username" type="text" class="input-box" placeholder="Username">
      <input name="password" type="password" class="input-box" placeholder="Senha">
      <div class="button-box">
        <button type="submit" class="btn btn-primary btn-entrar">Entrar</button>
        <div class="or-box">Ou</div>
        <a href="./views/auth/register.php" class="btn btn-secondary btn-cadastrar">Cadastrar</a>
      </div>
    </form>
  </div>
  </section>
</body>
</html>