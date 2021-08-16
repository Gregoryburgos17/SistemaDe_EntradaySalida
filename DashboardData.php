<?php
include_once('conexion/conexion.php');
$empleados = conexion::query_array('SELECT COUNT(*) cantidad FROM empleados');
$total_empleados = $empleados[0]['cantidad'];
date_default_timezone_set('America/Santo_Domingo');

$horas_a_trabajar = 8 * $total_empleados;
$fecha = new DateTime();
$hora_actual = $fecha->format('His');
$hora_actual = $hora_actual > 170000 ? 170000 : $hora_actual;
$horas_ = conexion::query_array("SELECT (IFNULL(hora_salida, TIME({$hora_actual})) - hora_entrada) horas_trabajadas, (IFNULL(hora_salida, TIME(170000)) - hora_entrada) horas_proyectadas FROM `entrada_salida` WHERE fecha = CURRENT_DATE");

$tiempo_trabajado_en_horas = 0;
$tiempo_proyectado_en_horas = 0;
foreach ($horas_ as $hora){
    // Calculo de horas trabajadas
    $hora_trabajada = $hora['horas_trabajadas'];
    for($i = 0; strlen($hora_trabajada) < 6; $hora_trabajada = '0'.$hora_trabajada);
    $horas = substr($hora_trabajada,0,2);
    $minutos = substr($hora_trabajada,2,2);
    $segundos = substr($hora_trabajada,4,2);
    $tiempo_trabajado_en_horas += $horas + ($minutos / 60) + ($segundos / 3600);
    
    // Calculo de tiempo proyectado
    $hora_proyectada = $hora['horas_proyectadas'];
    for($i = 0; strlen($hora_proyectada) < 6; $hora_proyectada = '0'.$hora_proyectada);
    $horas = substr($hora_proyectada,0,2);
    $minutos = substr($hora_proyectada,2,2);
    $segundos = substr($hora_proyectada,4,2);
    $tiempo_proyectado_en_horas += $horas + ($minutos / 60) + ($segundos / 3600);
}

// echo json_encode(['a_trabajar'=>$horas_a_trabajar, 'trabajadas' => $tiempo_trabajado_en_horas]);
?>
