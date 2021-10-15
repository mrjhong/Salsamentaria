<style>
    /*estilos para eliminar_confirmar*/
    .data_delete{
        text-align:center;
    }
    .data_delete{
        font-size:12pt;
    }
    .data_delete span{
        font-weight:bold;
        color:#4f72d4;
        font-size:12pt;
    }
    .btn_cancel,.btn_ok{
        width:124px;
        background:blue;
        color:#FFF;
        display:inline-block;
        padding:5px;
        border-radius:5px;
        cursor:pointer;
        margin:15px;
    }
    .btn_cancel{
        background:#42b343;
        text-decoration:none;
    }
    .data_delete form{
        background:initial;
        margin:auto;
        padding:20px 50px;
        border:0;
    }
    /*estilos para tabla de eliminar*/
    h2{
        font-family:Open;
        
    }
    table{
        border:20 solid;
    }
</style>

<?php
/*para que estos roles no eliminen*/
//*session_start();
//*if($_SESSION['rol'] != 1 and $_SESSION['rol'] !=2)
//{
 //   header("location:lista_clientes.php");
//}
 include "../Conexiones/conexion.php";

/*post para eliminar*/
if(!empty($_POST))
    {
  if(empty($_POST['idcliente']))
  {
    header("location:lista_clientes.php");
    mysqli_close($conection); 
  }
    $idcliente = $_POST['idcliente'];
   
/*$query_delete =mysqli_query($conection,"DELETE FROM usuario WHERE idusuario = $idusuario ");eliminar registro*/
  $query_delete = mysqli_query($conection,"UPDATE cliente SET estatus = 0 WHERE idcliente =  $idcliente");
  mysqli_close($conection); 

    if($query_delete){
        header("location:lista_clientes.php");

    }else{
        echo "Error al eliminar";
    }

}

if(empty($_REQUEST['id'])  )/*si esta variable da click en 1 debe devolver a lista_usuario.php*/
{
    header("location:lista_clientes.php");
    mysqli_close($conection); 

}else{
    

    $idcliente = $_REQUEST['id'];

    $query = mysqli_query($conection,"SELECT * FROM cliente WHERE idcliente =  $idcliente ");
    mysqli_close($conection);                                   
    $result = mysqli_num_rows($query);
    
    if($result > 0){
        while($data = mysqli_fetch_array($query)) {
            $nit = $data['nit'];
            $nombre= $data['nombre'];
        }
    }else{
        header("location:lista_clientes.php");
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
    <title>Eliminar cliente</title>
</head>
<body>
<?php include "../includes/header.php"; ?>
<?php include "../includes/nav.php"; ?>

    <div class="data_delete">
        <br>
        <br>
        <br>
        <table>

        <h2 style ="color:white;">¿Esta seguro de eliminar el siguiente registro?</h2>
        <p>Nombre del cliente: <span><?php echo  $nombre; ?></span></p>
        <p>NIT <span><?php echo  $nit; ?></span></p>
        </table>
        
<form method="post" action="">
    <input type="hidden" name="idcliente" value="<?php echo $idcliente; ?>">
    <a href="lista_clientes.php" class="btn_cancel">Cancelar</a>
    <input type="submit" value ="Aceptar" class="btn_ok">
</form>
    </div>
</body>
</html>