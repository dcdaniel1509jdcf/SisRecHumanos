<?php
include ('../fpdf/fpdf.php');
include('../fpdf/conex.php');
$id_trabajador = $_POST['Id_trabajador'];
 class PDF extends FPDF
 { 
 // Cabacera
   function Header(){
   $this->Image('../../img/Asosermanelun.jpg',10,-1,50);
   $this->SetFont('Arial','B',13);
   $this->Cell(100);
   $this->Cell(70,10,'ROL GENERAL',1,0,'C');

   $this->Ln(20);

   }
   //pie de pagina
   function Footer(){
   //tamaño 
   $this->SetY(-10);
   $this->SetMargins(0, 0, 0);
    $this->SetFont('Arial','B',12);
   $this->SetX(100);
   $this->Write(-100,'Firma Autorizada:','C');
   $this->SetFont('Arial','B',12);
   $this->SetX(200);
   $this->Write(-100,'Firma del Representante EEQ :','C');
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
 }
$db = new dbObj();
 $connString = $db->getConnstring();
 $display_heading= array('Id_rol'=>'ID','Id_trabajadores'=>'Nombre','Basico_unificado'=>'Sueldo','H_extras'=>'H.Extras','Decimos'=>'Decimos','Bonos'=>'Bonos','Otro_ingresos'=>'O.Ingresos','Fondos_reserva'=>'F.Reserva','Devoluciones'=>'Devol','Aportes_iess'=>'IESS','Impuestos_renta'=>'Vacaciones','Prestamo_hipotecario'=>'Pr.Hipo','Prestamo_Quirografarios'=>'Pr.Quiro','Prestamo_Empresa'=>'Pr.Empresa','Multas'=>'Multas','Seguro_medico'=>'S.medico','Anticipos'=>'Anticipos','Otros_descuentos'=>'Desc','Total_ingreso'=>'Ingresos','Total_deducciones'=>'Deduc','Neto_recibir'=>'Neto',);
 $result = mysqli_query($connString,"Select 
 rp.Id_rol, 
 t.Pr_nombre, 
 rp.Basico_unificado,
 rp.H_extras ,
 rp.Decimos,
 rp.Bonos,
 rp.Otro_ingresos,
 rp.Fondos_reserva,
 rp.Devoluciones,
 rp.Aportes_iess,
 rp.Impuestos_renta,
rp.Prestamo_hipotecario,
rp.Prestamo_Quirografarios,
rp.Prestamo_Empresa,
rp.Multas,
rp.Seguro_medico,
rp.Anticipos,
rp.Otros_descuentos,
rp.Total_ingreso,
rp.Total_deducciones,
rp.Neto_recibir  
FROM rol_pagos rp 
INNER JOIN trabajadores t
ON rp.id_Trabajadores = t.id_Trabajadores WHERE t.Id_trabajadores = rp.id_Trabajadores AND t.Id_trabajadores = $id_trabajador") or die("database error:". mysqli_error($connString));
 $header= mysqli_query($connString,"SHOW columns FROM rol_pagos");
 $pdf = new PDF();
 //CABEZERA
 $pdf->AddPage('L','A4');
 //pie de pagina
 $pdf->AliasNbPages();
$pdf->Cell(40,10,date('d/m/Y'),0,1,'L');
 $pdf->SetFont('Arial','B',6);
 foreach($header as $heading){
$pdf->Cell(13,10,$display_heading[$heading['Field']],1);
 }

$pdf->SetFont('Arial','B',8);
$pdf->Cell(12,10,'Firma',1);
foreach ($result as $row) {
$pdf->Ln();
foreach ($row as $column) 
$pdf->Cell(13,10,$column,1);
$pdf->Cell(12,10,'',1);
}

$pdf->Output();
?>