<?php
include('../conexion.php');
$result = mysqli_query($conn,"Select a.id_trabajadores, a.Id_asignacion FROM asignacion_tarea1 a where a.id_trabajadores=20") or die("database error:". mysqli_error($conn));
while ($fila = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    
    $Id_Trabajadores=$fila["id_trabajadores"];
    $Asignacion=$fila["Id_asignacion"];
}

mysqli_free_result($result);
?>