<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
   $Id_Trabajadores=$_POST['Cedula'];
   $Fecha=$_POST['Fecha'];
   $Asignacion=$_POST['Asignacion'];
   $Avance=$_POST['Avance'];
   $Novedades=$_POST['Novedades'];
   $Porcentaje=$_POST['Porcentajes'];

   //insertar
   $Consulta=mysqli_query($conn,"INSERT INTO desempeno VALUES(NULL,$Id_Trabajadores,'$Fecha','$Asignacion','$Avance','$Novedades','$Porcentaje')")or die(mysqli_error($conn));

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



