<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
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
    <title>INGRESO HORAS</title>
    <p><center>INGRESO HORAS</center></p>
    </div>  
    <form class="form-horizontal" method="POST" action="ingresar fecha y hora.php" 
      enctype="multipart/form-data"autocomplete="off">
<div class="form-group">
          <label for="Cedula" class="col-sm-2 control-label">Ingrese el nombre:</label>
          <div class="col-sm-10">
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
<label for="Salida" class="col-sm-2 control-label">Salida:</label>
<div class="col-sm-10">
<input type="date" class="form-control" id="F_Salida" name="F_Salida" value="<?php echo date("Y-m-d")?>">
</div>
</div>
<div class="col-sm-10">
<div class="form-group">
<label for="Entrada" class="col-sm-2 control-label">Descripcion:</label>
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
