<?php
session_start();
include('../conexion.php');
$Id_rol=$_GET['id'];
$sentencia=mysqli_query($conn,"SELECT * FROM rol_pagos WHERE Id_rol='$Id_rol'");
$datos= mysqli_fetch_array ($sentencia);
$Id=$datos['Id_rol'];
$Cedula=$datos['Id_trabajadores'];
$Pr_nombre=$datos['Id_trabajadores'];
$res=mysqli_query($conn,"SELECT Cedula FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN=$filas1['Cedula'];
  $res=mysqli_query($conn,"SELECT Pr_nombre FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN1=$filas1['Pr_nombre'];
 $Sueldo=$datos['Basico_unificado'];
 $H_extras=$datos['H_extras'];
 $Registrar=$datos['Decimos'];
 $Bono=$datos['Bonos'];
 $Otros_ingresos=$datos['Otro_ingresos'];
 $Fondo_reserva=$datos['Fondos_reserva'];
 $Devoluciones=$datos['Devoluciones'];
 $Aporte_IESS=$datos['Aportes_iess'];
 $Impuesto_renta=$datos['Impuestos_renta'];
 $Prestamo_hipotecario=$datos['Prestamo_hipotecario'];
   $Prestamo_Quirografarios=$datos['Prestamo_Quirografarios'];
   $Prestamo_Empresa=$datos['Prestamo_Empresa'];
   $Multas=$datos['Multas'];
   $Seguro_Medico=$datos['Seguro_medico'];
   $Anticipos=$datos['Anticipos'];
   $Otro_Descuento=$datos['Otros_descuentos'];
   $Total_Ingreso = $datos['Total_ingreso'];
   $Total_deducciones = $datos['Total_deducciones'];
   $Neto_recibir = $datos['Neto_recibir'];
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
            <title>Rol</title>
            <p>
                <center>INGRESO DE ROL</center>
            </p>
        </div>
        <form class="form-horizontal" method="POST" action="actualizar.php" enctype="multipart/form-data"
            autocomplete="off">
              <div class="form-group">
             <label for="Id_asignacion" class="col-sm-2 control-label">Id:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Id_asignacion"  name="Id_rol" placeholder="" value="<?php echo $Id;?>">
</div>
</div>
            <input type="hidden" id='Id_trabajador' name="Id_trabajador" value='<?php echo $Id;?>'>
            <div class="form-group">
                <label for="trabajador" class="col-sm-2 control-label">Cedula: <?php echo $CedulaN;?></label><br>
                <label for="Nombre" class="col-sm-2 control-label">Nombre: <?php echo $CedulaN1;?></label>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Basico_unificado:</label>
                <div class="col-sm-10">
                    <input id="Basico_Unificado" name="Basico_Unificado" type="text" value='<?php echo $Sueldo;?>' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="H_extras" class="col-sm-2 control-label">Horas Extras:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="H_extras" name="H_extras" value='<?php echo $H_extras;?>'
                        >
                </div>
            </div>
            
            <div class="form-group">
                <label for="Retroactivo" class="col-sm-2 control-label">Retroactivo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Retroactivo" name="Retroactivo"
                        value='<?php echo $Registrar;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Bono" class="col-sm-2 control-label">Bono:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="Bono" name="Bono" value='<?php echo $Bono;?>'>
                </div>
                </div>
            <div class="form-group">
                <label for="Otros_Ingresos" class="col-sm-2 control-label">Otros ingresos:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Otro_ingresos" name="Otro_ingresos" value='<?php echo $Otros_ingresos;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Fondos_reserva" class="col-sm-2 control-label">Fondos de reserva:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Fondo_reserva" name="Fondo_reserva"
                       value='<?php echo $Fondo_reserva;?>'required>
                </div>
            </div>
            <div class="form-group">
                <label for="Devoluciones" class="col-sm-2 control-label">Devoluciones:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Devoluciones" name="Devoluciones"
                        value='<?php echo $Devoluciones;?>'required>
                </div>
            </div>
            <div class="form-group">
                <label for="Aportes_iess" class="col-sm-2 control-label">Aportes al IESS:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Aporte_IESS" name="Aporte_IESS"
                       value='<?php echo $Aporte_IESS;?>' required>
                </div>
            </div>
            <div class="form-group">
                <label for="Impuestos_renta" class="col-sm-2 control-label">Vacaciones:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Impuesto_renta" name="Impuesto_renta"
                        value='<?php echo $Impuesto_renta;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Prestamo_hipotecarios" class="col-sm-2 control-label">Prestamo Hipotecarios:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Prestamo_hipotecario" name="Prestamo_hipotecario"
                        value='<?php echo $Prestamo_hipotecario;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Prestamos_Quirografarios" class="col-sm-2 control-label">Prestamo Quirografarios:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Prestamo_Quirografarios" name="Prestamo_Quirografarios"
                     value='<?php echo $Prestamo_Quirografarios;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Prestamo_Empresa" class="col-sm-2 control-label">Prestamo Empresa:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Prestamo_Empresa" name="Prestamo_Empresa"
                     value='<?php echo $Prestamo_Empresa;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Multas" class="col-sm-2 control-label">Multas:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Multas" name="Multas"value='<?php echo $Multas;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Seguro_medico" class="col-sm-2 control-label">Seguro Medico:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Seguro_Medico" name="Seguro_Medico"
                       value='<?php echo $Seguro_Medico;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Anticipos" class="col-sm-2 control-label">Anticipos:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Anticipos" name="Anticipos"
                        value='<?php echo $Anticipos;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Otros_descuentos" class="col-sm-2 control-label">Otros descuentos:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Otros_descuentos" name="Otros_descuentos" value='<?php echo $Otro_Descuento;?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="Total_ingreso" class="col-sm-2 control-label">Total ingreso:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Total_ingreso" name="Total_ingreso" >
                </div>
            </div>
            <div class="form-group">
                <label for="Total_deducciones" class="col-sm-2 control-label">Total deducciones:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Total_deducciones" name="Total_deducciones">
                </div>
            </div>
            <div class="form-group">
                <label for="Neto_recibir" class="col-sm-2 control-label">Neto recibir:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Neto_recibir" name="Neto_recibir">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="/Asosermanelun/Registro/index3.php" class="btn btn-primary">Regresar</a>
                    
                    <input type="submit" value="Guardar " name="Guardar" class="btn btn-primary">
                    
                </div>
            </div>
        </form>
        <button class="btn btn-danger" onclick="calcularTotales()">Calcular totales</button>
       
    </div>

     <script>
        function calcularTotales(){
            var sueldoBasico = parseFloat($("#Basico_Unificado").val());
            var horasExtras =parseFloat($("#H_extras").val());
            var retroactivo = parseFloat( $("#Retroactivo").val());
            var bono =parseFloat( $("#Bono").val());
            var otrosIngresos = parseFloat($("#Otro_ingresos").val());
            var fondosreserva = parseFloat($("#Fondo_reserva").val());
            var devoluciones = parseFloat($("#Devoluciones").val());
           
            var aportesiess = parseFloat($("#Aporte_IESS").val());
            var impuestosrenta =parseFloat ($("#Impuesto_renta").val());
            var prestamoshipotecario =parseFloat( $("#Prestamo_hipotecario").val());
            var prestamosquirografarios =parseFloat( $("#Prestamo_Quirografarios").val());
            var prestamoempresa = parseFloat($("#Prestamo_Empresa").val());
            var multas =parseFloat( $("#Multas").val());
            var seguromedico =parseFloat( $("#Seguro_Medico").val());
            var anticipos =parseFloat( $("#Anticipos").val());
            var otrosdescuentos = parseFloat($("#Otros_descuentos").val());
            
            var totalIngreso = sueldoBasico + horasExtras + retroactivo + bono + otrosIngresos + fondosreserva + devoluciones ;
            
            var totalDeducciones = aportesiess + impuestosrenta + prestamoshipotecario + prestamosquirografarios + prestamoempresa + multas+ seguromedico + anticipos + otrosdescuentos;
            
            var netoRecibir = totalIngreso - totalDeducciones;

            $("#Total_ingreso").val(totalIngreso);
            $("#Total_deducciones").val(totalDeducciones);
            $("#Neto_recibir").val(netoRecibir);
        }
    </script>

  </body>
</html>