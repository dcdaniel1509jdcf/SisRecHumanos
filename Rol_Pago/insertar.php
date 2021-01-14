<?php
session_start();
include('../conexion.php');
 $Id_Trabajador=$_GET['id'];
$sentencia=mysqli_query($conn,"SELECT * FROM trabajadores WHERE Id_Trabajadores ='$Id_Trabajador'");
$datos= mysqli_fetch_array ($sentencia);
  $Id=$datos['Id_Trabajadores'];
 $_SESSION['Ids_Trabajadores'] = $Id;
   $Cedula=$datos['Cedula'];
    $_SESSION['Ids_Cedula'] = $Cedula;
   $Pr_nombre=$datos['Pr_nombre'];
   $Sg_nombre=$datos['Sg_nombre'];
   $Ap_Paterno=$datos['Ap_Paterno'];
   $Ap_Materno=$datos['Ap_Materno'];
   $Direccion=$datos['Direccion'];
   $Estado_civil=$datos['Estado_civil'];
   $Cargas_familiares=$datos['Cargas_familiares'];
   $Nivel_estudios=$datos['Nivel_estudios'];
   //$Sueldo=$datos['Sueldo'];
   //$_SESSION['Ids_Sueldo'] = $Sueldo;  
   $Genero=$datos['Genero'];
   $Telefono=$datos['Telefono'];
   $Celular=$datos['Celular'];
   $Email=$datos['Email'];
   $Cargo=$datos['Cargo'];

$Cedula = '';
$Pr_nombre = '';
$Sueldo = 0;
//para verificar si exite la variable
if(isset($_GET['id'])){
$Id_Trabajador=$_GET['id'];
$sentencia=mysqli_query($conn,"SELECT * FROM trabajadores WHERE Id_Trabajadores ='$Id_Trabajador'");
$datos= mysqli_fetch_array ($sentencia);
   $Id=$datos['Id_Trabajadores'];
   $Cedula=$datos['Cedula'];
   $Pr_nombre=$datos['Pr_nombre'];
   $Sg_nombre=$datos['Sg_nombre'];
   $Ap_Paterno=$datos['Ap_Paterno'];
   $Ap_Materno=$datos['Ap_Materno'];
   //$Sueldo=$datos['Sueldo'];
}
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
        <form class="form-horizontal" method="POST" action="insertarol.php" enctype="multipart/form-data"
            autocomplete="off">
            <input type="hidden" name="Id_trabajador" value='<?php echo $Id;?>'>

            <div class="form-group">
                <label for="trabajador" class="col-sm-2 control-label">Cedula: <?php echo $Cedula;?></label><br>
                <label for="Nombre" class="col-sm-2 control-label">Nombre: <?php echo $Pr_nombre;?></label>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Basico_unificado:</label>
                <div class="col-sm-10">
                    <input id="Basico_Unificado" name="Basico_Unificado" type="text" value='<?php echo $Sueldo;?>' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="H_extras_50" class="col-sm-2 control-label">Horas Extras:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="H_extras" name="H_extras"
                        placeholder="Ingrese la cantidad de horas realizadas">
                </div>
            </div>
            
            <div class="form-group">
                <label for="Retroactivo" class="col-sm-2 control-label">Retroactivo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Retroactivo" name="Retroactivo"
                        placeholder="Ingrese la cantidad de retroactivo">
                </div>
            </div>
            <div class="form-group">
                <label for="Bono" class="col-sm-2 control-label">Bono:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="Bono" name="Bono"
                placeholder="ingrese el bono">
                </div>
                </div>
            <div class="form-group">
                <label for="Otros_Ingresos" class="col-sm-2 control-label">Otros ingresos:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Otro_ingresos" name="Otro_ingresos"
                        placeholder="ingrese otro ingreso">
                </div>
            </div>
            <div class="form-group">
                <label for="Fondos_reserva" class="col-sm-2 control-label">Fondos de reserva:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Fondo_reserva" name="Fondo_reserva"
                        placeholder="ingrese los fondos de reservas">
                </div>
            </div>
            <div class="form-group">
                <label for="Devoluciones" class="col-sm-2 control-label">Devoluciones:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Devoluciones" name="Devoluciones"
                        placeholder="ingrese la devolución">
                </div>
            </div>
            <div class="form-group">
                <label for="Aportes_iess" class="col-sm-2 control-label">Aportes al IESS:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Aporte_IESS" name="Aporte_IESS"
                        placeholder="ingrese los aportes al IESS" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Impuestos_renta" class="col-sm-2 control-label">Vacaciones:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Impuesto_renta" name="Impuesto_renta"
                        placeholder="Ingrese el impuesto a la renta">
                </div>
            </div>
            <div class="form-group">
                <label for="Prestamo_hipotecarios" class="col-sm-2 control-label">Prestamo Hipotecarios:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Prestamo_hipotecario" name="Prestamo_hipotecario"
                        placeholder="ingrese el prestamo hipotecario">
                </div>
            </div>
            <div class="form-group">
                <label for="Prestamos_Quirografarios" class="col-sm-2 control-label">Prestamo Quirografarios:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Prestamo_Quirografarios" name="Prestamo_Quirografarios"
                        placeholder="ingrese el prestamo Quirografarios">
                </div>
            </div>
            <div class="form-group">
                <label for="Prestamo_Empresa" class="col-sm-2 control-label">Prestamo Empresa:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Prestamo_Empresa" name="Prestamo_Empresa"
                        placeholder="ingrese el prestamo empresa">
                </div>
            </div>
            <div class="form-group">
                <label for="Multas" class="col-sm-2 control-label">Multas:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Multas" name="Multas" placeholder="ingrese la Multa">
                </div>
            </div>
            <div class="form-group">
                <label for="Seguro_medico" class="col-sm-2 control-label">Seguro Medico:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Seguro_Medico" name="Seguro_Medico"
                        placeholder="ingrese el seguro Medico">
                </div>
            </div>
            <div class="form-group">
                <label for="Anticipos" class="col-sm-2 control-label">Anticipos:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Anticipos" name="Anticipos"
                        placeholder="ingrese los anticipos">
                </div>
            </div>
            <div class="form-group">
                <label for="Otros_descuentos" class="col-sm-2 control-label">Otros descuentos:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Otros_descuentos" name="Otros_descuentos"
                        placeholder="ingrese el descuento">
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
                    
                    <input type="submit" value="Guardar " name="Calcular" class="btn btn-primary">
                    
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
