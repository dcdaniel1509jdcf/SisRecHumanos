<htm>
<head>	
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Subir Archivos</title> 
   <center><h1>Subir Archivos</h1></center>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">        
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css"> 	
</head>
<body>
<center><table border=4>
	<thead>
	<td>	
	<form method="POST" action="CargarArchivos.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Cargar Archivos" class="btn btn-primary btn-sm">
    </form>
    </td>
    </thead>
</table></CENTER><br>
<table border=2>
	<h1>VISUALIZACIÓN DE ARCHIVOS<h1>
		<?php
// Esto devolverá todos los archivos de esa carpeta
$archivos = scandir("subidas");
$num=0;
for ($i=2; $i<count($archivos); $i++)
{$num++;
?>
<!-- Visualización del nombre del archivo !-->     
    <tr>
      <th scope="row"><?php echo $num;?></th>
      <td><?php echo $archivos[$i];?></td>
      <td><a title="Descargar Archivo" href="subidas/<?php echo $archivos[$i]; ?>" download="<?php echo $archivos[$i]; ?>" style="color: blue; font-size:18px;"> <input type="button" class="btn btn-primary btn-sm" value="Descargar"> </a></td>
      <td><a title="Eliminar Archivo" href="Eliminar.php?name=subidas/<?php echo $archivos[$i]; ?>" style="color: red; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <input type="button" class="btn btn-primary btn-sm" value="Eliminar"> </a></td><br>
    </tr>
 <?php }?>
</table>
                           <form action="../inicio.php" method="POST" >
<right><input width="80" type="image" name="submit" src="../img/regresar.jpg"></right>
</form>                      

</body>
</htm>


