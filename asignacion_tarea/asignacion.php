<?php
include('../conexion.php');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trabajo</title> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">        
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">         
  </head>    
  <body> 

  <h1 class="text-center ">ASIGNACION DE TRABAJO</h1> 
    <div style="height:50px"></div>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                       <form action= "asignacion.php" method="POST">
                        </form>

<table id="example" class="table table-striped table-bordered" style="width:100%">
                         <thead>   

<a href="insertar.php" ><input  class="btn btn-primary" type="button" value="Registrar Tarea" style="float:right; "></a><br><br> 
 
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Tareas</th>
                                 <th>Cantidad</th>
                                 <th>Tiene desempeño</th>
                                  <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
<?php

$consulta=mysqli_query($conn,"SELECT * From asignacion_tarea1");

 while($filas=mysqli_fetch_array($consulta)){
   $Id=$filas['Id_asignacion'];
   $Tarea=$filas['Id_tareas'];
   $Fecha=$filas['Fecha'];
   $Cedula=$filas['Id_Trabajadores'];
   $Cantidad=$filas['cantidad'];
   $Desempeño=$filas[5];
   
$conexion1= mysqli_connect("localhost","root","","asosermanelun");
 $res=mysqli_query($conexion1,"SELECT Pr_nombre FROM trabajadores WHERE Id_Trabajadores='$Cedula'");
 $filas1=mysqli_fetch_array($res);
 $CedulaN=$filas1['Pr_nombre'];
 $conexion2= mysqli_connect("localhost","root","","asosermanelun");
  $res1=mysqli_query($conexion2,"SELECT * FROM tareas WHERE Id_tareas='$Tarea'");
 $filas2=mysqli_fetch_array($res1);
 $tarea1=$filas2['Tareas'];

   ?>   
              <tr>
               <td width="300"><?php echo $Id ?><input type="text" hidden name="Id" value="<?php echo $Id ?>"></td>
               <td width="250"><?php echo $Fecha ?></td>
              <td width="250"><?php echo $CedulaN ?></td>
               <td width="50"><?php echo $tarea1 ?></td>
               <td width="250"><?php echo $Cantidad ?></td> 
                <td width="250"><?php echo $Desempeño ?></td>     
                <td width="80"><a href="modificar.php?id=<?php echo $Id;?>" ><input  class="btn btn-primary" type="button" value="modificar"></a> </td>  
                        </tr>
    <?php }?>
                        </tbody> 

                       </table>
<form action="../inicio.php" method="POST" style="float:left;">
<input width="80" type="image" name="submit" src="../img/regresar.jpg">
</form>            
                             
<form action="Eliminar.php" method="POST"  style="float:right; margin-right:350px;">  <p> Eliminar por ID_Asignacion <p>
Asignacion:<input type="text" class="form-control" id="Id_asignacion"  name="Id_asignacion" placeholder="ingrese el Id"> <input type="submit" value="Eliminar Registro" class="btn btn-primary" name="btnEliminar">   
</form>          

                           <tr>
                          
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