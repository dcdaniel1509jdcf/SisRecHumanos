<?php
include('conexion.php');
session_start();
$Email=$_POST['Email'];
$clave=$_POST['Password'];

$consulta =mysqli_query($conn,"SELECT * FROM login WHERE Email='$Email' AND Password='$clave'");
$validar = mysqli_num_rows($consulta);
if (mysqli_num_rows($consulta)>0) {
   echo '<script language="javascript">alert("Ingreso Exitoso, BIENVENIDO AL SISTEMA");</script>';
   echo '<script> window.location="inicio.php";</script>';
}else {
  echo '<script language="javascript">alert("Ingreso Incorrecto, intentelo nuevamente");</script>';
   echo '<script> window.location="index.php";</script>';

}
?>