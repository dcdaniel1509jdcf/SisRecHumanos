<?php
include('../conexion.php');
	$trabajadorId = $_POST['trabajadorId'];
    $tareaId = 1;
    

	/*
  	$Consulta=mysqli_query($conn,"SELECT cantidad FROM asignacion_tarea1 WHERE Id_Trabajadores=$trabajadorId");

  	while ($row = $Consulta->fetch_assoc()) {
    	echo $row['cantidad'];
	}
	*/

	$result = mysqli_query($conn,"Select a.Id_asignacion,a.Fecha, a.cantidad FROM asignacion_tarea1 a where a.id_trabajadores=$trabajadorId and a.id_tareas=$tareaId") 
		or die("database error:". mysqli_error($conn));

	$data = array(
	  "success" => false,
	  "results" => array()
	);

	while ($fila = mysqli_fetch_array($result, MYSQLI_BOTH)) {

	    $data['results'][] = array(
		    'Id_asignacion' => $fila["Id_asignacion"],
		    'Fecha' => $fila["Fecha"],	
		    'cantidad' => $fila['cantidad']	
		  ); 
	}

	$data['success'] = true;
	echo json_encode($data);

?>
