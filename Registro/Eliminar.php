<!DOCTYPE>
<html>
<head>
	<title>Eliminar</title>
</head>
<body>
	<?php
	include('../conexion.php');
$Cedula =$_POST['Cedula'];

//Eliminar
mysqli_query($conn,"DELETE FROM trabajadores where Cedula='$Cedula'")
 
     or die("Error al eliminar los datos");
     mysqli_close($conn);
     echo "Datos eliminados correctamente"; 
	?>
	<a href="index3.php"><input type="button" value="Regresar"></a> 
	</body>
</html>