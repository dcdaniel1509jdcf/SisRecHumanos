<?php
include('../conexion.php');
  $Id=$_POST['Id_asignacion'];
   $Trabajo=$_POST['Tarea'];
   $Fecha=$_POST['Fecha'];
   $Cedula=$_POST['trabajador'];
   $Cantidad=$_POST['Cantidad'];  
   //insertar
   $Consulta=mysqli_query($conn," UPDATE asignacion_tarea1 SET Id_tareas='$Trabajo',Fecha='$Fecha',Id_Trabajadores='$Cedula',cantidad='$Cantidad' WHERE Id_asignacion='$Id'");
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
               <a href="asignacion.php" class="btn btn-primary">Regresar</a>
               
            </div>
         </div>
      </div>
   </body>
</html>
