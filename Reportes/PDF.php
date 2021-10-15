<?php
//Conexión con PHP
include("../Conexiones/conexion.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documento 1</title>
</head>
<body>
   <div id= "cuadro">
    <h1>Reportes en PDF ADSI 2056751</h1>
    <br>
    <br>
    <table width="500px" cellpadding="8px" border="1">
    <tr bgcolor="blue">
    <td>1</td>
    <td>2</td>
    <td>3</td>
    </tr>
    <tr>
   <td>Nombre</td>
    <td>Usuario</td>
    <td>Contraseña</td>
    </tr>
    <?php
    $consulta="select * from usuario";
    $sql=mysqli_query($conexion,$consulta);  
    while($datos=mysqli_fetch_array($sql)){
        echo '<tr>';
        echo '<td>'.$datos[1].'</td>';
        echo '<td>'.$datos[2].'</td>';
        echo '<td>'.$datos[3].'</td>';
        echo '</tr>';
    }
    ?>
  </table>
  <a href="reportessin_para.php">Generar PDF</a>
    </div>
</body>
</html>