<?php
require 'database.php';
?>

<?php
$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {

  // variables
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeatPassword = $_POST['password-repeat'];

   if ($password == $repeatPassword) {
     
    // Ciframos la contraseña
    $passwordCrypt = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

    // Consulta para insertar los usuarios
    $sql = "INSERT INTO user VALUES(null, '$name', '$email', '$passwordCrypt')";

    // guardamos en la base de datos
    $query = mysqli_query($conn, $sql);

    // Si la consulta ha tenido éxito mostramos el mensaje, en caso contrario se muestra el error
    if ($query) {
      $message = 'create new user';
    } else {
      $message = 'Failed create user';
    }
  }else{
    $message = 'passwords do not match';
  }
  
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login with PHP</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="container">
    <div class="login">
      <h2>sign up</h2>
      <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
      <?php endif; ?>
      <form method="post" action="signup.php">
        <div class="user-box">
          <input type="text" name="name" required="" autocomplete="off" />
          <label for="name">Name</label>
        </div>
        <div class="user-box">
          <input type="text" name="email" required="" autocomplete="off" />
          <label for="email">Email</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required="" />
          <label for="passwd">Password</label>
        </div>
        <div class="user-box">
          <input type="password" name="password-repeat" required="" />
          <label for="passwd">Repeat Password</label>
        </div>
        <input class="btn" type="submit" value="Enviar" />
      </form>
      <div class="other">
        <a href="./login.php">Already have an account? Login</a>
      </div>
    </div>
  </div>
</body>

</html>