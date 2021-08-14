<!DOCTYPE html>
<!-- saved from url=(0051)https://getbootstrap.com/docs/4.0/examples/sign-in/ -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="ATLAS.ico">

  <title>Signin</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="./Signin Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./Signin Template for Bootstrap_files/signin.css" rel="stylesheet">
</head>

<body class="text-center" data-new-gr-c-s-check-loaded="14.1022.0" data-gr-ext-installed="">
  <?php
  include_once('../conexion/conexion.php');
  session_start();
  $failToLoggin = false;
  if ($_POST) {

    extract($_POST);
    $sql = "SELECT * FROM `user` WHERE nombre = '{$username}' and pass = '{$pasoclave}'";
    $rs = conexion::execute($sql);
    $cont = mysqli_num_rows($rs);

    $fila = $rs->fetch_row();

    if ($cont != 0) {
      $_SESSION['user'] = $fila[1];
    } else {
      $failToLoggin = true;
    }
  }
  if (isset($_SESSION['user'])) {
    header("Location: ../index.php");
  }
  ?>


  <form class="form-signin" action="" method="post">
    <img class="mb-4" src="../ATLAS.ico" alt="" width="180" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Indetificarse</h1>
    <?php if ($failToLoggin) : ?>
      <div class="text-left py-2">
        <span class='text-danger'>Usuario o contraseña incorrectos</span>
      </div>
    <?php endif; ?>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" class="form-control" placeholder="Email address" required="" autofocus="" name="username">
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" class="form-control" placeholder="Password" required="" name="pasoclave">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Recordar
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Iniciar sesion</button>
    <p class="mt-5 mb-3 text-muted">© Derechos reservados - 2021</p>

  </form>



</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>