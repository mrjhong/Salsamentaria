<?php
//Conexión con PHP
include("../Conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en" style="font-family: Arial, Helvetica, sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<style>
h1{
  font-family:Open;
}
td{
  font-family:Open;
  font-size:13px;
}
</style>



    <div id="agrupar">
    <header id="cabecera">
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 style="color:black"> <center>Lista de empleados</center> </h1>
    </header>
    <body background="../Pais/Imagenes/13.png">
    </body>
    <center>
      
        <br>
        <br>
        <br>
        <br>
        <form method="POST" action="select.php" method="post" enctype="multipart/form-data">
        <table width="80%" border="1 solid" style="background:#34A0CF">
        <tr align="center">
        <tr bgcolor="#608AEA">

        <td><b><center>Id</b></td>
        <td><b><center>Nombre</b></td>
        <td><b><center>Apellido</b></td>
        <td><b><center>Telefono</b></td>
        <td><b><center>Direccion</b></td>
        <td><b><center>Actualizar</b></td>
        <td><b><center>Eliminar</b></td>
        </tr>
                   
             <?php
             $consulta = "SELECT * FROM empleados";
             $ejecutar = mysqli_query($conexion, $consulta);
             $i = 0;
             while($Fila = mysqli_fetch_assoc($ejecutar)) {
                       
             $id_e = $Fila['idempleados'];
             $nom = $Fila['nombre'];
             $ape = $Fila['apellido'];
             $tel = $Fila['telefono'];
             $dir = $Fila['direccion'];
                      
              $i++;

            ?>

      <tr align="center"></tr>
      <td bgcolor="white"><?php echo $id_e; ?></td>
      <td bgcolor="white"><?php echo $nom; ?></td>
      <td bgcolor="white"><?php echo $ape; ?></td>
      <td bgcolor="white"><?php echo $tel; ?></td>
      <td bgcolor="white"><?php echo $dir; ?></td>
     
     
      
      


      
      <td bgcolor="white"><a href="update.php?actualizar=<?php echo $id_e; ?>"><p style="color:black;"><center><i class="fas fa-edit"></p></a></td>
      <td bgcolor="white"><a href="select.php?eliminar=<?php echo $id_e; ?>"><p style="color:black;"><center><i class="far fa-trash-alt"></i></p></a></td>
      </tr>';

     <?php } ?>
     </table>
     <?php
	    if (isset($_GET['actualizar'])){
			include("update.php");
		}
		?>

		<?php
			if (isset($_GET['eliminar'])) {
				$borrar_id=$_GET['eliminar'];
				$eliminar="DELETE FROM empleados WHERE idempleados='$borrar_id'";
				$ejecutar= mysqli_query($conexion, $eliminar);

				if($ejecutar){
					echo "<script>alert('El dato ha sido eliminado')</script>";
					echo "<script>window.open('select.php','_self')</script>";
				}
			}
		?>
            </form>
           </center>
    </div>
    </body>

</html>