<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
session_start();
if (!isset($_SESSION['paramTarea']) and !isset($_SESSION['pers'])  and !isset($_SESSION['fecha']) )
{
  $_SESSION['paramTarea']='';
  $_SESSION['pers']='';
  $_SESSION['fecha']='';
}
if (empty($TotalNovedades) and empty($TotalPorcentajes)){
  $TotalNovedades=0;
  $TotalPorcentajes=0;
}

?> 

<!doctype html>
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
          <title>Ingreso de avance de trabajo</title>
          <p><center>Ingreso de avance de trabajo</center></p>
      </div>  
    <form class="form-horizontal" method="POST" action="<?php echo ($_SERVER['PHP_SELF']); ?>" >
      <div class="form-group">
            <label for="Cedula" class="col-sm-2 control-label">Ingrese la cedula:</label>
            <div class="col-sm-10">
                <select class="form-control" id="Cedula" name="Cedula">
                <option value="0">Seleccione:</option>
                  <?php
          // Realizamos la consulta para extraer los datos
                    $query = mysqli_query($conn,"SELECT * FROM trabajadores");
                    while ($valores = mysqli_fetch_array($query)) {
          // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valores['Id_Trabajadores'].'">'.$valores['Cedula'].' - '.$valores['Pr_nombre'].' '.$valores['Ap_Paterno'].'</option>';
                    }
                    ?>
                </select><br>            
            </div>
      </div>
        <div class="form-group">
        <label for="Entrada" class="col-sm-2 control-label">Fecha:</label>
            <div class='col-sm-10 row'>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="Fecha" name="Fecha">
              </div>
              <div class="col-sm-2">
                  <input type="submit" name="Buscar" value=">" class="btn btn-primary">  
              </div>
           </div>
        </div>
    </form>
<?php
  if (isset($_POST['Buscar']) and !empty($_POST['Fecha']) and !empty($_POST['Cedula'])) {
      $fecha=$_POST['Fecha'];
      $per=$_POST['Cedula'];
      $_SESSION['pers']=$per;
      $_SESSION['fecha']=$fecha;
      $query2 = mysqli_query($conn, "SELECT asignacion_tarea1.Id_asignacion,tareas.Tareas,asignacion_tarea1.Fecha,cantidad From asignacion_tarea1, tareas WHERE asignacion_tarea1.Id_tareas=tareas.Id_tareas AND Id_Trabajadores= $per AND Fecha='$fecha'"); ?>
  <form class="form-horizontal" method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>" >
   <div class="form-group">
          <label for="Entrada" class="col-sm-2 control-label">Fecha:</label>
          <div class='row col-sm-10 '>
            <select class="col-sm-8 form-control" id="pTarea" name="pTarea">
                <option value="0">Seleccione:</option>
                  <?php
                    while ($valores1 = mysqli_fetch_array($query2)) {
                        echo '<option value="'.$valores1[0].'">'.$valores1[2].' '  .$valores1[1].'</option>';
                    } ?>
            </select>
 
          <input type="submit" name="cargar" value=">" class="btn btn-primary">  
          </div>        
    </div>
   </form>     
   <?php
  }
 if (isset($_POST['cargar']) and !empty($_POST['pTarea'])) {
  $asignacion=$_POST['pTarea'];
  $_SESSION['paramTarea']=$asignacion;
  $query3 = mysqli_query($conn,"SELECT * FROM asignacion_tarea1 WHERE Id_asignacion= $asignacion");
  while ($valores1 = mysqli_fetch_array($query3)) {
?>
  <form class="form-horizontal" method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>" >

    <div class="form-group">
        <label for="Asignacion" class="col-sm-2 control-label">Asignacion:</label>
          <div class="col-sm-10">
            <input readonly type="text" class="form-control" id="Asignacion" name="Asignacion" value='<?php echo $valores1['cantidad']; ?>'>       
          </div>
      </div> 
  <?php
  } 
?>

<div class="form-group">
<label for="Avance" class="col-sm-2 control-label">Avance:</label>
            <div class='col-sm-10 row'>
              <div class="col-sm-10">
              <input  type="text" class="form-control" id="Avance" name="Avance" placeholder="ingrese el avance">
              </div>
              <div class="col-sm-2">
              <input type="submit" name="asign" value=">" class="btn btn-primary"> 
              </div>
           </div>
        </div>

  </from>

  <?php
}  
if (isset($_POST['asign']) and !empty($_POST['Avance'])) {
    $asicantidad=$_POST['Asignacion'];
    $avance=$_POST['Avance'];
   // echo $_SESSION['paramTarea'].'dc'.'cantidad'.$asicantidad.'avance'.$_POST['Avance'].'per'.$_SESSION['pers'];
  $TotalNovedades=round( ($asicantidad - $avance),2);
  $TotalPorcentajes =round( ($avance *100/ $asicantidad),2);
           
  }
?>

  <div class="form-group">
    <label for="Novedades" class="col-sm-2 control-label">Novedades:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="Novedades" name="Novedades" value="<?php echo $TotalNovedades?>"> 
    </div>
  </div> 
  <label for="Porcentajes" class="col-sm-2 control-label">Porcentajes:</label>
  <div class="col-sm-10">
    <input  type="text" class="form-control" id="Porcentajes" name="Porcentajes" value="<?php echo $TotalPorcentajes?>"> 
  </div>
  </div> 
  <a href="insertar1.php?avance='<?php echo $avance;?>'&novedad='<?php echo $TotalNovedades;?>'&porcentaje='<?php echo $TotalPorcentajes;?>' " class='btn btn-primary'> Guardar</a> 
  

  </div>      
</body>
</html>