<?php
require_once 'conexion/conexion.php';

date_default_timezone_set('America/Santo_Domingo');
$data = json_decode(file_get_contents('php://input'), true);
$_POST = $data;
if(!isset($_POST['id'])){
    echo json_encode(['mensaje'=>'Acceso denegado', 'code'=> 400]);
}

/*****************************
 * Validar que no se haya registrado la entrada ya
 */
$fecha = new DateTime();

 $query =<<<INPUT
 SELECT * FROM entrada_salida WHERE id_empleado = '{$_POST['id']}' AND fecha = '{$fecha->format('Y-m-d')}' AND hora_salida IS NULL;
 INPUT;

 $result = conexion::query_array($query);
if(count($result) > 0){

    $query = <<<INPUT
    UPDATE entrada_salida SET hora_salida = '{$fecha->format('h:i')}'
    WHERE id_registro = '{$result[0]['id_registro']}'
    INPUT;
    $response = conexion::execute($query);
    if($response){
        echo json_encode(['mensaje'=>'Salida Registrada con Exito', 'code'=> 200]);
    }
    return;
}

$query = <<<INPUT
INSERT INTO entrada_salida VALUES(NULL, '{$fecha->format('Y-m-d')}', '{$fecha->format('h:i')}', NULL,'{$_POST['id']}');
INPUT;
$response = conexion::execute($query);
if($response){
    echo json_encode(['mensaje'=>'Entrada Registrada con Exito', 'code'=> 200]);
}
?>
