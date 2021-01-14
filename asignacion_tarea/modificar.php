<?php
include('../conexion.php');
date_default_timezone_set('America/Guayaquil');
$Id_asignacion=$_GET['id'];
$sentencia=mysqli_query($conn,"SELECT * FROM asignacion_tarea1 WHERE Id_asignacion ='$Id_asignacion'");
$datos= mysqli_fetch_array ($sentencia);
$Id=$datos['Id_asignacion'];
$Fecha=$datos['Fecha'];
$Trabajo=$datos['Id_tareas'];
$Cedula=$datos['Id_Trabajadores'];
$Cantidad=$datos['cantidad'];
$Desempeño=$datos['Desempeño'];
//Para poder llamar a la variable en vez del id
$res=mysqli_query($conn,"SELECT Id_Trabajadores,Pr_nombre FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN=$filas1['Pr_nombre'];
 $res1=mysqli_query($conn,"SELECT * FROM tareas WHERE Id_tareas='$Trabajo'");
 $filas2=mysqli_fetch_array($res1);
 $Tarea1=$filas2['Tareas'];
 $IdTarea=$filas2['Id_tareas'];
 $Idtrabajador=$filas1['Id_Trabajadores'];
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
    <title>INGRESO DE TAREAS</title>
    <p><center>Ingreso DE TAREAS</center></p>
    </div>  
    <form class="form-horizontal" method="POST" action="actualizar.php" 
      enctype="multipart/form-data"autocomplete="off">
      <div class="form-group">
  <label for="Id_asignacion" class="col-sm-2 control-label">Id:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Id_asignacion"  name="Id_asignacion" placeholder="" value="<?php echo $Id_asignacion;?>">
</div>
</div>
<div class="form-group">
<label for="Tarea" class="col-sm-2 control-label">Tarea:</label>
<div class="col-sm-10">
<select class="form-control" id="Tarea" name="Tarea">
    <option value="<?php echo $IdTarea;?>" ><label style="font-weight:bold;color:black">SELECCIONADO : * <?php echo $Tarea1;?> * </label></option>
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
<input type="date" class="form-control" id="Fecha" name="Fecha" value="<?php echo $datos['Fecha']?>">
</div>
</div>

<div class="form-group">
 <label for="Cedula" class="col-sm-2 control-label">Ingrese el nombre:</label>
<div class="col-sm-10">
<select class="form-control" id="trabajador" name="trabajador" >
        <option value="<?php echo $Idtrabajador;?>" ><label style="font-weight:bold;color:black">SELECCIONADO : * <?php echo $CedulaN;?> * </label></option>
        <?php
// Realizamos la consulta para extraer los datos
          $query = mysqli_query($conn,"SELECT * FROM trabajadores");
          while ($valores = mysqli_fetch_array($query)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
            echo '<option value="'.$valores['Id_Trabajadores'].'">'.$valores['Pr_nombre'].'</option>';
          }
        ?>
      </select>
   <div style="height:50px"></div>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Pr_nombre</th>
                                <th>Sg_nombre</th>
                                <th>Ap_paterno</th>
                                <th>Ap_materno</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$consulta=mysqli_query($conn,"SELECT * From trabajadores");   
while($filas=mysqli_fetch_array($consulta)){
   $Cedula=$filas['Cedula'];
   $Pr_nombre=$filas['Pr_nombre'];
   $Sg_nombre=$filas['Sg_nombre'];
   $Ap_Paterno=$filas['Ap_Paterno'];
   $Ap_Materno=$filas['Ap_Materno'];
   ?>
                      
                            <tr>
               <td width="300"><?php echo $Cedula ?></td> 
               <td width="250"><?php echo $Pr_nombre ?></td>
               <td width="50"><?php echo $Sg_nombre ?></td>
               <td width="250"><?php echo $Ap_Paterno ?></td>
               <td width="50"><?php echo $Ap_Materno ?></td>
             
 
                            </tr>
    <?php }?>
                        </tbody> 

                       </table>   
</div>
</div>
<div class="form-group">
<label for="Cantidad" class="col-sm-2 control-label">Cantidad:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Cantidad" name="Cantidad" value="<?php echo $Cantidad;?>" placeholder="ingrese el avance">
</div>
</div> 
  <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a href="asignacion.php" class="btn btn-default">Regresar</a>
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
