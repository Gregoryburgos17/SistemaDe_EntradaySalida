<?php
session_start();
include_once('conexion/conexion.php');
if (!isset($_SESSION['user'])) {
  header("Location: ./login/login.php");
}
if ($_POST) {
  extract($_POST);
  $SQL = "INSERT INTO empleados( nombre, apellido, cedula_pasaporte, huella_digital,fecha_nacimiento, pais_nacimiento,fecha_entrada,correo,telefono, direccion1, direccion2, posicion, estado) VALUES('{$nombre}', '{$apellido}','{$cedula}', '{$huella}','{$fechan}', '{$pais}','{$fechae}', '{$correo}','{$telefono}', '{$direccion1}','{$direccion2}', '{$puesto}','{$estado}')";
  conexion::execute($SQL);
  unset($_POST);
  // unset($_POST);
  $_POST = [];
  header('Location: personal.php');
}
if (isset($_GET['del'])) {
  $delete = "DELETE FROM empleados WHERE id_empleado={$_GET['del']}";
  conexion::execute($delete);
}

$data = conexion::execute("SELECT * FROM empleados");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="imgs/ATLAS.ico">


  <title>Dashboard</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

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
              <a class="nav-link active" href="personal.php">
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
                <a class="nav-link" href="usuarios.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                  </svg>
                  Registrar usuarios
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
          <h1 class="h2">Registro de empleados</h1>

        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
          Agregar
        </button>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Estado</th>

              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $dato) :
              ?>
                <tr>

                  <td><?= $dato['id_empleado'] ?></td>
                  <td><?= $dato['nombre'] ?></td>
                  <td><?= $dato['posicion'] ?></td>
                  <?php if ($dato['estado'] != 0) : ?>
                    <td class='table-success'>Activo</td>
                  <?php else : ?>
                    <td class='table-danger'>Inactivo</td>
                  <?php endif; ?>


                  <td>
                    <div class='d-grid gap-2 d-md-block'>
                      <a href='editar.php?edit=<?= $dato['id_empleado'] ?>' class='btn btn-success'>Editar</a>
                      <a href='personal.php?del=<?= $dato['id_empleado'] ?>' class='btn btn-danger'>Eliminar</a>
                    </div>
                  </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Empleados</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class='row row-cols-2' method="POST" id='editar'>

            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Cedula o pasaporte</label>
              <input type="text" class="form-control" name="cedula" required>
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Apellido</label>
              <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Fecha de nacimiento</label>
              <input type="date" class="form-control" name="fechan" required>
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Pais</label>
              <input type="text" class="form-control" name="pais" required>
            </div>
            <div class="mb-3 col-6 d-none">
              <label for="recipient-name" class="col-form-label">Huella digital</label>
              <input type="text" class="form-control" name="huella">
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Correo</label>
              <input type="text" class="form-control" name="correo">
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Telefono</label>
              <input type="text" class="form-control" name="telefono">
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Direcccion #1</label>
              <input type="text" class="form-control" name="direccion1" required>
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Direcccion #2</label>
              <input type="text" class="form-control" name="direccion2">
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Puesto</label>
              <input type="text" class="form-control" name="puesto" required>
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Estado</label>
              <select name="estado" class='custom-select'>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
            <div class="mb-3 col-6">
              <label for="recipient-name" class="col-form-label">Fecha de entrada</label>
              <input type="date" class="form-control" name="fechae" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="editar">Guardar</button>
        </div>

      </div>
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

    function checkFormValidity(e) {
      if (!e.target.checkValidity()) {
        e.preventDefault()
        e.stopPropagation()
      }
    }

    document.querySelector('#editar').addEventListener('submit', checkFormValidity);
  </script>




</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>