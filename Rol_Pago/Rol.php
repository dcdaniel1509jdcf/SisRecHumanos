<?php
include('../conexion.php');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rol</title> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">        
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          
  </head>    
  <body> 
        <h1 class="text-center ">ROL DE PAGO</h1> 
    <div style="height:50px"></div>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
 
<a href="fpdf/generate_pdf.php" ><input  class="btn btn-primary" type="button" value="Generar PDF" style="float:right; "></a><br><br> 
                            <tr>
                                <th>ID</th>
                                <th>PDF</th>
                                <th>Nombre</th>
                                <th>Basico_Unificado</th>
                                <th>H_extras</th>
                                <th>Decimo</th>
                                <th>Bono</th>
                                <th>Otros_ingresos</th>
                                <th>Fondo_Reserva</th>
                                <th>Devoluciones</th>
                                <th>Aporte_IESS</th>
                                <th>Vacaciones</th>
                                <th>Prestamo_hipotecario</th>
                                <th>Prestamo_Quirografarios</th>
                                <th>Prestamo_Empresa</th>
                                <th>Multas</th>
                                <th>Seguro_Medico</th>
                                 <th>Anticipos</th>
                                  <th>Otro_Descuento</th>
                                   <th>Total_Ingreso</th>
                                    <th>Total_deducciones</th>
                                     <th>Neto_recibir</th>
                                 <th>Modificar</th>
                                  
                            </tr>
                        </thead>
                        <tbody>
<?php
$consulta=mysqli_query($conn,"SELECT * From rol_pagos");   
while($filas=mysqli_fetch_array($consulta)){
   $Id=$filas['Id_rol'];
   $Cedula=$filas['Id_trabajadores'];
   $conexion1= mysqli_connect("localhost","root","","asosermanelun");
 $res=mysqli_query($conexion1,"SELECT Pr_nombre FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN=$filas1['Pr_nombre'];

   $Basico_Unificado=$filas['Basico_unificado'];
   $H_extras=$filas['H_extras'];
   $Registrar=$filas['Decimos'];
   $Bono=$filas['Bonos'];
   $Otros_ingresos=$filas['Otro_ingresos'];
   $Fondo_reserva=$filas['Fondos_reserva'];
   $Devoluciones=$filas['Devoluciones'];
   $Aporte_IESS=$filas['Aportes_iess'];
   $Impuesto_renta=$filas['Impuestos_renta'];
   $Prestamo_hipotecario=$filas['Prestamo_hipotecario'];
   $Prestamo_Quirografarios=$filas['Prestamo_Quirografarios'];
   $Prestamo_Empresa=$filas['Prestamo_Empresa'];
   $Multas=$filas['Multas'];
   $Seguro_Medico=$filas['Seguro_medico'];
   $Anticipos=$filas['Anticipos'];
   $Otro_Descuento=$filas['Otros_descuentos'];
   $Total_Ingreso=$filas['Total_ingreso'];
   $Total_deducciones=$filas['Total_deducciones'];
   $Neto_recibir=$filas ['Neto_recibir']; 
   ?>
                            <tr>
               <td width="300"><?php echo $Id ?><input type="text" hidden name="Id" value="<?php echo $Id ?>"></td>
               <td> 
                   <form action="fpdf/generate_pdf1.php" method="POST">
                       <input type="text" name="Id_trabajador" value="<?php echo $Cedula;?>" hidden>
                       <button type="submit"  class="btn btn-danger" style="padding:3px; width:30px"><i class="fa fa-file-pdf-o"></i></button>
                   </form></td>
               <td width="300"><?php echo $CedulaN ?></td>
               <td width="300"><?php echo number_format($Basico_Unificado, 2) ?></td> 
               <td width="250"><?php echo number_format($H_extras, 2) ?></td>
               <td width="250"><?php echo number_format($Registrar, 2) ?></td>
               <td width="50"><?php echo number_format($Bono, 2) ?></td>
               <td width="50"><?php echo number_format($Otros_ingresos, 2) ?></td>
                <td width="50"><?php echo number_format($Fondo_reserva, 2) ?></td>
               <td width="50"><?php echo number_format($Devoluciones, 2)?></td>
               <td width="300"><?php echo number_format($Aporte_IESS, 2) ?></td>
               <td width="80"><?php echo number_format($Impuesto_renta, 2) ?></td>
               <td width="80"><?php echo number_format($Prestamo_hipotecario, 2) ?></td>
               <td width="80"><?php echo number_format($Prestamo_Quirografarios, 2) ?></td>
               <td width="80"><?php echo number_format($Prestamo_Empresa,2) ?></td>
               <td width="80"><?php echo number_format($Multas, 2) ?></td>
               <td width="80"><?php echo number_format($Seguro_Medico, 2) ?></td>
               <td width="80"><?php echo number_format($Anticipos,2) ?></td>
               <td width="80"><?php echo number_format($Otro_Descuento, 2) ?></td>
               <td width="80"><?php echo number_format($Total_Ingreso, 2) ?></td>
               <td width="80"><?php echo  number_format($Total_deducciones, 2) ?></td>
               <td width="80"><?php echo number_format($Neto_recibir, 2) ?></td>
                <td width="80">
   <a href="modificar.php?id=<?php echo $Id;?>" ><input class="btn btn-primary" type="button" value="modificar"></a> </td>
                            </tr>
    <?php }?>
                        </tbody> 
                       </table>
    
                           <form action="../inicio.php" method="POST" >
<right><input width="80" type="image" name="submit" src="../img/regresar.jpg"></right>
</form>                      
                    </div>
                </div>
        </div>  
    </div> 

    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>       
    <script type="text/javascript" src="main.js"></script> 
  </body>
</html>