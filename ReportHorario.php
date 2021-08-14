<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ./login/login.php");
}

include_once 'conexion/conexion.php';
$sql = "SELECT * FROM entrada_salida ES INNER JOIN empleados E ON ES.id_empleado = E.id_empleado";
$data = conexion::execute($sql);
$result = conexion::execute("SELECT * FROM empleados");
$empleados = [];
foreach ($result as $emp) {
  $empleados[$emp['id_empleado']] = $emp;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="ATLAS.ico">

  <title>Dashboard</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="./Dashboard Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./Dashboard Template for Bootstrap_files/dashboard.css" rel="stylesheet">

</head>

<body data-new-gr-c-s-check-loaded="14.1022.0" data-gr-ext-installed="">
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a href="#" class="navbar-brand">
      <img src="ATLAS.ico" height="70" alt="ATLAS"></a>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">Atlas</a>
    <input class="form-control form-control-dark w-100" type="text" id='busqueda' placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class='nav-link' href='./login/logout.php'>Salir</a>
      </li>
    </ul>
  </nav>

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
              <a class="nav-link active" href="ReportHorario.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                  <line x1="18" y1="20" x2="18" y2="10"></line>
                  <line x1="12" y1="20" x2="12" y2="4"></line>
                  <line x1="6" y1="20" x2="6" y2="14"></line>
                </svg>
                Reportes de horarios
              </a>
            </li>

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
        <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
          <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
          </div>
          <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
          </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Reportes de horario</h1>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $dato) :
                $fecha = new DateTime($dato['fecha']);
                $empleado = $empleados[$dato['id_empleado']];
              ?>
                <tr>
                  <td><?= $dato['id_empleado'] ?></td>
                  <td class='nombre_empleado'><?= $empleado['nombre'] . ' ' . $empleado['apellido'] ?></td>
                  <td><?= $fecha->format('d/m/Y') ?></td>
                  <td><?= $dato['hora_entrada'] ?></td>
                  <td><?= isset($dato['hora_salida']) ? $dato['hora_salida'] : ' - ' ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="./Dashboard Template for Bootstrap_files/jquery-3.2.1.slim.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="./Dashboard Template for Bootstrap_files/popper.min.js"></script>
  <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="./Dashboard Template for Bootstrap_files/feather.min.js"></script>
  <script>
    feather.replace()
    let empleados = Array.from($('.nombre_empleado'))
    $('#busqueda').keyup((e) => {
      $(empleados).closest('tr').addClass('d-none')
      let _toShow = empleados.filter((emp)=> emp.innerText.toLocaleLowerCase().includes(e.target.value.toLocaleLowerCase()))
      $(_toShow).closest('tr').removeClass('d-none')
    })
  </script>




</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>