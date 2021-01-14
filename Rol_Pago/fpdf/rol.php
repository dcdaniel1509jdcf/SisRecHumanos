<?php
include ('../fpdf/pdf.php');
include('../../conexion.php');

 $Consulta=mysqli_query($conn,"SELECT * FROM rol_pagos");


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(70,6,'Nombre',1,0,'C',1);
$pdf->Cell(70,6,'Basico_unificado',1,0,'C',1);
$pdf->Cell(70,6,'Fondos_reserva',1,0,'C',1);

$pdf->SetFont('Arial','',10);
while ($row = $Consulta->fetch_assoc()){
	$pdf->Cell(20,6,$row['Id_trabajadores'],1,0,'C',1);
    $pdf->Cell(20,6,$row['Basico_unificado'],1,0,'C',1);
    $pdf->Cell(20,6,$row['Fondos_reserva'],1,0,'C',1);
}
$pdf->Output();
?>