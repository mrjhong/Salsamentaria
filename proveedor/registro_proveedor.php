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
session_start();
include "../Conexiones/conexion.php";
if(!empty($_POST))
{

    $alert='';
    if(empty($_POST['proveedor']) || empty($_POST['contacto']) || empty($_POST['telefono']) ||  empty($_POST['direccion']))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
    }else{
       
        $proveedor       = $_POST['proveedor'];
        $contacto        = $_POST['contacto'];
        $telefono        = $_POST['telefono'];
        $direccion       = $_POST['direccion'];
        $usuario_id      = $_SESSION['idUser'];
        //echo "SELECT * FROM usuario WHERE usuario ='$user' OR correo ='$email' ";

    $query_insert = mysqli_query($conection,"INSERT INTO proveedor(proveedor,contacto,telefono,direccion,usuario_id)
                                             VALUES('$proveedor','$contacto','$telefono','$direccion','$usuario_id')");
    if($query_insert){
        $alert='<p class="msg_save">Proveedor creado correctamente</p>';
    }else{
         $alert='<p class="msg_save">Error al crear proveedor</p>';
           }                                              
    }
    mysqli_close($conection);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/scripts.php"; ?>
    <title>Registro proveedor</title>
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

<center><h1>Registro proveedor</h1>
    <hr>
    <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>

    <form action="" method="post">
        <label for="proveedor"> Proveedor</label>
        <input type="text" name="proveedor" id ="proveedor" placeholder="Proveedor">
        <label for="contacto">Contacto</label>
        <input type="text"name="contacto" id="contacto" placeholder= "Contacto">
        <label for="telefono" >Telefono</label>
        <input type="number"name="telefono" id="telefono" placeholder="Telefono">
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion" placeholder="Direccion">
        <input type="submit" value="Crear proveedor" class="btn_save">
    </form>
    <br>
    <br>
    <br>
    <center><a href="lista_proveedor.php" style="color:white;"><h5><b><i class="fas fa-angle-double-right"></i></b></h5></a></center>

</div>


</section>
<?php include "../includes/footer.php"; ?>
</body>
</html>