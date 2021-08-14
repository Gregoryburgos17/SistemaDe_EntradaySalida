<?php
include_once('../conexion/conexion.php');



if($_POST){
  session_start();
  extract($_POST);

  $sql = "SELECT * FROM `user` WHERE nombre = '{$username}' and pass = '{$pass}'";
  $rs = conexion::execute($sql);
  $cont = mysqli_num_rows($rs);

  $fila = $rs->fetch_row();

  if($cont != 0){
      $_SESSION['usuario'] = $fila[5];
  }
  
  if(isset($_SESSION['usuario'])){
      header("Location: ../index.php");
  }
}
?>