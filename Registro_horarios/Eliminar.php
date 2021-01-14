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
$Id_Registro =$_POST['Id_registro'];

//Eliminar
mysqli_query($conn,"DELETE FROM registro_trabajadores where Id_registro='$Id_Registro'")or die("Error al eliminar los datos");
     mysqli_close($conn);
    echo "Datos eliminados correctamente"; 
	?>
	<a href="registrohoras.php"class="btn btn-primary">Regresar</a>
	</body>
</html>