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
if(empty($_POST['proveedor']) || empty($_POST['contacto'])  || empty($_POST['telefono']) || empty($_POST['direccion']))
{
     $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
}else{
        $idproveedor  = $_POST['id'];
        $proveedor    = $_POST['proveedor'];
        $contacto     = $_POST['contacto'];
        $telefono     = $_POST['telefono'];
        $direccion    = $_POST['direccion'];
     
    $sql_update = mysqli_query($conection,"UPDATE proveedor
                                               SET  proveedor = '$proveedor', contacto ='$contacto', telefono='$telefono', direccion ='$direccion'
                                               WHERE codproveedor = $idproveedor ");
    if($sql_update){
    $alert='<p class="msg_save">Proveedor actualizado correctamente</p>';
    }else{
    $alert='<p class="msg_save">Error al actualizar proveedor</p>';                                            
        }
    }
}
/*Mostrar datos del proveedor*/
if(empty($_REQUEST['id']))
{
    header('Location: lista_proveedor.php');
    mysqli_close($conection);
}
$idproveedor = $_REQUEST['id'];

$sql = mysqli_query($conection,"SELECT * FROM proveedor WHERE codproveedor = $idproveedor AND estatus = 1 ");
 mysqli_close($conection);
 $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
         header('Location: lista_proveedor.php');
    }else{
        while($data = mysqli_fetch_array($sql)) {

        $idproveedor      = $data['codproveedor'];
        $proveedor      = $data ['proveedor'];
        $contacto       = $data['contacto'];
        $telefono       = $data['telefono'];
        $direccion      = $data['direccion'];
      


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
<title>Actualizar proveedor</title>
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

   <center><h1>Actualizar proveedor</h1> 
    <hr>
    <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php  echo $idproveedor; ?>">
        <label for="proveedor"> Proveedor</label>
        <input type="text" name="proveedor" id ="proveedor" placeholder="Proveedor" value="<?php echo $proveedor ?>">
        <label for="contacto">Contacto</label>
        <input type="text"name="contacto" id="contacto" placeholder= "Contacto" value="<?php echo $contacto?>">
        <label for="telefono" >Telefono</label>
        <input type="number"name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $telefono ?>">
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion" placeholder="Direccion" value="<?php echo $direccion?>">
        <input type="submit" value="Actualizar proveedor" class="btn_save">
    </form> 
    
    <br>
    <br>
    <br>
    <center><a href="lista_proveedor.php" style="color:white;"><h5><i class="fas fa-angle-double-left"></i></h5></a></center>


   </div>


  </section>
  <?php include "../includes/footer.php"; ?>
  </body>
  </html>