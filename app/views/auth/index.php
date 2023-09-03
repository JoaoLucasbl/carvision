<!DOCTYPE html>

<html>

<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
    <div class="app">
        <form action="login.php" method="POST">
            <h2>LOGIN</h2>
            <?php if (isset($_GET['error'])) 
                { 
            ?>
                    <p class="error">
                        <?php echo $_GET['error']; ?>
                    </p>
            <?php 
                } 
            ?>
            <label>User Name</label>
            <input type="text" name="username" placeholder="Username"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br> 
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>