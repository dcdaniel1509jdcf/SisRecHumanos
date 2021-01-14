<?php
session_start();
include('../conexion.php');
//variables 
$Id_trabajador = $_SESSION['Ids_Trabajadores'];
$Salario  = $_SESSION['Ids_Sueldo'];
//if(isset($_POST['Calcular'])){
//$trabajadores=$_POST['trabajador'];
//$salario=$_POST['Basico_unificado'];
$Ho_extras_50=$_POST['H_extras_50'];
$Ho_extras_100=$_POST['H_extras_100'];
$Retroactivos=$_POST['Retroactivo'];
$Bono=$_POST['Bono'];
$Otros_Ingresos=$_POST['Otros_ingresos'];
$Fondos=$_POST['Fondos_reserva'];
$Devolucion=$_POST['Devoluciones'];
//valores para sumar deducciones
$Aportes_IESS=$_POST['Aportes_iess'];
$Impuesto=$_POST['Impuestos_renta'];
$Prestamos=$_POST['Prestamos_hipotecario'];
$Prestamos2=$_POST['Prestamos_Quirografarios'];
$Prestamos3=$_POST['Prestamo_Empresa'];
$Multa=$_POST['Multas'];
$Seguro=$_POST['Seguro_medico'];
$Anticipo=$_POST['Anticipos'];
$Otros_Descuentos=$_POST['Otros_descuentos'];
//$Total_Ingreso=$_POST['Total_ingreso'];
//$Total_Deducciones=$_POST['Total_deducciones'];
//$Neto=['Neto_recibir'];
//sumar
$sumaingreso= $Salario + $Ho_extras_50 +
$Ho_extras_100 + $Retroactivos +
$Bono + $Otros_Ingresos +$Fondos + $Devolucion;
//suma de deducciones
$sumadeducciones=$Aportes_IESS + $Impuesto + $Prestamos + $Prestamos2 + $Prestamos3 +
$Multa + $Seguro + $Anticipo + $Otros_Descuentos;
//suma de neto
$sumaneto=$sumaingreso - $sumadeducciones;
//insertar
//$Consulta=mysqli_query($conn,"INSERT INTO rol_pagos VALUES(NULL,'$Id_trabajador','$salario','$Ho_extras_50','$Ho_extras_100','Retroactivos','$Bono','$Otros_Ingresos','$Fondos','$Devolucion','$Aportes_IESS','$Impuesto','$Prestamos','$Prestamos2','$Prestamos3','$Multa','$Seguro','$Anticipo','$Otros_Descuentos','$sumaingreso','$sumadeducciones','$sumaneto')");
//modificar
$D="UPDATE rol_pagos SET Basico_Unificado='$Salario','H_extras_50='$Ho_extras_50',H_extras_100='$Ho_extras_100',Retroactivo='$Retroactivos',Id_desempeno='$Bono',Otro_ingresos='$Otros_Ingresos',Fondos_reserva='$Fondos',Devoluciones='$Devolucion',Aportes_iess='$Aportes_IESS',Impuestos_renta='$Impuesto',Prestamo_hipotecario='$Prestamos',Prestamo_Quirografarios='$Prestamos2',Prestamo_Empresa='$Prestamos3',Multas='$Multa',Seguro_Medico='$Seguro',Anticipos='$Anticipo',Otros_descuentos='$Otros_Descuentos',Total_ingreso='$sumaingreso',Total_deducciones='$sumadeducciones',Neto_recibir=$sumaneto WHERE Id_trabajadores='$Id_trabajador'";
echo $D;
$Consulta=mysqli_query($conn,"UPDATE rol_pagos SET Basico_Unificado='$Salario',H_extras_50='$Ho_extras_50',H_extras_100='$Ho_extras_100',Retroactivo='$Retroactivos',Id_desempeno='$Bono',Otro_ingresos='$Otros_Ingresos',Fondos_reserva='$Fondos',Devoluciones='$Devolucion',Aportes_iess='$Aportes_IESS',Impuestos_renta='$Impuesto',Prestamo_hipotecario='$Prestamos',Prestamo_Quirografarios='$Prestamos2',Prestamo_Empresa='$Prestamos3',Multas='$Multa',Seguro_Medico='$Seguro',Anticipos='$Anticipo',Otros_descuentos='$Otros_Descuentos',Total_ingreso='$sumaingreso',Total_deducciones='$sumadeducciones',Neto_recibir='$sumaneto' WHERE Id_trabajadores='$Id_trabajador')");
//resta
//$resta=$Devolucion - $Aportes_IESS -
//$Impuesto - $Prestamos - $Prestamos2-
//$Prestamos3 - $Multa - $Seguro - $Anticipo- $Otros_Descuentos;
//$r=$suma+$resta;

//$consulta = mysqli_query($conexion, "SELECT * FROM rol_pagos WHERE Id_trabajadores=$Id_trabajador");
 //$registro = mysqli_fetch_array($consulta, MYSQL_ASSOC);
    //if($registro==$registro['Id_trabajadores']){
//$actualizar=($conexion,"UPDATE rol_pagos SET Hora_Extra_50%=$Hora_Extra_50 WHERE Id_trabajadores=$Id_trabajador");
//if($actualizar)
  //$con->query($actualizar);
//{
  //echo "<span>Registro Modificado Correctamente</span>";
//}
//else
//{
  //echo "<span>No se pudieron guardar los datos</span>";
//}
//}


//}
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
    <title>Rol</title>
    <p><center>INGRESO DE ROL</center></p>
    </div>  
    <form class="form-horizontal" method="POST" action="" 
      enctype="multipart/form-data"autocomplete="off">
<div class="form-group">
 <label for="Total_ingreso" class="col-sm-2 control-label">Total ingreso:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Total_ingreso" name="Total_ingreso" value="<?php echo $sumaingreso; ?>">
</div>
</div>
<div class="form-group">
<label for="Total_deducciones" class="col-sm-2 control-label">Total deducciones:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Total_deducciones" name="Total_deducciones" value="<?php echo $sumadeducciones; ?>">
</div>
</div>
<div class="form-group">
 <label for="Neto_recibir" class="col-sm-2 control-label">Neto recibir:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Neto_recibir" name="Neto_recibir" value="<?php echo $sumaneto; ?>">
</div>
</div>
  <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            
          </div>
        </div>

      </form>
    </div>  
  </body>
</html>
