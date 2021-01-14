<!DOCTYPE>
<html>
<head>
	<title>Eliminar</title>
	  <mete name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <scrip src="js/jquery-3.5.1.min.js"></scrip>
      <scrip src="js/bootstrap.min.js"></scrip>
</head>
<body>
	<?php
	include('../conexion.php');
$Id_asignacion =$_POST['Id_asignacion'];

//Eliminar
mysqli_query($conn,"DELETE FROM asignacion_tarea1 where Id_asignacion='$Id_asignacion'")
 
     or die("Error al eliminar los datos");
     mysqli_close($conn);
     if($Id_asignacion='Id_asignacion'){
     	echo "Datos eliminados correctamente";
     }else {
     	   echo "Datos No existentes";
     }
  

	?>
<div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a href="asignacion.php" class="btn btn-primary">Regresar</a>
 </div>
</div> 
	</body>
</html>