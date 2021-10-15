
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
    <title>Actualizar empleados</title>
    <style>
h1{
  font-family:Open;
}
    </style>
</head>

<body>
        <div id="agrupar">
        <header id="cabecera">
        <br>
        <br>
        <br>
        <br>
        <h1> <center>Actualizar</center> </h1>
        </header>
        <body background="../Pais/Imagenes/13.png">
        </body>
        <center>
          
            
     <?php
		if (isset($_GET['actualizar'])) {
			$editar_id = $_GET['actualizar'];
			$consulta=" SELECT * FROM empleados WHERE idempleados='$editar_id'";
			$ejecutar= mysqli_query($conexion,$consulta);
			$fila = mysqli_fetch_assoc($ejecutar);
			$id_tp=$fila["idempleados"];
			$nom=$fila["nombre"];
      $ape=$fila["apellido"];
      $tel=$fila["telefono"];
      $dir=$fila["direccion"];
           					
		}
	?>


	<form method="POST" action="" enctype="multipart/form-data">
    <br>
    <br>
    <br>
    <td>Nombre</td> 
    <input type="text" name="txtnombre" value="<?php echo $nom;?>">
    <br>
    <br>
    <br>
    <td>Apellido</td> 
    <input type="text" name="txtapellido" value="<?php echo $ape;?>">
    <br><br><br>
    <td>Telefono</td> 
    <input type="text" name="txttelefono" value="<?php echo $tel;?>">
    <br><br><br>
    <td>Direccion</td> 
    <input type="text" name="txtdireccion" value="<?php echo $dir;?>">
    <br><br><br>
    <input type="submit" name="actualizar" value="Actualizar Datos">		
	</form>

<?php
	if (isset($_POST['actualizar'])){
		if('txtFoto'){
			$nom=$_POST['txtnombre'];
      $ape=$_POST['txtapellido'];
      $tel=$_POST['txttelefono'];
      $dir=$_POST['txtdireccion'];
			$actualizar="UPDATE empleados SET nombre ='$nom', apellido='$ape',telefono='$tel',direccion='$dir' WHERE idempleados='$editar_id'";
			$ejecutar= mysqli_query($conexion, $actualizar) or die(mysqli_error());	
		}	
		
		else{
      $nom=$_POST['txtnombre'];
      $ape=$_POST['txtapellido'];
      $tel=$_POST['txttelefono'];
      $dir=$_POST['txtdireccion'];
			$actualizar="UPDATE empleados SET nombre ='$nom', apellido='$ape',telefono='$tel',direccion='$dir' WHERE idempleados='$editar_id'";
			$ejecutar= mysqli_query($conexion, $actualizar) or die(mysqli_error());	
		}
			echo "<script>alert('Datos Actualizados')</script>";
			echo "<script>window.open('select.php','_self')</script>";
	}	
?>
    
    <BR>
    <BR>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    

  
    <footer id="pie">
        DANNA LILIANA GARCIA AGUILAR-ADSI - Derechos Reservados &COPY; 2021

    </footer>
</body>
                      
</html>