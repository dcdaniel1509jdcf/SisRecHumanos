<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
$Id_Registro=$_GET['id'];
$sentencia=mysqli_query($conn,"SELECT * FROM registro_trabajadores WHERE Id_registro ='$Id_Registro'");
$datos= mysqli_fetch_array ($sentencia);
   $Id=$datos['Id_registro'];
   $Cedula=$datos['Id_trabajadores'];
   $F_Entrada=$datos['Fecha_Ingreso'];
   $F_Salida=$datos['Fecha_Salida'];
   $Descripcion=$datos['Descripcion'];
  $res=mysqli_query($conn,"SELECT Pr_nombre FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN=$filas1['Pr_nombre'];
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
    <title>REGISTRO DE HORAS</title>
    <p><center>INGRESO DE HORAS</center></p>
    </div>  
    <form class="form-horizontal" method="POST" action="actualizar.php" 
      enctype="multipart/form-data"autocomplete="off">
      <div class="form-group">
  <label for="Id_desempeno" class="col-sm-2 control-label">Id:</label>
          <div class="col-sm-10">
<input type="text" class="form-control" id="Id_Registro"  name="Id_Registro" placeholder="" value="<?php echo $Id_Registro;?>">
</div>
</div>
<div class="form-group">
 <label for="Cedula" class="col-sm-2 control-label">Ingrese la cedula:</label>
          <div class="col-sm-10">

<input type="text" class="form-control" id="Cedula1"  name="Cedula1" value="<?php echo $CedulaN;?>" placeholder="ingrese su cedula" disabled >
<select class="form-control" id="Cedula" name="Cedula">
        <option value="0">Seleccione:</option>
        <?php
// Realizamos la consulta para extraer los datos
          $query = mysqli_query($conn,"SELECT * FROM trabajadores");
          while ($valores = mysqli_fetch_array($query)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
            echo '<option value="'.$valores['Id_Trabajadores'].'">'.$valores['Pr_nombre'].'</option>';
          }
          ?>
           </select>
</div>
</div>
<div class="col-sm-10">
<div class="form-group">
<label for="Entrada" class="col-sm-2 control-label">Entrada:</label>
<div class="col-sm-10">
<input type="date" class="form-control" id="F_Entrada" name="F_Entrada" value="<?php echo date("Y-m-d")?>">
</div>
</div>
<div class="form-group">
  <div class="col-sm-10">
 <label for="Salida" class="col-sm-2 control-label">Salida:</label>
<input type="date" class="form-control" id="F_Salida" name="F_Salida" value="<?php echo date("Y-m-d")?>">
</div>
</div> 
<div class="col-sm-10">
<div class="form-group">
<label for="Entrada" class="col-sm-2 control-label">Descripcion:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="ingrese la Descripcion">
</div>
</div>
  <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a href="registrohoras.php" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-primary">Guardar</button> 
          </div>
        </div>
      </form>
    </div>
                                   
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
  </body>
</html>
