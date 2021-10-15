<?php
//Conexión con PHP
include("../Conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actualizar Rol</title>
</head>
<body background="../departamento/imagenes/puente.jpg">
</body>
<style>

body {
  margin: 0;
  padding: 0;
  background:url(../Imagenes/login.jpg);
  background-repeat: no-repeat;
  background-size:100vw 100vh;

}
input{
    border-radius:5px;
}
h1{
    font-style:negrita;
    font-family:lato;
	text-align: center;
	margin: 0 0 0.25rem 0;
	padding: 0;
	font-size: 1.5rem;
	}
}
input{
  
		padding: 10px 20px;
		border: 4px solid white;
		margin: 0 1.5rem;
		background-color: transparent !important;
		color: #ff8473;
       
	
}
form{
  padding: 60px;
  max-width: 355px;
  background-color:#3A0D55;
  margin: 0 auto;
}
    
</style>
<?php
		if (isset($_GET['actualizar'])) {
			$editar_id = $_GET['actualizar'];
			$consulta=" SELECT * FROM rol WHERE id_rol='$editar_id'";
			$ejecutar= mysqli_query($conexion, $consulta);
			$fila=mysqli_fetch_assoc($ejecutar);
			$id_r=$fila["id_rol"];
			$n_rol=$fila["nombre_rol"];
		
		}

	?>
   <center>
   <br>
   <br>
   <br>
   <h1 style="color:white"> Actualizar 
   <br>
   <br>
   <br>
   <br>
        <form method="POST" action="" enctype="multipart/form-data">

			
		<label style="color:white">Id Rol</label>
 		<input type="text" name="txtidrol" value="<?php echo $id_r;?>">
 		<br><br>
       

		<label style="color:white">Nombre Rol </label>
 		<input type="text" name="txtrol" value="<?php echo $n_rol;?>">
 		<br><br>
	

        <input type="submit" name="actualizar" value="Actualizar Datos">

	
		</center>
	    </form>
	
	
	    <?php
		if (isset($_POST['actualizar'])){
		if('txtFoto'){
			
			
			$id_r = $_POST['txtidrol'];
			$n_rol = $_POST['txtrol'];
			
			$actualizar="UPDATE rol SET id_rol ='$id_r', nombre_rol ='$n_rol'  WHERE id_rol='$editar_id'";
			echo $actualizar;
			$ejecutar= mysqli_query($conexion, $actualizar) or die(mysqli_error());	
		}	
				
		
		else{
            $actualizar="UPDATE rol SET id_rol ='$id_r', nombre_rol ='$n_rol'  WHERE id_rol='$editar_id'";
			echo $actualizar;
			$ejecutar= mysqli_query($conexion, $actualizar) or die(mysqli_error());	
		}
			echo "<script>alert('Datos Actualizados')</script>";
			echo "<script>window.open('select.php','_self')</script>";
	}	
	?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	


<footer id="pie">
<center><label style="color:white">DANNA LILIANA GARCIA AGUILAR -SENA - Derechos Reservados &COPY; 2021</label><center>
</body>
</html>