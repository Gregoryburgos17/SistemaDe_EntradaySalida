<?php
include_once("conexion/conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ./login/login.php");
}
if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
  header("Location: index.php");
}
if (!isset($_GET['edit'])) {
  header('Location: usuarios.php');
}

$sql = "SELECT * FROM user WHERE id_usuario = {$_GET['edit']}";
$rs = conexion::query_array($sql);
if (!(count($rs) > 0)) {
  header('Location: usuarios.php');
}

$usuario = $rs[0];
$sql = "SELECT * FROM empleados WHERE id_empleado = {$usuario['id_empleado']}";
$rs = conexion::query_array($sql);
if (!(count($rs) > 0)) {
  header('Location: usuarios.php');
}
$empleado = $rs[0];


$sql = "SELECT nombre FROM user WHERE id_usuario != {$_GET['edit']}";
$correos = conexion::query_array($sql);

if ($_POST) {
  extract($_POST);
  $update = "UPDATE user SET nombre='{$nombre}', pass='{$pass}', admin=$admin WHERE id_usuario='{$usuario['id_usuario']}'";
  $response = conexion::execute($update);
  if ($response) {
    header('Location: usuarios.php');
  }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="imgs/ATLAS.ico">


  <title>Atlas</title>



  <!-- Bootstrap core CSS -->
  <link href="./libs/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./libs/dashboard.css" rel="stylesheet">
</head>

<body data-new-gr-c-s-check-loaded="14.1022.0" data-gr-ext-installed="">
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a href="#" class="navbar-brand">
      <img src="imgs/ATLAS.ico" height="70" alt="ATLAS">
    </a>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">Atlas</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class='nav-link' href='./login/logout.php'>Salir</a>
      </li>
    </ul>
  </nav>
  <div></div>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link " href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Dashboard
              </a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="personal.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Empleados
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ReportHorario.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                  <line x1="18" y1="20" x2="18" y2="10"></line>
                  <line x1="12" y1="20" x2="12" y2="4"></line>
                  <line x1="6" y1="20" x2="6" y2="14"></line>
                </svg>
                Reportes de horarios
              </a>
            </li>
            <?php if ($_SESSION['admin']) : ?>
              <li class="nav-item">
                <a class="nav-link active" href="usuarios.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  Gesti??n de usuarios
                </a>
              </li>
            <?php endif; ?>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span> Guardar reportes</span>
            <a class="d-flex align-items-center text-muted" href="index.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
              </svg>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="imprimir.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Imprimir
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Editar Usuario</h1>
        </div>
        <form method='post'>
          <div class="form-row">
            <div class="form-group col-3">
              <label for="recipient-name" class="col-form-label">C??digo de empleado</label>
              <input required readonly type="text" class="form-control" name="id_em" value="<?= $usuario['id_empleado'] ?>">
            </div>
            <div class="form-group col-9">
              <label for="recipient-name" class="col-form-label">Nombre de empleado</label>
              <input required  type="text" class="form-control" readonly value="<?= $empleado['nombre'] . ' ' . $empleado['apellido'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre de usuario</label>
            <input required type="email" class="form-control" name="nombre" value="<?= $usuario['nombre'] ?>" onchange="validarNombre(this)">
            <span class="text-danger d-none">Este nombre de usuario ya esta en uso, escriba otro</span>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Contrase??a</label>
            <input required type="password" class="form-control" name="pass" value="<?= $usuario['pass'] ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Rol</label>
            <select class="custom-select" name="admin">
              <option value="0" <?= !$usuario['admin'] ? 'selected' :'' ?>>
                Gerente
              </option>
              <option value="1" <?=$usuario['admin'] ? 'selected' :'' ?>>
                Administrador
              </option>
            </select>
          </div>
          <div class="modal-footer">
            <a type="button" href='usuarios.php' class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
    </div>
  </div>
  </div>
  </main>
  </div>
  </div>

  </div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="./libs/jquery-3.2.1.slim.min.js"></script>
  <script src="./libs/popper.min.js"></script>
  <script src="./libs/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="./libs/feather.min.js"></script>
  <script>
    feather.replace()
    let usuarios = [...<?= json_encode($correos) ?>]
    function validarNombre(e) {
      console.log(e);
      let nombre_seleccionado = usuarios.filter(usuario => usuario.nombre === e.value);
      let element = $(e)
      if (nombre_seleccionado.length > 0) {
        element.val('').next().removeClass('d-none')
      } else {
        element.next().addClass('d-none')
      }
    }
  </script>




</body>


</html>