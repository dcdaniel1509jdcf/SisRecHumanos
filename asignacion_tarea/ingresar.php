<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
   $Id_Tareas=$_POST['Tarea'];
   $Id_trabajador=$_POST['trabajador'];
   $Cantidad=$_POST['Cantidad'];
  
 
   //insertar
/*Empezamos con el procedimiento de recuperación de una fila*/
/*Lo primero es crear un objeto mysqli*/
$mysqli = new mysqli("localhost", "root", "", "asosermanelun");
 
/*Y llamamos al procedimiento para recoger los datos*/
/*Si falla imprimimos el error*/

$res0 = $mysqli->query("SET @p0='$Id_trabajador';");
$res1 = $mysqli->query("SET @p2='$Id_Tareas';");
$res2 = $mysqli->query("SET @p3='$Cantidad';");
$res3 = $mysqli->query("CALL pro1(@p0, @p1, @p2, @p3);"); 
$res4 = $mysqli->query("SELECT @p1 AS mensaje;");

/*if (!($res = $mysqli->query("CALL pro1($Id_trabajador,'@mensaje',$Id_Tareas,$Cantidad)"))) {
/*    echo "Falló la llamada: (" . $mysqli->errno . ") " . $mysqli->error;
/*}
 
/*E imprimimos el resultado para ver que el ejemplo ha funcionado*/

$mensaje=$res4->fetch_assoc();
//echo 'variable'.$mensaje['mensaje'];

//$insert = "CALL sp_InsertarAsignacion(:Input_Value,@Out_val)";
//$bdd = new PDO('mysql:host=localhost;dbname=asosermanelun', 'root', '');

//$stmt = $bdd->prepare($insert);     
//$stmt->bindParam(':Input_Value', $an_input_value, PDO::PARAM_STR); 

//$stmt->execute();
//$tabResultat = $stmt->fetch();
//$Out_val = $tabResultat['Out_val'];
//var_dump($Out_val);
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
                   <h4><?php echo $mensaje['mensaje'];?></h4>   
               <a href="asignacion.php" class="btn btn-primary">Regresar</a>
               
            </div>
         </div>
      </div>
   </body>
</html>



