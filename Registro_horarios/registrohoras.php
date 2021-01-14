<?php
$conexion= mysqli_connect("localhost","root","","asosermanelun");
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>REGISTRO DE HISTORIAL DEL TRABAJADOR</title> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">        
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">         
  </head>    
  <body> 

         <h1 class="text-center ">REGISTRO DE HISTORIAL DEL TRABAJADOR</h1>        
    <div style="height:50px"></div>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
<a href="insertar.php" ><input class="btn btn-primary" type="button" value="Registrar Horas" style="float:right;"></a><br><br>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Salida</th>
                                <th>Descripción</th>
                                 <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$consulta=mysqli_query($conexion,"SELECT * From registro_trabajadores");   
while($filas=mysqli_fetch_array($consulta)){
   $Id=$filas['Id_registro'];
   $Cedula=$filas['Id_trabajadores'];
   $F_Entrada=$filas['Fecha_Ingreso'];
   $F_Salida=$filas['Fecha_Salida'];
   $Descripcion=$filas['Descripcion'];
   $conexion1= mysqli_connect("localhost","root","","asosermanelun");
 $res=mysqli_query($conexion1,"SELECT Pr_nombre FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN=$filas1['Pr_nombre'];

   ?>
                      
                            <tr>
               <td width="300"><?php echo $Id ?><input type="text" hidden name="Id" value="<?php echo $Id ?>"></td>
               <td width="300"><?php echo $CedulaN ?></td> 
               <td width="300"><?php echo $F_Entrada ?></td>
               <td width="300"><?php echo $F_Salida ?></td>
               <td width="50"><?php echo $Descripcion ?></td> 
                
                <td width="80">
   <a href="modificar.php?id=<?php echo $Id;?>" ><input type="button" class="btn btn-primary" value="modificar"></a> </td>
                            </tr>
    <?php }?>
                        </tbody> 

                       </table>
<form action="../inicio.php" method="POST" style="float:left;">
<input width="80" type="image" name="submit" src="../img/regresar.jpg">
</form>            
                             
<form action="Eliminar.php"method="POST" style="float:right; margin-right:350px;">  <p> Eliminar por ID_REGISTRO <p>
Registro:<input type="text" class="form-control" id="Id_registro"  name="Id_registro" placeholder="ingrese su Id"> <input type="submit" value="Eliminar Registro" class="btn btn-primary" name="btnEliminar">   
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