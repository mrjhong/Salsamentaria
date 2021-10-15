<?php
//Conexión con PHP
include("../Conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en" style="font-family: Arial, Helvetica, sans-serif;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Rol</title>¨
    <style>
        li{
            list-style: none;
        }
        li a{
            background-color: #FAFA;
            border: 2px purple solid;
        }
        ul li > a{
            float: left;
            padding: 35px;
            text-decoration: none;
            color: black;
            font-weight: bolder;
            font-size: 20px;
        }
        ul li > a:hover{
            background-color: #FACA;
            border-radius: 3rem;
            transition: background-color, border-radius .2s ease-in-out;
        }
        table {
   width: 100%;
   border: 1px solid #000;
}
th, td {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
    padding: 0.3em;
}
nav{
    padding:0;
    margin:0;
    border:2;
    position:center;
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
table{
    width:80%;
    height:60%;
}

    </style>
</head>

<body>
    <!--Conexión PHP-->
    <?php
    //Conexión con PHP
    include("../Conexiones/conexion.php");
    ?>
    <div id="agrupar">
        <header id="cabecera">
        <br>
        <br>
        <br>
        <br>
            <h1 style="color:white"> <center>Seleccione Usuario  </center> </h1>
        </header>
        <body background="../Pais/Imagenes/13.png">
        </body>
        <center>
      
            <br>
            <br>
            <br>
            <br>
            <form method="POST" action="select.php" method="post" enctype="multipart/form-data">
            <table width:"80%" border="5" style="background:black">
            <br>
            <br>
            <br>
            <tr align="center">
                <tr bgcolor="#5C1587">

                <td style="padding: 10px">
                        <b>Id Rol </b></td>
                        <td><b>Nombre Rol</b></td>
                        <td><b>Actualizar</b></td>
                        <td><b>Eliminar</b></td>
                </tr>
                   
                    <?php
                    $consulta = "SELECT * FROM rol";
                    $ejecutar = mysqli_query($conexion, $consulta);
                    $i = 0;
                    while($Fila = mysqli_fetch_assoc($ejecutar)) {
                       
                        $id_r = $Fila['id_rol'];
                        $n_rol = $Fila['nombre_rol'];
        
                        
                        $i++;

                    ?>
     

<tr align="center">
<td bgcolor="white"><?php echo $id_r;?></td>
<td bgcolor="white"><?php echo $n_rol;?></td>



<td bgcolor="white">
	<a href="update.php?actualizar=<?php echo $id_r; ?>">Actualizar</a></td>
<td bgcolor="white">
	<a href="select.php?eliminar=<?php echo $id_r; ?>">Eliminar</a>
</td>
</tr>
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
				$eliminar="DELETE FROM rol WHERE id_rol='$borrar_id'";
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