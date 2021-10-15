<?php
session_start();
require_once('../Conexiones/conexion.php');
?>
<html>
 

<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../estilos.css">

 </head>
  <style>
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
  max-width: 400px;
  background-color:#1C92B8;
  margin: 0 auto;
}
p{
    font-family:lato;
   
}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>

  button{
  width:250px;
  font-family:roboto;
  }
  *{
  margin:0;
  padding:0;
  box-sizing:border-box;

  }
  body{
    background:url(../Imagenes/logo.jpg);
    background-size:100vw 100vh;
    background-repeat: no-repeat;
}

.capa{
  position:absolute;
  width:100%;
  height:100vh;
  background: rgba(0,0,0,0,3);
  z-index:-1;
  top:0;left:0;
}
*{
  padding:0;
  margin:0;

}
a{
  text-decoration:none;
  color:black;
}
body{
  font-family:reboto;
  
}
ul{
  
  top:50px;
  position:absolute;
  width:100%;
}
ul{
  list-style:none;
}
img{
  width:40px;
}
input[type="checkbox"]
{
display:none;
}
nav{
  background-color:rgba(16,16,16,.5);
  width:350px;
  height:100%;
  left:-350px;
  position:absolute;
  transition:all .5s;

}
input[type="checkbox"]:checked ~ nav
{
transform:translateX(350px);
}
 a{
   
   display:block;
   padding:20px 5px;
   color:white;
 }
 a:hover{
   background-color: rgb(176,224,230);
   color:black;
 }
 label{
  
   padding:15px;
   position:absolute;
   z-index:1;
  
 }

    </style>
  <header>
</header>
<div>
<input type="checkbox" id="chec">
<label for="chec">
<img src="../imagenes/icono.jpg">
</label>
<nav>
      <ul>
      <h2><li><a href="../alumnos/insert.php">Alumnos</a></li>
      <li><a href="../examen/insert.php">Examen</a></li>
      <li><a href="../profesor/insert.php">Profesor</a></li>
      <li><a href="../matricula/insert.php">Matricula</a></li>
      <li><a href="../practica/insert.php">Practica</a></li>
      <li><a href="../Tipopractica/insert.php">Tipo practica</a></li>
      <li><a href="../tipoprueba/insert.php">Tipo prueba</a></li>
      <li><a href="../Reportes/reportes_conpa1.php">Reportes Con Parametros 1</a></li>
      <li><a href="../Reportes/reportes_conpa2.php">Reportes Con Parametros 2</a></li>
      <li><a href="../Reportes/reportessin_para.php">Reportes Sin Parametros </a></li>

      <li><a href="../Cerrar/salir.php">Cerrar Sesion</a></li>
     
    </ul>
    </nav>
</div>
</body>
</html>
  
  
  </style>
 <body>
       <div id="menu">
        <header id="cabecera">
             <br>
            <h1> Reportes con parametros 2</h1>

        </header>  
<hr>

<br>
<br>
<br>

<center>
    <div class="table">
    <table width:"80%" border="1" style="background:#34A0CF">
    
    <tr>
    <td>Nombre</td>
    <td>Usuario</td>
    <td>Contraseña</td>
    </tr>
    </center>

<?php
$buscado = $_GET['txtusuario'];
$consulta = "select * FROM  usuario WHERE nombre_usuario like '%$buscado%'";
$sql=mysqli_query($conexion, $consulta);
while($datos = mysqli_fetch_array($sql)){
    echo'<tr>';
    echo '<td>'.$datos[1].'</td>';
    echo '<td>'.$datos[2].'</td>';
    echo '<td>'.$datos[3].'</td>';
    echo '</tr>';

}
?>
</table>
<footer id="pie">
  

</footer>
</center>
</html>