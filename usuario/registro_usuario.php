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
</style>
<?php  

include "../Conexiones/conexion.php";
if(!empty($_POST))
{

    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) ||  empty($_POST['contrasena']) || empty($_POST['rol']))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
    }else{
       
        $nombre       = $_POST['nombre'];
        $email        = $_POST['correo'];
        $user         = $_POST['usuario'];
        $contrasena   = $_POST['contrasena'];
        $rol          = $_POST['rol'];

        //echo "SELECT * FROM usuario WHERE usuario ='$user' OR correo ='$email' ";
        $query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario ='$user' OR correo ='$email' ");
        $result = mysqli_fetch_array($query);

        if($result > 0){
            $alert='<p class="msg_error">El correo o el usuario ya existe</p>';
        }else{
          $query_insert = mysqli_query($conection,"INSERT INTO usuario(nombre,correo,usuario,contrasena,rol)
                                                          VALUES('$nombre','$email','$user','$contrasena','$rol')");
           if($query_insert){
            $alert='<p class="msg_save">Usuario creado correctamente</p>';
           }else{
            $alert='<p class="msg_save">Error al crear el usuario</p>';
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
    <?php include "../includes/scripts.php"; ?>
    <title>Registro de usuarios</title>
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

<center><h1>Registro usuario</h1>
    <hr>
    <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>

    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id ="nombre" placeholder="Nombre completo">
        <label for="correo">Correo electronico</label>
        <input type="email"name="correo" id="correo" placeholder="Correo electronico">
        <label for="usuario" >Usuario</label>
        <input type="text"name="usuario" id="usuario" placeholder="Usuario">

        <label for="contrasena">Contrasena</label>
        <input type="password" name="contrasena" id="contrasena" placeholder="contrasena">
        <label for="rol">Tipo usuario</label>
         <?php
        $query_rol =mysqli_query($conection,"SELECT * FROM rol");
        $result_rol=mysqli_num_rows($query_rol);

       

        

           ?>



        <select name="rol" id="rol">
            <?php
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
        <input type="submit" value="Crear usuario" class="btn_save">
    </form>
    <br>
    <br>
    <br>
    <center><a href="lista_usuario.php" style="color:white;"><h5><b><i class="fas fa-angle-double-right"></i></b></h5></a></center>

</div>


</section>
<?php include "../includes/footer.php"; ?>
</body>
</html>