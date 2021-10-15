<?php
/*restricciones por roles*/
//if($_SESSION['rol'] != 1)
//{
 //   header("location:index.php");
//}
session_start();
include "../Conexiones/conexion.php";

if(!empty($_POST))
    {
    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion']))
    {
      $alert='<p class="msg_error">Todos los campos son obligatorios</p>';

    }else{
   
        $nit        = $_POST['nit'];
        $nombre     = $_POST['nombre'];
        $telefono   = $_POST['telefono'];
        $direccion  = $_POST['direccion'];
        $usuario_id = $_SESSION['idUser'];

    $result = 0;
    if(is_numeric($nit) and $nit !=0)
        {
            $query = mysqli_query($conection,"SELECT * FROM cliente WHERE nit ='$nit' ");     
            $result=mysqli_fetch_array($query);
        }
    if($result > 0){
            $alert ='<p class="msg_error">El numero de NIT ya existe.</p>';
    }else{
        $query_insert = mysqli_query($conection,"INSERT INTO cliente(nit,nombre,telefono,direccion,usuario_id)
                                                 VALUES('$nit','$nombre','$telefono','$direccion','$usuario_id')");
            
    if($query_insert){
            $alert='<p class="msg_save">Cliente guardado correctamente.</p>'; 
    
    }else{
            $alert='<p class="msg_error">Error al guardar el cliente.</p>'; 
        }     
    }     
        mysqli_close($conection);                                                                       
    }

}



?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cliente</title>
    <?php include "../includes/scripts.php"; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">                                            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de clientes</title>
</head>
<body>
<?php include "../includes/header.php"; ?>
<?php include "../includes/nav.php"; ?>
    <style>
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
    </style>

<section id="container">
    

   <div class="form_register">
       <br>
       <br>
       <br>
       <br>
          <center><h1>Registro cliente</h1>
   <hr>
   <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>
<form action="" method="post">
    
    <label for="correo">NIT</label>
    <input type="number" name="nit" id="nit" placeholder ="Numero de NIT">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre completo">
    <label for="telefono">Telefono</label> 
    <input type="number" name="telefono" id="telefono" placeholder ="Telefono">
    <label for="direccion">Direccion</label> 
    <input type="text" name="direccion" id="direccion" placeholder ="Direccion completa">
    <input type="submit"  value="Guardar cliente"class="btn_save">

</form>
<br>
<br>
<br>

<center><a href="lista_clientes.php" style="color: white ;"><h5><b><i class="fas fa-angle-double-right"></i></b></h5></a></center>
   </div>

</section>
<?php include "../includes/footer.php"; ?>
</body>
</html>