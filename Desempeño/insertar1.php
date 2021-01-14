<?php
include('../conexion.php');
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('America/Guayaquil');
session_start();
$Fecha= $_SESSION['fecha'];
$Id_Trabajadores= $_SESSION['pers'];
$Asignacion= $_SESSION['paramTarea'];
$Avance= $_GET["avance"]; 
$Novedades= $_GET["novedad"];
$Porcentaje= $_GET["porcentaje"];

$Consulta=mysqli_query($conn,"INSERT INTO desempeno VALUES(NULL,$Id_Trabajadores,'$Fecha','$Asignacion',$Avance,$Novedades,$Porcentaje)")or die(mysqli_error($conn));


?> 

<!doctype html>
<html lang="es">
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </head>

<body>
  <div class="container">
      <div class="row">
    <title>Ingreso de avance de trabajo</title>
  
  
            <div class="row" style="text-align:center">
               <?php if($Consulta) { ?>
                  <h3>REGISTRO GUARDADO</h3>
                  <?php
                  session_destroy(); 
                  $aumento=1;
                $conn->set_charset("utf8");
                $Consulta=mysqli_query($conn," UPDATE asignacion_tarea1 SET Desempeño=$aumento WHERE Id_asignacion=$Asignacion ")or die(mysqli_error($conn));
                } else { ?>
                  <h3>ERROR AL GUARDAR</h3>
               <?php } ?>        
               <a href="desempeño.php" class="btn btn-primary">Regresar</a>
               
            </div>
         </div>
      

    </div>
  </body>
</html>
