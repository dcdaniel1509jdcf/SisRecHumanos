<?php
include('../conexion.php');
$Id_Trabajador=$_GET['id'];
$sentencia=mysqli_query($conn,"SELECT * FROM trabajadores WHERE Id_Trabajadores ='$Id_Trabajador'");
$datos= mysqli_fetch_array ($sentencia);
   $Id=$datos['Id_Trabajadores'];
   $Cedula=$datos['Cedula'];
$Pr_nombre=$datos['Pr_nombre'];
   $Sg_nombre=$datos['Sg_nombre'];
   $Ap_Paterno=$datos['Ap_Paterno'];
   $Ap_Materno=$datos['Ap_Materno'];
   $Direccion=$datos['Direccion'];
   $Estado_civil=$datos['Estado_civil'];
   $Cargas_familiares=$datos['Cargas_familiares'];
   $Nivel_estudios=$datos['Nivel_estudios'];
   $Genero=$datos['Genero'];
   $Telefono=$datos['Telefono'];
   $Celular=$datos['Celular'];
   $Email=$datos['Email'];
   $Cargo=$datos['Cargo'];

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
    <title>Registro de Trabajadores</title>
    <p><center>Ingreso de los datos</center></p>
    </div>  
    <form class="form-horizontal" method="POST" action="actualizar.php" 
      enctype="multipart/form-data"autocomplete="off">
      <div class="form-group">
  <label for="Id_Trabajadores" class="col-sm-2 control-label">Id:</label>
          <div class="col-sm-10">
<input type="text" class="form-control" id="Id_Trabajadores"  name="Id_Trabajadores" placeholder="" value="<?php echo $Id_Trabajador;?>">
</div>
</div>
<div class="form-group">
          <label for="Cedula" class="col-sm-2 control-label">Ingrese la cedula:</label>
          <div class="col-sm-10">
<input type="text" class="form-control" id="Cedula"  name="Cedula" value="<?php echo $Cedula;?>" placeholder="ingrese su cedula">
</div>
</div>
<div class="form-group">
<label for="Primer_Nombre" class="col-sm-2 control-label">Primer Nombre:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Pr_nombre" name="Pr_nombre"  value="<?php echo $Pr_nombre;?>"placeholder="ingrese el primer nombre">
</div>
</div>
<div class="form-group">
 <label for="Segundo Nombre" class="col-sm-2 control-label">Segundo Nombre:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Sg_nombre" name="Sg_nombre" value="<?php echo $Sg_nombre;?>" placeholder="ingrese el segundo nombre"> 
</div>
</div> 
<div class="form-group">
          <label for="Apellido Paterno" class="col-sm-2 control-label">Apellido Paterno:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Ap_Paterno" name="Ap_paterno" value="<?php echo $Ap_Paterno;?>" placeholder="ingrese el Apellido paterno">
</div>
</div>
<div class="form-group">
          <label for="Apellido Materno" class="col-sm-2 control-label">Apellido Materno:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Ap_Materno" name="Ap_materno" value="<?php echo $Ap_Materno;?>" placeholder="ingrese el Apellido materno">
</div>
</div>
<div class="form-group">
 <label for="Direccion" class="col-sm-2 control-label">Direccion:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Direccion" name="Direccion" value="<?php echo $Direccion;?>" placeholder="ingrese la Direccion"> 
</div>
</div>
<div class="form-group">
<label for="Estado_civil" class="col-sm-2 control-label">Estado Civil</label>
       <div class="col-sm-10">
    <select class="form-control" id="stado_civil" name="Estado_civil">
              <option value="SOLTERO">SOLTERO</option>
              <option value="CASADO">CASADO</option>
</select>
          </div>
           </div>
<div class="form-group">
<label for="Cargas_familiares" class="col-sm-2 control-label">Cargas familiares:</label>
<div class="col-sm-10">
    <select class="form-control" id="Cargas_familiares" name="Cargas_familiares">
              <option value="Si">Si</option>
              <option value=" Ninguno">Ninguno</option>
</select>
          </div>
           </div>
  <div class="form-group">
<label for="Nivel_estudios" class="col-sm-2 control-label">Nivel de estudios:</label>
<div class="col-sm-10">
    <select class="form-control" id="Nivel_estudios" name="Nivel_estudios">
              <option value=" Tecnico">Tecnico</option>
              <option value="Artesanal">Artesanal</option>
              <option value="Administrativo"> Administrativo</option>
              <option value="Administrativo">Tecnologo</option>
              <option value=" Ninguno">Ninguno</option>
</select>
          </div>
           </div>

  <div class="form-group">
<label for="Genero" class="col-sm-2 control-label">Genero:</label>
<div class="col-sm-10">
    <select class="form-control" id="Genero" name="Genero">
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>     
</select>
          </div>
           </div>
<div class="form-group">
 <label for="Telefono" class="col-sm-2 control-label">Telefono:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo $Telefono;?>" placeholder="ingrese el numero Telefonico">
</div>
</div>
<div class="form-group">
 <label for="Celular" class="col-sm-2 control-label">Celular:</label>
<div class="col-sm-10">
<input type="text"class="form-control" id="Celular" name="Celular" value="<?php echo $Celular;?>"placeholder="ingrese el numero Celular">
</div>
</div>
<div class="form-group">
 <label for="Email" class="col-sm-2 control-label">Email:</label>
<div class="col-sm-10">
<input type="email" class="form-control" id="Email" name="Email" value="<?php echo $Email;?>"placeholder="ingrese el Email">
</div>
</div>
<div class="form-group">
<label for="cargo" class="col-sm-2 control-label">Cargo:</label>
<div class="col-sm-10">
    <select class="form-control" id="cargo" name="Cargo">
              <option value="Administrativo"> Administrativo</option>
              <option value="Supervisor">Supervisor</option>
              <option value="Operador"> Operador </option>
              <option value=" Ninguno">Ninguno</option>
</select>
          </div>
           </div>
  <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <a href="index3.php" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-primary">Guardar</button> 
          </div>
        </div>
      </form>
    </div>



                                   
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
  </body>
</html>
