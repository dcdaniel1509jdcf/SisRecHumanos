<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
  $id = $_POST['Id_Registro'];
  $Id_Trabajadores=$_POST['Cedula'];
  $F_Entrada=$_POST['F_Entrada'];
  $F_Salida=$_POST['F_Salida'];
  $Descripcion=$_POST['Descripcion'];
                                
   //Modificar
   $Consulta=mysqli_query($conn," UPDATE registro_trabajadores SET Id_trabajadores='$Id_Trabajadores',Fecha_Ingreso='$F_Entrada',Fecha_Salida='$F_Salida' ,Descripcion='$Descripcion'   WHERE Id_registro='$id'");
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
               <a href="registrohoras.php" class="btn btn-primary">Regresar</a>
               
            </div>
         </div>
      </div>
   </body>
</html>



