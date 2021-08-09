<?php
require_once 'conexion/config.php';
require_once 'conexion/conexion.php';
$query = <<<INPUT
SELECT * FROM empleados;
INPUT;
$response = conexion::query_array($query);
echo json_encode(['respuesta'=>$response]);
?>