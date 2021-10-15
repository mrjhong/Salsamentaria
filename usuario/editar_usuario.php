<style>
    /*estilos para formulario de registro*/
    .form.register{
            width:450px;
            margin:auto;

        }
        .form_register h1{
            color:white;
            text-align:center;
           
        }
        hr{
            border:0;
            background:#CCC;
            height:1px;
            margin:10px 0;
            display:block;
        }
        form{
            background:#FFF;
            margin:auto;
            width:250px;
            padding:20px 50px;
            border:1px solid #d1d1d1;
        }
        label{
            display:block;
            font-size:12pt;
            font-family:'GothamBook';
            margin:15px auto 5px auto;
        }
        input,select{
             display:block;
             width:100%;
             font-size;11pt;
             padding:5px;
             border:1px solid #85929e;
             border-radius:5px;
             }
        .btn_save{
            text-align:center;
            font-size:12 pt;
            background:#12a4c6;
            padding:10px;
            color:#FFF;
            letter-spacing:1px;
            border:0;
            cursor:pointer;
            margin:15px auto;
        }
        .alert{
          width:25%;
          background:#66e07d66;
          border: radius 6px;
          margin:20px auto;
        }
        .msg_error{
            color:#e65656;
        }
        .msg_save{
            color:#126e00;
        }
        .alert p{
            padding:10px;

        }
        h1{
            text-align:center;
        }
        /*estilo para options de rol*/
        .notItemOne option:first-child{
            display:none;
        }
</style>
<?php  

include "../Conexiones/conexion.php";
/*Cod de actualizar*/
if(!empty($_POST))
{

$alert='';
if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['rol']))
    {
     $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
}else{
        $idUsuario  = $_POST['id'];
        $nombre       = $_POST['nombre'];
        $email        = $_POST['correo'];
        $user         = $_POST['usuario'];
        $contrasena   = $_POST['contrasena'];
        $rol          = $_POST['rol'];

    //echo "SELECT * FROM usuario WHERE usuario ='$user' OR correo ='$email' ";
    /*este query devuelve un resultado de bd*/
    $query = mysqli_query($conection,"SELECT * FROM usuario
                                      WHERE (usuario ='$user' AND idusuario != $idUsuario)
                                      OR (correo ='$email' AND idusuario != $idUsuario) ");
                                   
    $result = mysqli_fetch_array($query);
   // $result = count($result);

    if($result > 0){
    $alert='<p class="msg_error">El correo o el usuario ya existe</p>';
    }else{

     if(empty($_POST['contrasena']))
     {
         $sql_update = mysqli_query($conection,"UPDATE usuario
                                               SET nombre ='$nombre', correo='$email', usuario ='$user', rol='$rol'
                                               WHERE idusuario = $idUsuario ");
     }else{
        $sql_update = mysqli_query($conection,"UPDATE usuario
                                SET nombre ='$nombre', correo='$email', usuario ='$user', contrasena ='$contrasena',rol='$rol'
                                WHERE idusuario = $idUsuario ");
     }
    if($sql_update){
    $alert='<p class="msg_save">Usuario actualizado correctamente</p>';
    }else{
    $alert='<p class="msg_save">Error al actualizado el usuario</p>';
           }                                              
        }
    }
}
/*Mostrar datos del usuario*/
if(empty($_REQUEST['id']))
{
    header('Location: lista_usuario.php');
    mysqli_close($conection);
}
$iduser = $_REQUEST['id'];

$sql = mysqli_query($conection,"SELECT u.idusuario, u.nombre, u.correo,u.usuario, (u.rol) as idrol, (r.nombre_rol) as rol
                               FROM usuario u
                               INNER JOIN rol r 
                               on u.rol = r.idrol
                               WHERE idusuario = $iduser AND estatus = 1");
 mysqli_close($conection);
 $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
         header('Location: lista_usuario.php');
    }else{
        $option = '';
        while($data = mysqli_fetch_array($sql)) {

        $iduser   = $data['idusuario'];
        $nombre   = $data['nombre'];
        $correo   = $data['correo'];
        $usuario  = $data['usuario'];
        $idrol    = $data['idrol'];
        $rol      = $data['rol'];

    if($idrol == 1){
        $option ='<option value="'.$idrol.'"select>'.$rol.'</option>';
    }else if ($idrol == 2){
        $option ='<option value="'.$idrol.'"select>'.$rol.'</option>';
    }else if ($idrol == 3){
        $option ='<option value="'.$idrol.'"select>'.$rol.'</option>';
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
<?php include "../includes/scripts.php"; ?>
<title>Actualizar usuario</title>
</head>
<body>
<?php include "../includes/header.php"; ?>
<?php include "../includes/nav.php";?>
<br>
<br>
<section id="container">

<div class="form_register"> 
    <br>
    <br>
    <br>

<center><h1>Actualizar usuario</h1>
    <hr>
    <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>

        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $iduser; ?>">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id ="nombre" placeholder="Nombre completo" value="<?php  echo $nombre; ?>">
        <label for="correo">Correo electronico</label>
        <input type="email"name="correo" id="correo" placeholder="Correo electronico" value="<?php  echo $correo; ?>">
        <label for="usuario" >Usuario</label>
        <input type="text"name="usuario" id="usuario" placeholder="Usuario" value="<?php  echo $usuario; ?>">

        <label for="contrasena">Contrasena</label>
        <input type="password" name="contrasena" id="contrasena" placeholder="contrasena">
        <label for="rol">Tipo usuario</label>
         <?php
        include "../Conexiones/conexion.php";
        $query_rol =mysqli_query($conection,"SELECT * FROM rol");
        $result_rol=mysqli_num_rows($query_rol);
           ?>
        <select name="rol" id="rol" class="notItemOne">
        <?php
        echo $option;
        if($result_rol > 0)
           {
        while($rol = mysqli_fetch_array($query_rol)){
        ?>
        <option value="<?php  echo $rol["idrol"]; ?>"><?php echo $rol ["nombre_rol"]; ?></option>
        <?php

            }
 
         }
 ?>
        </select>
        <input type="submit" value="Actualizar usuario" class="btn_save">
    </form>
    <br>
    <br>
    <br>
    <center><a href="lista_usuario.php" style="color:white;"><h5><i class="fas fa-angle-double-left"></i></h5></a></center>

</div>


</section>
<?php include "../includes/footer.php"; ?>
</body>
</html>