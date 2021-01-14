<?php
include('../conexion.php');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dempeño</title> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">        
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">         
  </head>    
  <body> 

  <h1 class="text-center ">DESEMPEÑO PERSONAL</h1> 
    <div style="height:50px"></div>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
     

<a href="insertar.php" ><input class="btn btn-primary" type="button" value="Insertar Desempeño"style="float:right;"></a><br><br>
<a href="descargar.php" ><input class="btn btn-info" type="button" value="Reportes"style="float:right;"></a><br><br>
 
                            <tr>
                                <th>ID</th>
                                <th>Cedula</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Avance</th>
                                <th>Novedades</th>
                                <th>Porcentaje%</th>
                                <th>Modificar</th>
                               
                            </tr>
                        </thead>
                        <tbody>
<?php
$consulta=mysqli_query($conn,"SELECT * From desempeno");   
while($filas=mysqli_fetch_array($consulta)){
   $Id=$filas['Id_desempeno'];
    $Cedula=$filas['Id_Trabajadores'];
   $Asignacion=$filas['Id_asignacion'];
   $Avance=$filas['Avance'];
   $Novedades=$filas['Novedades'];
   $Porcentaje=$filas['Porcentaje'];
$conexion1= mysqli_connect("localhost","root","","asosermanelun");
 $res=mysqli_query($conexion1,"SELECT Cedula FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN=$filas1['Cedula'];
 $confecha=mysqli_query($conexion1,"SELECT * FROM asignacion_tarea1 WHERE Id_Trabajadores='$Cedula'");
 $fech=mysqli_fetch_array($confecha);
 $Fecha = $fech['Fecha'];
 $conexion2= mysqli_connect("localhost","root","","asosermanelun");
 $res1=mysqli_query($conexion2,"SELECT cantidad FROM asignacion_tarea1 WHERE Id_asignacion='$Asignacion'");
 $filas2=mysqli_fetch_array($res1);
 $AsignacionN=$filas2['cantidad'];
   ?>   
             
              <tr>
               <td width="300"><?php echo $Id ?><input type="text" hidden name="Id" value="<?php echo $Id ?>"></td>
                <td width="250"><?php echo $CedulaN ?></td>
                  <td width="250"><?php echo $Fecha ?></td>
               <td width="250"><?php echo $AsignacionN ?></td>
              
               <td width="250"><?php echo $Avance ?></td>
               <td width="250"><?php echo $Novedades ?></td>  <td width="250"><?php echo $Porcentaje ?></td>          
   <td width="80"><a href="modificar.php?id=<?php echo $Id;?>" ><input class="btn btn-primary"  type="button" value="modificar"></a> </td>  
    </td>
                          </tr>
    <?php }?>
                        </tbody> 

                       </table>
<form action="../inicio.php" method="POST" style="float:left;">
<input width="80" type="image" name="submit" src="../img/regresar.jpg">
</form>            
                             
<form action="Eliminar.php"method="POST" style="float:right; margin-right:350px;">  <p> Eliminar por ID_desempeño <p>
Registro:<input type="text" class="form-control" id="Id_desempeno"  name="Id_desempeno" placeholder="ingrese su Id"> <input type="submit" value="Eliminar Registro" class="btn btn-primary" name="btnEliminar">   
</form>                </div>
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