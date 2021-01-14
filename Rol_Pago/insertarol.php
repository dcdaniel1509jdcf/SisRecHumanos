<?php
include('../conexion.php');
  $IdTrabajador=$_POST['Id_trabajador'];
   $Basico_Unificado=$_POST['Basico_Unificado'];
   $H_extras=$_POST['H_extras'];
   $Registrar=$_POST['Retroactivo'];
   $Bono=$_POST['Bono'];
   $Otros_ingresos=$_POST['Otro_ingresos'];
   $Fondo_reserva=$_POST['Fondo_reserva'];
   $Devoluciones=$_POST['Devoluciones'];
   $Aporte_IESS=$_POST['Aporte_IESS'];
   $Impuesto_renta=$_POST['Impuesto_renta'];
   $Prestamo_hipotecario=$_POST['Prestamo_hipotecario'];
   $Prestamo_Quirografarios=$_POST['Prestamo_Quirografarios'];
   $Prestamo_Empresa=$_POST['Prestamo_Empresa'];
   $Multas=$_POST['Multas'];
   $Seguro_Medico=$_POST['Seguro_Medico'];
   $Anticipos=$_POST['Anticipos'];
   $Otro_Descuento=$_POST['Otros_descuentos'];
   $Total_Ingreso = $_POST['Total_ingreso'];
   $Total_deducciones = $_POST['Total_deducciones'];
   $Neto_recibir = $_POST['Neto_recibir'];
   //insertar
$Consulta=mysqli_query($conn,"INSERT INTO rol_pagos VALUES(NULL,'$IdTrabajador','$Basico_Unificado','$H_extras','$Registrar','$Bono','$Otros_ingresos','$Fondo_reserva','$Devoluciones','$Aporte_IESS','$Impuesto_renta','$Prestamo_hipotecario','$Prestamo_Quirografarios','$Prestamo_Empresa','$Multas','$Seguro_Medico','$Anticipos','$Otro_Descuento','$Total_Ingreso','$Total_deducciones','$Neto_recibir')");
?> 
<html lang="es">
   <head>      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.css" rel="stylesheet">
      <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>  
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="row" style="text-align:center">
               <?php if($Consulta) { ?>
                  <h3>REGISTRO GUARDADO</h3>
                  <?php } else { ?>
                  <h3>ERROR AL GUARDAR</h3>
               <?php } ?>        
               <a href="Rol.php" class="btn btn-primary">Regresar</a>
               
            </div>
         </div>
      </div>
   </body>
</html>



