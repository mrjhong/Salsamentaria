
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
        .notItemOne option:first-child{
        display:none;
        }
       
</style>
<?php  
session_start();
include "../Conexiones/conexion.php";
if(!empty($_POST))
{


    $alert='';
    if(empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['precio']) || empty($_POST['id']) || empty($_POST['foto_actual']) || empty($_POST['foto_remove']))
    {
        $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
    }else{
        $codproducto     = $_POST['id'];
        $proveedor       = $_POST['proveedor'];
        $producto        = $_POST['producto'];
        $precio          = $_POST['precio'];
        $imgProducto     = $_POST['foto_actual'];
        $imgRemove       = $_POST['foto_remove'];
      

        $foto        = $_FILES['foto'];
        $nombre_foto = $foto['name'];
        $type        = $foto['type'];
        $url_temp    = $foto['tmp_name'];

        $upd = '';


        if($nombre_foto != '')
        {
            $destino     ='../Imagenes/';
            $img_nombre  = 'img_'.md5(date('d-m-Y H:m:s'));  /*escriptando la fecha y hora para que no se duplique en nombre de la foto*/
            $imgProducto = $img_nombre.'.jpg';
            $src         = $destino.$imgProducto;
        }else{
            if($_POST['foto_actual'] != $_POST['foto_remove']){
                $imgProducto = 'img_producto.png';
            }
        }

    $query_update = mysqli_query($conection,"UPDATE producto
                                            SET descripcion = '$producto',
                                                proveedor   = $proveedor,
                                                precio      = $precio,
                                                foto        = '$imgProducto'
                                        WHERE codproducto   = $codproducto ");
    if($query_update){

    if(($nombre_foto != '' && ($_POST['foto_actual'] != 'img_producto.png')) || ($_POST['foto_actual'] != $_POST['foto_remove']))
    {
        unlink('../Imagenes/'.$_POST['foto_actual']);
    }
    if($nombre_foto != '')
    {
            move_uploaded_file($url_temp,$src);
    }
        $alert='<p class="msg_save">Producto actualizado correctamente</p>';
    }else{
         $alert='<p class="msg_save">Error al actualizar producto</p>';
           }                                              
    }
  
}



//VALIDAR PRODUCTO 


if(empty($_REQUEST['id'])){
    header("location:lista_producto.php");
}else{
    $id_producto =$_REQUEST['id'];
    if(!is_numeric($id_producto)){
    header("location:lista_producto.php");
    }
  $query_producto= mysqli_query($conection,"SELECT p.codproducto, p.descripcion,p.precio,p.foto, pr.codproveedor, pr.proveedor 
                                            FROM producto p 
                                            INNER JOIN proveedor pr
                                            ON p.proveedor = pr.codproveedor 
                                            WHERE p.codproducto = $id_producto AND p.estatus = 1");
  $result_producto =mysqli_num_rows($query_producto);
  $foto = '';
  $classRemove= 'notBlock';
  if($result_producto > 0){
      $data_producto=mysqli_fetch_assoc($query_producto);
      if($data_producto['foto'] != 'img_producto.png'){
          $classRemove= '';
          $foto = '<img id ="img" src="Imagenes/'.$data_producto['foto'].'" alt="producto">';
      }
      //print_r($data_producto);
  }else{
    header("location:lista_producto.php");
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
    <title>Actualizar productos</title>
    <script type="text/javascript" src="../js/functions.js"></script>
</head>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<body>
<?php include "../includes/header.php"; ?>
<?php include "../includes/nav.php";?>
<section id="container">

<div class="form_register"> 
<center><h1>Actualizar producto</h1>
<hr>
    <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data_producto['codproducto']; ?>">
    <input type="hidden" id="foto_actual" name="foto_actual" value="<?php echo $data_producto['foto']; ?>">
    <input type="hidden" id="foto_remove" name="foto_remove" value="<?php echo $data_producto['foto']; ?>">


        <label for="proveedor"> Proveedor</label>
        <?php
        $query_proveedor = mysqli_query($conection,"SELECT codproveedor,proveedor FROM proveedor WHERE estatus = 1 ORDER BY proveedor ASC");
        $result_proveedor = mysqli_num_rows($query_proveedor);
        mysqli_close($conection);
        ?>
        <select name="proveedor" id="proveedor" class="notItemOne">
            <option value="<?php echo $data_producto ['codproveedor'] ;?>"selected><?php echo $data_producto ['proveedor'] ;?></option>
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
        <input type="text"name="producto" id="producto" placeholder= "Nobre del producto" value="<?php echo $data_producto['descripcion']; ?>">
        <label for="precio" >Precio</label>
        <input type="number"name="precio" id="precio" placeholder="Precio del producto" value="<?php echo $data_producto['precio']; ?>">
        <div class="photo">
	    <label for="foto">Foto</label>
        <div class="prevPhoto">
        <span class="delPhoto <?php echo $classRemove; ?>">X</span>
        <label for="foto"></label>
        <?php echo $foto; ?>
        </div>
        <div class="upimg">
        <input type="file" name="foto" id="foto">
        </div>
        <div id="form_alert"></div>
       </div>
        <input type="submit" value="Actualizar producto" class="btn_save">
    </form>
    <center><a href="lista_producto.php" style="color:white;"><h5><b><i class="fas fa-angle-double-left"></i></b></h5></a></center>

</div>


</section>
<?php include "../includes/footer.php"; ?>
</body>
</html>