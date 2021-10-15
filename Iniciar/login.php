<?php
session_start();
include("../Conexiones/conexion.php");
?>
<style>
body{
background:url(../Imagenes/login.png)repeat fixed;
background size:100 vw 100 vh;
font-family: 'FontAwesone, Open Sans', sans-serif;
font-weight: 200;
width: 100%;
height: 100%;
}
.reestablecer{
  position: relative;
  width: 40%;
  display: block;
  background: #FF7052;
  padding: 15px;
  color: #fff;
  font-size: 20px;
  font-family:Open;
}
  .input{
  
  width: 90%;
  margin: 15px auto;
 
  }
  input{
    width: 20%;
    padding: 10px 5px 10px 40px;
    display: block;
    border: 1px solid #EDEDED;
    border-radius: 4px;
    transition: 0.2s ease-out;
    color: darken(#EDEDED, 30%);
    font-family:Open;
  
  }
  .submit{
  width: 100px;
  height: 69px;
  display: block;
  margin: 0 auto -15px auto;
  background: #fff;
  border-radius: 100%;
  border: 1px solid #FF7052;
  color: #FF7052;
  font-size: 24px;
  cursor: pointer;
  box-shadow: 0px 0px 0px 7px #fff;
  transition: 0.2s ease-out;
  }
  .feedback{
  position: absolute;
  bottom: -70px;
  width: 100%;
  text-align: center;
  color: #fff;
  background: #2ecc71;
  padding: 10px 0;
  font-size: 12px;
  display: none;
  opacity: 0;
  }
   &:hover, &:focus{
    background: #FF7052;
    color: #fff;
    outline: 0;
  }
}
  &:before{
    bottom: 100%;
    left: 50%;
    border: solid transparent;
    content: "";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(46, 204, 113, 0);
    border-bottom-color: #2ecc71;
    border-width: 10px;
    margin-left: -10px;
    
  }
  span{
    position: absolute;
    display: block;
    color: darken(#EDEDED, 10%);
    left: 10px;
    top: 8px;
    font-size: 20px;
  }
  .IconUser{
    position: relative;
  }
  .fa {
  position:absolute;
  padding: 11px;
  right: 1px;
}
h3{
  font-family:Open;
  text-align:center;
}
h4{
  font-family:Open;
}
.p2{
  text-decoration:none;
}
.boton{
font-size:15px;
font-family:Open;
}
.button{
  position: relative;
  width: 10%;
  display:block;
  background: #FF7052;
  padding: 10px;
  color: #fff;
  font-size:15px;
  font-family:Open;
}
a{
text-decoration: none;
font:black;
font-family:Open;

}

</style>
<?php
$alert = '';


if(!empty($_SESSION['active']))
{
  header('location:../Iniciar/login.php');
}else{


if(!empty($_POST))
{
 if(empty($_POST['usuario']) || empty($_POST['contrasena']))
 {
   $alert ="Ingrese su usuario y  su contrasena";
 }else{

    require_once "../Conexiones/conexion.php";
    $user = $_POST['usuario'];
    $pass = $_POST['contrasena'];

    $query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario='$user' AND contrasena ='$pass'");
    $result = mysqli_num_rows($query);

    if($result > 0)
    {
    
      $data = mysqli_fetch_array($query);

     /*session_star();*/
     $_SESSION['active'] = true;
     $_SESSION['idUser'] = $data['idusuario'];
     $_SESSION['nombre'] = $data['nombre'];
     $_SESSION['email'] = $data['correo'];
     $_SESSION['user'] = $data['usuario'];
     $_SESSION['rol'] = $data['nombre_rol'];

     header('location:index.php');
     

    }else{
      $alert ='El usuario o la contrasena son incorrectos';
    session_destroy();
    }
 }

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesion | Sistema de Facturacion</title>
</head>
<body>
  <section id="container">
  <form  action="" method="post"> 
    <br>
    <br>
    <br>
    <h3>Iniciar Sesion | Sistema de Facturacion</h3>
    <hr>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center><input type="text" name ="usuario" placeholder="Ingrese usuario">
    <input type="password" name="contrasena" placeholder="Ingrese contrasena">
    <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>
    <br>
    <br>
    <input type="submit" value="Ingresar">
    <a href="../Usuario/editar_usuario.php"><p style="color:black">¿Olvidaste tu contraseña?</p></a>
    <a href="../Usuario/registro_usuario.php"><p style="color:black">Registrate</p></a>

  </form>

  </section>
</body>
</html>