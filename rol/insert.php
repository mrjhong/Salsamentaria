<?php
//Conexión con PHP
include("../Conexiones/conexion.php");
?>
<style>
table {
   width: 100%;
}
th, td {
   width: 25%;
}
.boton{
        font-size:10px;
        font-family:;
        font-weight:bold;
        color:white;
        background:blue;
        border:0px;
        width:80px;
        height:20px;
       }
       input{
           color:black;
           border:5px;
           font-size:16px;
           font-family:Britannic;
           
           
       }
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
  max-width: 290px;
  background-color:#3A0D55;
  margin: 0 auto;
}
       

</style>
<!DOCTYPE html>
<html lang="en" style="font-family: Arial, Helvetica, sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Rol</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
</head>


<body background="../Pais/Imagenes/13.png">
<br>
<br>
<br>
         <center><h1 style="color:white">Ingrese rol</h1></center>
         <br>
         <br>

         <form name="form" action="insert.php" method="post" enctype="multipart/form-data">
         <br>
         <br>

        <table align="center" border ="0">		
        <tr>
        <td>
      
        <tr>
             <td>
             <center>
             <h3 style = "color:white"> Id Rol</h3>
             </td>
			<td><input type="text" name="txtidrol"></td>
			</tr>
             <tr>
             <td>
             <center>
             <h3 style = "color:white">Rol</h3>
             </td>
			<td><input type="text" name="txtrol"></td>
			</tr>
           
           
             <td>

            <center><input type="submit" name="Enviar" value="Insertar"><br>
           
    
            <a href="select.php" style="color: white ;"><h5><b>VER</b></h5></a>
</form>
				
<?php 
        if (isset($_POST['Enviar'])) {
        $sql='INSERT INTO rol (idrol,nombre_rol) values(
            "'.$_POST['txtidrol'].'",
            "'.$_POST['txtrol'].'")';
        	
		 $id= mysqli_insert_id($conexion);
		$result= mysqli_query($conexion, $sql) or die(mysqli_error("Error de conexion"));
		
		 }						
 ?>
    
           
</body>

</html>