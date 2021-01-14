<?php
include('../conexion.php');
//$conexion= mysqli_connect("localhost","root","","asosermanelun");
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tabla de Trabajadores</title> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">        
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">         
  </head>    
  <body> 

         <h1 class="text-center ">Registro de personal</h1> 
    <div style="height:50px"></div>
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
 
<a href="insertar.php" ><input class="btn btn-primary" type="button" value="Registrar Personal"style="float:right;"></a><br><br>
                            <tr>
                                <th>ID</th>
                                <th>Cedula</th>
                                <th>Pr_nombre</th>
                                <th>Sg_nombre</th>
                                <th>Ap_paterno</th>
                                <th>Ap_materno</th>
                                <th>Direccion</th>
                                <th>Estado_civil</th>
                                <th>Cargas_familiares</th>
                                <th>Nivel_estudios</th>
                                <th>Genero</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Cargos</th>
                                 <th>Modificar</th>
                                 <th>Enviar Datos</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$consulta=mysqli_query($conn,"SELECT * From trabajadores");   
while($filas=mysqli_fetch_array($consulta)){
   $Id=$filas['Id_Trabajadores'];
   $Cedula=$filas['Cedula'];
   $Pr_nombre=$filas['Pr_nombre'];
   $Sg_nombre=$filas['Sg_nombre'];
   $Ap_Paterno=$filas['Ap_Paterno'];
   $Ap_Materno=$filas['Ap_Materno'];
   $Direccion=$filas['Direccion'];
   $Estado_civil=$filas['Estado_civil'];
   $Cargas_familiares=$filas['Cargas_familiares'];
   $Nivel_estudios=$filas['Nivel_estudios'];
   $Genero=$filas['Genero'];
   $Telefono=$filas['Telefono'];
   $Celular=$filas['Celular'];
   $Email=$filas['Email'];
   $Cargo=$filas['Cargo']; 
   ?>
                      
                            <tr>
               <td width="300"><?php echo $Id ?><input type="text" hidden name="Id" value="<?php echo $Id ?>"></td>
               <td width="300"><?php echo $Cedula ?></td> 
               <td width="250"><?php echo $Pr_nombre ?></td>
               <td width="50"><?php echo $Sg_nombre ?></td>
               <td width="250"><?php echo $Ap_Paterno ?></td>
               <td width="50"><?php echo $Ap_Materno ?></td>
               <td width="50"><?php echo $Direccion ?></td>
                <td width="50"><?php echo $Estado_civil ?></td>
               <td width="50"><?php echo $Cargas_familiares?></td>
               <td width="300"><?php echo $Nivel_estudios ?></td>
               <td width="80"><?php echo $Genero ?></td>
               <td width="80"><?php echo $Telefono ?></td>
               <td width="80"><?php echo $Celular ?></td>
               <td width="80"><?php echo $Email ?></td>
               <td width="80"><?php echo $Cargo ?></td>
                <td width="80">
   <a href="modificar.php?id=<?php echo $Id;?>" ><input class="btn btn-primary" type="button" value="modificar"></a> </td>
    <td width="80">
   <a href="/Asosermanelun/Rol_Pago/insertar.php?id=<?php echo $Id;?>" ><input class="btn btn-primary" type="button" value="Registro"></a> </td>
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