<!DOCTYPE>
<html>
<head>
	<title>Eliminar</title>
	 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <scrip src="js/jquery-3.5.1.min.js"></scrip>
      <scrip src="js/bootstrap.min.js"></scrip>
</head>
<body>
	<?php
include('../conexion.php');
$Id_desempeno =$_POST['Id_desempeno'];

//Eliminar
mysqli_query($conn,"DELETE FROM desempeno where Id_desempeno='$Id_desempeno'")
     or die("Error al eliminar los datos");
     mysqli_close($conn);
    echo "Datos eliminados correctamente"; 
	?>
	<a href="desempeño.php" class="btn btn-primary">Regresar</a>
	</body>
</html>