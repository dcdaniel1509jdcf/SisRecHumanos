<?php
include('../conexion.php');
   $Cedula=$_POST['Cedula'];
   $Pr_nombre=$_POST['Pr_nombre'];
   $Sg_nombre=$_POST['Sg_nombre'];
   $Ap_Paterno=$_POST['Ap_paterno'];
   $Ap_Materno=$_POST['Ap_materno'];
   $Direccion=$_POST['Direccion'];
   $Estado_civil=$_POST['Estado_civil'];
   $Cargas_familiares=$_POST['Cargas_familiares'];
   $Nivel_estudios=$_POST['Nivel_estudios'];
   $Genero=$_POST['Genero'];
   $Telefono=$_POST['Telefono'];
   $Celular=$_POST['Celular'];
   $Email=$_POST['Email'];
   $Cargo=$_POST['Cargo'];                              
   //insertar
   $Consulta=mysqli_query($conn,"INSERT INTO trabajadores VALUES(NULL,'$Cedula','$Pr_nombre','$Sg_nombre','$Ap_Paterno','$Ap_Materno','$Direccion','$Estado_civil','$Cargas_familiares','$Nivel_estudios','$Genero','$Telefono','$Celular','$Email','$Cargo')");
?> 
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
            <div class="row" style="text-align:center">
               <?php if($Consulta) { ?>
                  <h3>REGISTRO GUARDADO</h3>
                  <?php } else { ?>
                  <h3>ERROR AL GUARDAR</h3>
               <?php } ?>        
               <a href="index3.php" class="btn btn-primary">Regresar</a>
               
            </div>
         </div>
      </div>
   </body>
</html>



