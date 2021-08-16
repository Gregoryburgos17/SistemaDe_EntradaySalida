<?php
session_start();
require_once('fpdf/fpdf.php');
if (!isset($_SESSION['user'])) {
  header("Location: ./login/login.php");
}
if(!isset($_REQUEST['fecha'])){
  header("Location: imprimir.php");
}

$date = $_REQUEST['fecha'];
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('imgs/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(60);
    $fecha = new \DateTime();
    // Title
    $this->Cell(70,10,"Entradas y Salidas del mes {$fecha->format('m')} de {$fecha->format('Y')}",0,0,'C');
    // Line break
    $this->Ln(20);
    $this->Cell(25,10,'#',1,0,'C',0);
    $this->Cell(40,10,'Fecha',1,0,'C',0);
    $this->Cell(45,10,'Hora Entrada',1,0,'C',0);
    $this->Cell(45,10,'Hora Salida',1,0,'C',0);
    $this->Cell(35,10,'# Empleado',1,1,'C',0);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().' / {nb}',0,0,'C');
}
}
include_once('conexion/conexion.php');
$data = conexion::execute("SELECT * FROM entrada_salida WHERE YEAR(fecha) = YEAR('$date') AND MONTH(fecha) = MONTH('$date')");

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
while($row=$data ->fetch_assoc()){
  $pdf->Cell(25,10,$row['id_registro'],1,0,'C',0);

  $pdf->Cell(40,10,$row['fecha'],1,0,'C',0);
  $pdf->Cell(45,10,$row['hora_entrada'],1,0,'C',0);
  $pdf->Cell(45,10,$row['hora_salida'],1,0,'C',0);
  $pdf->Cell(35,10,$row['id_empleado'],1,1,'C',0);
}
$pdf->Output();
?>