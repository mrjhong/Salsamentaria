<?php
//Conexión con PHP
include("../Conexiones/conexion.php");
?>
<style>

</style>
<!DOCTYPE html>
<html lang="en" style="font-family: Arial, Helvetica, sans-serif;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Insertar empleado</title>
</head>

    <body background="../examenes/Imagenes/fondo.jpg">
    <br>
    <br>

    <center><h1 style="color:black">Ingrese datos</h1></center>
    <center>
        <br>
        <br>
        <br>
        <br>
    <form name="form" action="insert.php" method="post"enctype="multipart/form-data">    
    <p>Nombre <br>
    <br>
    <input type="text" name ="txtnombre" size= "10"></p>
    <p>Apellido <br>
    <br>
    <input type="text" name ="txtapellido" size= "25"></p>
    <p>Telefono <br>
    <br>
    <input type="text" name ="txttelefono" size= "25"></p>
    <p>Direccion <br>
    <br>
    <input type="text" name ="txtdireccion" size= "25"></p>
  
    <?php 
        if (isset($_POST['Enviar'])) {
        $sql='insert into empleados(nombre,apellido,telefono,direccion) values
        ("'.$_POST['txtnombre'].'",
        "'.$_POST['txtapellido'].'",
        "'.$_POST['txttelefono'].'",
        "'.$_POST['txtdireccion'].'")';
        $result = mysqli_query($conexion,$sql) or die(mysqli_error());
        $id= mysqli_insert_id($conexion);
       $result= mysqli_query($conexion, $sql) or die(mysqli_error("Error de conexion"));
        }						
     ?>	
        

<br><br>
		<input type="submit" name="Enviar" value="Insertar">
		<br>
		<br>
		<center><a href="select.php" style="color:black"><h3>VER</h3></a></center>
           
        </form>
        </body>

</html>