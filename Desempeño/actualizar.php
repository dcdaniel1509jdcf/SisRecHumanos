<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
   $id = $_POST['Id_desempeno'];
   $Id_Trabajadores=$_POST['CedulaN'];
   $Fecha=['Fecha'];
   $Asignacion=$_POST['Asignacion2'];
   $Avance=$_POST['Avance'];
   $Novedades=$_POST['Novedades'];
   $Porcentaje=$_POST['Porcentajes'];                             
   //insertar

   $TotalNovedades=round(($Asignacion - $Avance),2);
  $TotalPorcentajes =round( ($Avance *100/ $Asignacion),2);
   $Consulta=mysqli_query($conn," UPDATE desempeno SET Avance='$Avance',Novedades='$TotalNovedades',Porcentaje='$TotalPorcentajes' WHERE Id_desempeno='$id'")or die(mysqli_error($conn));
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
               <a href="desempeño.php" class="btn btn-primary">Regresar</a>
               
            </div>
         </div>
      </div>
   </body>
</html>



