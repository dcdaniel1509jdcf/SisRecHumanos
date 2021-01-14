<?php
include('../conexion.php');
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('America/Guayaquil');
?>
<!doctype html>
<html lang="es">
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <script language="javascript" type="text/javascript"></script>
  </head>

<body>
  <div class="container">
 <form class="form-horizontal" method="POST" action="<?php echo ($_SERVER['PHP_SELF']); ?>" >
    <div class="row">
        <div class='col-sm-4'>

                <div class="form-group">
                    <label for="Cedula" class=" control-label">Seleccione el trabajador:</label>
                    <div class="">
                        <select class="form-control" id="Cedula" name="Cedula">
                        <option value="0">Seleccione:</option>
                        <?php
                
                            $query = mysqli_query($conn,"SELECT * FROM trabajadores");
                            while ($valores = mysqli_fetch_array($query)) {
                
                            echo '<option value="'.$valores['Id_Trabajadores'].'">'.$valores['Cedula'].' - '.$valores['Pr_nombre'].' '.$valores['Ap_Paterno'].'</option>';
                            }
                            ?>
                        </select><br>            
                    </div>
                </div>

        </div>
        <div class='col-sm-4'>
                <div class="form-group">
                    <label for="Cedula" class=" control-label">Fecha Inicio:</label>
                    <div class=''>
                    <input type="date" class="form-control" id="Fechai"  name="Fechai" >             
                    </div>
                </div>
        </div>
        <div class='col-sm-4'>
                <div class="form-group">
                    <label for="Cedula" class=" control-label">Fecha Final:</label>
                    <div class="">
                    <input type="date" class="form-control" id="Fechaf"  name="Fechaf" >           
                    </div>
                </div>
        </div>
    </div>
    <div class='row center'>
    <input type="submit" name="Buscar" value="Cargar" class="btn btn-primary"> <br>
    <a href="desempeño.php"><input class="btn btn-primary" type="button" value="Salir"></a><br><br>

    </div>
</form>        
<hr>
<?php
  if (isset($_POST['Buscar']) and !empty($_POST['Fechai']) and !empty($_POST['Fechaf']) and !empty($_POST['Cedula'])) {
      $fecha1=strtotime($_POST['Fechai']);
      $per=$_POST['Cedula'];
      $fecha2=strtotime($_POST['Fechaf']);
      $fechai= date("Y-m-d", $fecha1);
      $fechaf= date("Y-m-d", $fecha2);
      $totalRecon=0;
      $totalcortes=0;
      $consulta2=mysqli_query($conn, "SELECT Pr_nombre,Sg_nombre,Ap_Paterno,Ap_Materno FROM `trabajadores` where Id_Trabajadores=$per");
      $filas2=mysqli_fetch_array($consulta2);
      $infoTrabajador=$filas2[0].' '.$filas2[1].' '.$filas2[2].' '.$filas2[3];
       ?>        
            <table id="tblData" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                        <tr>
                        <th>Trabajador </th>
                        <th><?php echo $infoTrabajador ?></th>
                        </tr>
                        
                            <tr>
                            <th>ID </th>
                                <th>Fecha</th>
                                <th>Tarea</th>
                                <th>Cantidad</th>
                                <th>Avance</th>
                                <th>Novedades</th>
                                <th>Porcentaje%</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$consulta=mysqli_query($conn, "SELECT desempeno.Id_desempeno,desempeno.Fecha ,tareas.Tareas,asignacion_tarea1.cantidad,desempeno.Avance,desempeno.Novedades,desempeno.Porcentaje FROM desempeno,trabajadores,asignacion_tarea1,tareas where trabajadores.Id_Trabajadores=desempeno.Id_Trabajadores and asignacion_tarea1.Id_asignacion = desempeno.Id_asignacion and asignacion_tarea1.Id_tareas=tareas.Id_tareas and desempeno.Id_Trabajadores=$per and desempeno.Fecha BETWEEN '$fechai' AND '$fechaf'");
      while ($filas=mysqli_fetch_array($consulta)) {
          $Id=$filas[0];
          $Fecha=$filas[1];
          $Tarea=$filas[2];
          $Cantidad=$filas[3];
          $Avance=$filas[4];
          $Novedades=round($filas[5], 2);
          $Porcentaje=round($filas[6], 2); ?>   
              <tr>
               <td width="300"><?php echo $Id ?></td>
                <td width="250"><?php echo $Fecha ?></td>
                  <td width="250"><?php echo $Tarea ?></td>
               <td width="250"><?php echo $Cantidad ?></td>
               <td width="250"><?php echo $Avance ?></td>
               <td width="250"><?php echo $Novedades ?></td>  
               <td width="250"><?php echo $Porcentaje ?></td>          
             
                          </tr>
    <?php
    if ($Tarea=='Reconexiones'){
        $totalRecon=$totalRecon + $Porcentaje;
    } 
    if ($Tarea=='Cortes'){
$totalcortes=$totalcortes+$Porcentaje;
    } 
    } 
      ?>
      <tr>
               <td width="300">Total Recon</td>
                <td width="250"><?php echo $totalRecon ?></td>
                  <td width="250">Total Cortes</td>
               <td width="250"><?php echo $totalcortes ?></td>
                          </tr>
                        </tbody> 
                       </table>
                       <button class='btn btn-primary' onclick="exportTableToExcel('tblData','Reporte Generado <?php echo $Fecha ?>')">Descargar en XLS</button>
        </div>  
<?php
  }?>
    </div>
  </body>
  <script>
    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
    }
  </script>
</html>
<script type="text/javascript" src="../Desempeño/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../Desempeño/js/bootstrap.min.js"></script> 
