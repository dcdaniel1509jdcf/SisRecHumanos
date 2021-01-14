<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
$Id_desempeno=$_GET['id'];
$sentencia=mysqli_query($conn,"SELECT * FROM desempeno WHERE Id_desempeno ='$Id_desempeno'");
$datos= mysqli_fetch_array ($sentencia);
   $Id=$datos['Id_desempeno'];
   $Cedula=$datos['Id_Trabajadores'];
   $Fecha=$datos['Fecha'];
    $Asignacion=$datos['Id_asignacion'];
$Avance=$datos['Avance'];
   $Novedades=$datos['Novedades'];
   $Porcentaje=$datos['Porcentaje'];
$res=mysqli_query($conn,"SELECT Cedula FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN=$filas1['Cedula'];
   $res1=mysqli_query($conn,"SELECT cantidad FROM asignacion_tarea1 WHERE Id_asignacion='$Asignacion'");
 $filas2=mysqli_fetch_array($res1);
 $Asignacion2=$filas2['cantidad'];
?>
<!doctype html>
<html lang="es">
<head>
  <mete name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <scrip src="js/jquery-3.5.1.min.js"></scrip>
      <scrip src="js/bootstrap.min.js"></scrip>
  </head>

<body>
  <div class="container">
      <div class="row">
    <title>Registro de Trabajadores</title>
    <p><center>Ingreso de los datos</center></p>
    </div>  
    <form class="form-horizontal" method="POST" action="actualizar.php" 
      enctype="multipart/form-data"autocomplete="off">
      <div class="form-group">
  <label for="Id_desempeno" class="col-sm-2 control-label">Id:</label>
          <div class="col-sm-10">
<input type="text" class="form-control" id="Id_desempeno"  name="Id_desempeno" placeholder="" value="<?php echo $Id_desempeno;?>">
</div>
</div>
<div class="form-group">
 <label for="Cedula" class="col-sm-2 control-label">Ingrese la cedula:</label>
          <div class="col-sm-10">

<input type="text" class="form-control" id="CedulaN"  name="CedulaN" value="<?php echo $CedulaN;?>"  >

</div>
</div>
<div class="col-sm-10">
<div class="form-group">
<label for="Entrada" class="col-sm-2 control-label">Fecha:</label>
<div class="col-sm-10">
<input type="date" class="form-control" id="Fecha" name="Fecha" value="<?php echo date("Y-m-d")?>">
</div>
</div>
<div class="form-group">
<label for="Asignacion" class="col-sm-2 control-label">Asignacion:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Asignacion2" name="Asignacion2" value="<?php echo $Asignacion2;?>">
</div>
</div>
<div class="form-group">
<label for="Avance" class="col-sm-2 control-label">Avance:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Avance" name="Avance" value="<?php echo $Avance;?>" placeholder="ingrese el avance">
</div>
</div>
<div class="form-group">
 <label for="Novedades" class="col-sm-2 control-label">Novedades:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Novedades" name="Novedades" value="<?php echo $Novedades;?>" placeholder="ingrese las novedades"> 
</div>
</div> 
<div class="form-group">
 <label for="Porcentaje" class="col-sm-2 control-label">Porcentaje:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Porcentajes" name="Porcentajes" value="<?php echo $Porcentaje;?>"> 
</div>
</div>
  <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a href="desempeño.php" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-primary">Guardar</button> 
          </div>
        </div>
      </form>
       <button class="btn btn-danger" onclick="calcularPorcentaje()">Calcular Porcentaje</button>
    </div>
                                   
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  

<script>
        function calcularPorcentaje(){
           
            var Asignaciones =parseFloat($("#Asignacion2").val());
             var Avances =parseFloat($("#Avance").val());
            var TotalNovedades = (Asignaciones-Avances);
            
            var TotalPorcentajes = (Avances *100/ Asignaciones);
            $("#Novedades").val(TotalNovedades);
            $("#Porcentajes").val(TotalPorcentajes);
           
            
        }
    </script> 
  </body>
</html>
