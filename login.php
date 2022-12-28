<?php
require 'database.php';
?>

<?php
session_start();


if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE email = '$email'";
  $login = mysqli_query($conn, $sql);

  $user = mysqli_fetch_assoc($login);


  $message = '';

  if ($user && password_verify($password, $user['password'])) {
    if (count($user) > 0) {
      $_SESSION['id'] = $user;
      header('Location: index.php');
    }
  } else {
    $message = "email or password incorrect";
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
      <h2>Log in</h2>
      <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
      <?php endif; ?>
      <form action="login.php" method="post">
        <div class="user-box">
          <input type="text" name="email" required="" autocomplete="off" />
          <label for="email">Email</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required="" />
          <label for="passwd">Password</label>
        </div>

        <input class="btn" type="submit" value="Enviar" />
      </form>
      <div class="other">
        <a href="#" class="modal">Forgot Password</a>
        <!-- <a href="#sign" id="openModel" class="sign">Sign Up</a> -->
        <a href="./signup.php">Sign Up</a>
      </div>
    </div>
  </div>
</body>

</html>