
<style>
    /*estilos para formulario de registro*/
    .form.register{
            width:150px;
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
       
        label{
            display:block;
            font-size:12pt;
            font-family:'GothamBook';
            margin:15px auto 5px auto;
        }
        input,select{
             display:block;
             width:50%;
             font-size:11pt;
             padding:5px;
             border:1px solid #85929e;
             border-radius:5px;
             }
        .btn_save{
            text-align:center;
            font-size:12pt;
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
    if(empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['precio']) ||  $_POST['precio']  <= 0  ||  empty($_POST['cantidad'] || $_POST['cantidad'] <=0))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
    }else{
       
        $proveedor       = $_POST['proveedor'];
        $producto        = $_POST['producto'];
        $precio          = $_POST['precio'];
        $cantidad        = $_POST['cantidad'];
        $usuario_id      = $_SESSION['idUser'];

        $foto        = $_FILES['foto'];
        $nombre_foto = $foto['name'];
        $type        = $foto['type'];
        $url_temp    = $foto['tmp_name'];

        $imgProducto = 'img_producto.png';


        if($nombre_foto != '')
        {
            $destino     ='../Imagenes/';
            $img_nombre  = 'img_'.md5(date('d-m-Y H:m:s'));  /*escriptando la fecha y hora para que no se duplique en nombre de la foto*/
            $imgProducto = $img_nombre.'.jpg';
            $src         = $destino.$imgProducto;
        }

    $query_insert = mysqli_query($conection,"INSERT INTO producto(proveedor,descripcion,precio,existencia,usuario_id,foto)
                                            VALUES('$proveedor','$producto','$precio','$cantidad','$usuario_id','$imgProducto')");
    if($query_insert){
        if($nombre_foto != ''){
            move_uploaded_file($url_temp,$src);
        }
        $alert='<p class="msg_save">Producto creado correctamente</p>';
    }else{
         $alert='<p class="msg_save">Error al crear producto</p>';
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
    <title>Registro producto</title>
    <script type="text/javascript" src="../js/functions.js"></script>
</head>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<body>
<?php include "../includes/header.php"; ?>
<?php include "../includes/nav.php";?>
<section id="container">

<div class="form_register"> 
<center><h1>Registro producto</h1>
<hr>
    <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>

    <form action="" method="post" enctype="multipart/form-data">

        <label for="proveedor"> Proveedor</label>
        <?php
        $query_proveedor = mysqli_query($conection,"SELECT codproveedor,proveedor FROM proveedor WHERE estatus = 1 ORDER BY proveedor ASC");
        $result_proveedor = mysqli_num_rows($query_proveedor);
        mysqli_close($conection);
        ?>
        <select name="proveedor" id="proveedor">
        <?php 
           
           if($result_proveedor > 0){
               while($proveedor = mysqli_fetch_array($query_proveedor)) {

         ?>
        <option value="<?php  echo $proveedor['codproveedor']; ?>"><?php  echo  $proveedor['proveedor']; ?></option>
         <?php 

               }
           }
        
        ?>
        </select>
        <label for="producto">Producto</label>
        <input type="text"name="producto" id="producto" placeholder= "Nombre del producto">
        <label for="precio" >Precio</label>
        <input type="number"name="precio" id="precio" placeholder="Precio del producto">
        <label for="cantidad">Cantidad</label>
        <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad del producto">
        <div class="photo">
	    <label for="foto">Foto</label>
        <div class="prevPhoto">
        <span class="delPhoto notBlock">X</span>
        <label for="foto"></label>
        </div>
        <div class="upimg">
        <input type="file" name="foto" id="foto">
        </div>
        <div id="form_alert"></div>
       </div>
        <input type="submit" value="Guardar producto" class="btn_save">
    </form>
    <center><a href="lista_producto.php" style="color:white;"><h5><b><i class="fas fa-angle-double-right"></i></b></h5></a></center>

</div>


</section>
<?php include "../includes/footer.php"; ?>
</body>
</html>