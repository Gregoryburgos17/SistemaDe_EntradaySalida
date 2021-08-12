<!DOCTYPE html>
<?php
include("../conexion/conexion.php");
include("../conexion/config.php");
if(isset($_GET['del'])){
  $delete="DELETE FROM user WHERE id_usuario={$_GET['del']}";
  conexion::execute($delete);
}

?>
<!-- saved from url=(0053)https://getbootstrap.com/docs/4.0/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
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
  <style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>

  <body data-new-gr-c-s-check-loaded="14.1022.0" data-gr-ext-installed="">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <img src="ATLAS.ico" height="70" alt="ATLAS">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">Atlas Admin</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="login.php">Salir</a>
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
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  Dashboard
                </a>
              </li>

             
              <li class="nav-item">
                <a class="nav-link " href="Reporte.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                  Reportes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="personal.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                  Personal 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="personal.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                  Gerencia Gestion
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ReportHorario.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                  Reportes de horarios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tranporte.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                  Transporte
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span> Guardar reportes</span>
              <a class="d-flex align-items-center text-muted" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="imprimir.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  Imprimir
                </a>
              </li>
              
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Registro de personal</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Compartir</button>
                <button class="btn btn-sm btn-outline-secondary">Exportar</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                Calendario
              </button>
            </div>
          </div>

         
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#miModal">
            Agregar
        </button>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Usuario</th>
                  <th>Puesto</th>
                  
                 
                </tr>
              </thead>
              <tbody>
              <?php
                

                $sql= "SELECT * FROM user";
                $data= conexion::execute($sql);
                foreach($data as $dato){
                 
                  echo"<tr>
                  <td>{$dato['id_usuario']}</td>
                  <td>{$dato['nombre']}</td>
                  <td>Gerente</td>
                  
                  
                  <td>
                    <div class='d-grid gap-2 d-md-block'>
                    <a href='EditarAdmin.php?edit={$dato['id_usuario']}'class='btn btn-success' >Editar</a>
                    <a href='AdminGerente.php?del={$dato['id_usuario']}'class='btn btn-danger'>eliminar</a>
                      </div>
                  </td>
                  
                </tr>
                  ";
                }

                ?>
                
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    <?php
    if($_POST){
      extract($_POST);
        $SQL= "INSERT INTO user ( nombre,pass,	id_empleado) VALUES('{$nombre}', '{$passi}','{$id_emp}')";
        conexion::execute($SQL);
        header('Location: AdminGerente.php');
         
    }
    ?>
    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  
                  <h4 class="modal-title">Gerente</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form method="POST">
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Codigo de empleado</label>
<<<<<<< Updated upstream:admin/AdminGerente.php
                        <input type="text" class="form-control" id="recipient-name" name="id_emp">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="recipient-name" name="nombre">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Contraseña</label>
                        <input type="text" class="form-control" id="recipient-name" name="passi">
=======
                        <input type="text" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Contraseña</label>
                        <input type="text" class="form-control">
>>>>>>> Stashed changes:admin/AdminGerente.html
                      </div>
                      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancerlar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                    </form>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Dashboard Template for Bootstrap_files/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Dashboard Template for Bootstrap_files/popper.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Icons -->
    <script src="./Dashboard Template for Bootstrap_files/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    
  

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>