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
    <title>Ingreso de asignaciones_tareas</title>
    <p><center>Ingreso de asignacion de tareas</center></p>
    </div>  
    <form class="form-horizontal" method="POST" action="ingresar.php" 
      enctype="multipart/form-data"autocomplete="off">
<div class="form-group">
<label for="Tarea" class="col-sm-2 control-label">Tarea:</label>
<div class="col-sm-10">
<select class="form-control" id="Tarea" name="Tarea">
        <option value="0">Seleccione:</option>
        <?php
// Realizamos la consulta para extraer los datos
          $query = mysqli_query($conn,"SELECT * FROM tareas");
          while ($valores = mysqli_fetch_array($query)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
            echo '<option value="'.$valores['Id_tareas'].'">'.$valores['Tareas'].'</option>';
          }
        ?>
      </select>
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
          <label for="trabajador" class="col-sm-2 control-label">Nombre:</label>
<div class="col-sm-10">
<select class="form-control" id="trabajador" name="trabajador">
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
<div class="form-group">
 <label for="Cantidad" class="col-sm-2 control-label">Cantidad:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Cantidad" name="Cantidad" placeholder="ingrese la cantidad"> 
</div>
</div>    
  <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a href="asignacion.php" class="btn btn-primary">Regresar</a>
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
