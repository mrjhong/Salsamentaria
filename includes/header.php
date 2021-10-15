<?php
session_start();
if(empty($_SESSION['active']))
{
header('location:../');
}
?>
<style>

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/functions.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <title>Bienvenidos</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<header>
    <div class="header">
      
        <div class="optionsBar">
   <p>Tunja, <?php echo fechaC(); ?></p>
   <span>|</span>
   <span class="user"><?php echo $_SESSION['user'].' -'.$_SESSION['rol']; ?></span>
    </div>
    
</div>
</header>
<!--------------<div class="modal">
  <div class="bodyModal">
   <form action="" method="post" name="form_add_product "id="form_add_product" onsubmit="event.preventDefault(); sendDataProduct();">
     <h1><i class="fas fa-cubes" style="font-size:45pt;"></i><br>Agregar producto</h1>
     <h2 class="nameProducto">Burbuja JET</h2><br>
     <input type="number" name="cantidad" id="txtCantidad" placeholder="cantidad del producto" required><br>
     <input type="text" name="precio" id="txtPrecio" placeholder="precio del producto" required>
     <input type="hidden" name="producto_id" id="producto_id" required>
     <input type="hidden" name="action" value="addProduct" required>
      <div class="alert alertAddProduct"></div>
      <button type="submit" class="btn_new"><i class="fas fa-plus"></i>Agregar</button>
      <a href="#" style="background:red;" class="btn_ok closeModal" onclick=" cerrarModal(); "><i class="fas fa-ban"  style="color: #e66262"></i>Cerrar</a>
      
   </form>
  -------></div>
</div>