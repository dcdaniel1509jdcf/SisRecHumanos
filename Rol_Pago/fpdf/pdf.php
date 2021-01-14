<?php
require '../fpdf/fpdf.php';
 class PDF extends FPDF
 { 
 // Cabacera
   function Header(){
   $this->Image('../../img/Asosermanelun.jpg',5,5,30);
   $this->SetFont('Arial','B',15);
   $this->Cell(30);
   $this->Cell(120,10,'REPORTE DE ROL DE PAGO',0,0,'C');

   $this->Ln(20);

   }
   //pie de pagina
   function Footer(){
   //tamaño 
   $this->SetY(-15);
   $this->SetFont('Arial','I',8);
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
 }
?>