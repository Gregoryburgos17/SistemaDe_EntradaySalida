<?php
require_once 'conexion/config.php';
require_once 'conexion/conexion.php';
date_default_timezone_set('America/Santo_Domingo');
$fecha = new DateTime();
$query = <<<INPUT
SELECT * FROM entrada_salida WHERE fecha = '{$fecha->format('Y-m-d')}' AND hora_salida IS NULL;
INPUT;
$response = conexion::query_array($query);
    echo json_encode(['respuesta'=>$response]);
