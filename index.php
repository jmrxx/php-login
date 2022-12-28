<?php
require 'database.php';
?>

<?php
    session_start();
    
    if(isset($_SESSION['id']['email'])){
        $email = $_SESSION['id']['email'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login php</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <div class="box">
    <?php if(isset($_SESSION['id'])) : ?>
        <div class="">Bienvenido <?= $_SESSION['id']['name'] ?>
        <a href="logout.php">logout</a>
        </div>
    <?php endif; ?>
     
    <h1>LOGIN  or SIGNUP</h1>
    <div class="en">
    <a class="sign btn" href="login.php">Login</a> or
    <a class="sign btn" href="signup.php">Signup</a>
    </div>
    </div>  
</div>
</body>
</html>