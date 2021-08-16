<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ./loing/login.php");
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
      <img src="imgs/ATLAS.ico" height="70" alt="ATLAS"></a>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">Atlas</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
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
              <a class="nav-link " href="Reporte.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                  <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
                Reportes
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
            <li class="nav-item">
              <a class="nav-link active" href="tranporte.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                  <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                  <polyline points="2 17 12 22 22 17"></polyline>
                  <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                Transporte
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
       
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">transporte</h1>

        </div>


        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-primary" type="button">Agregar</button>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Ruta</th>
                <th>Ciudad destino</th>
                <th>Conductor</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>amet</td>
                <td>consectetur</td>
                <td>adipiscing</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>Integer</td>
                <td>nec</td>
                <td>odio</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>libero</td>
                <td>Sed</td>
                <td>cursus</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,004</td>
                <td>dapibus</td>
                <td>diam</td>
                <td>Sed</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,005</td>
                <td>Nulla</td>
                <td>quis</td>
                <td>sem</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,006</td>
                <td>nibh</td>
                <td>elementum</td>
                <td>imperdiet</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,007</td>
                <td>sagittis</td>
                <td>ipsum</td>
                <td>Praesent</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,008</td>
                <td>Fusce</td>
                <td>nec</td>
                <td>tellus</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,009</td>
                <td>augue</td>
                <td>semper</td>
                <td>porta</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,010</td>
                <td>massa</td>
                <td>Vestibulum</td>
                <td>lacinia</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,011</td>
                <td>eget</td>
                <td>nulla</td>
                <td>Class</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,012</td>
                <td>taciti</td>
                <td>sociosqu</td>
                <td>ad</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,013</td>
                <td>torquent</td>
                <td>per</td>
                <td>conubia</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,014</td>
                <td>per</td>
                <td>inceptos</td>
                <td>himenaeos</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>1,015</td>
                <td>sodales</td>
                <td>ligula</td>
                <td>in</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-success" type="button">Editar</button>
                    <button class="btn btn-danger" type="button">Eliminar</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
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
  </script>

  <!-- Graphs -->
  <script src="./libs/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [{
          data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false,
        }
      }
    });
  </script>


</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>