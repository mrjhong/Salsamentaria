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
 include"../Conexiones/conexion.php";


if(!empty($_POST))
    {
    if($_POST['idusuario'] ==1){
        header("location:lista_usuario.php");
        mysqli_close($conection); 
        exit; 
    }
    $idusuario = $_POST['idusuario'];
   
    /*$query_delete =mysqli_query($conection,"DELETE FROM usuario WHERE idusuario = $idusuario ");eliminar registro*/
  $query_delete = mysqli_query($conection,"UPDATE usuario SET estatus = 0 WHERE idusuario =  $idusuario");
  mysqli_close($conection); 

    if($query_delete){
        header("location:lista_usuario.php");

    }else{
        echo "Error al eliminar";
    }

}

if(empty($_REQUEST['id']) || $_REQUEST['id'] ==1 )/*si esta variable da click en 1 debe devolver a lista_usuario.php*/
{
    header("location:lista_usuario.php");
    mysqli_close($conection); 

}else{
    

    $idusuario = $_REQUEST['id'];

    $query = mysqli_query($conection,"SELECT u.nombre,u.usuario,r.nombre_rol
                                      FROM usuario u 
                                      INNER JOIN
                                      rol r 
                                      ON u.rol = r.idrol
                                      WHERE u.idusuario =  $idusuario ");
    mysqli_close($conection);                                   
    $result = mysqli_num_rows($query);
    
    if($result > 0){
        while($data = mysqli_fetch_array($query)) {
            $nombre= $data['nombre'];
            $usuario = $data['usuario'];
            $rol = $data['nombre_rol'];
        }
    }else{
        header("location:lista_usuario.php");
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
    <title>Eliminar usuario</title>
</head>
<body>
<?php include "../includes/header.php"; ?>
<?php include "../includes/nav.php"; ?>

    <div class="data_delete">
        <br>
        <br>
        <br>
        <table>

        <h2 style ="color:white;">¿Esta seguro de elminar el siguiente registro?</h2>
        <p>Nombre: <span><?php echo  $nombre; ?></span></p>
        <p>Usuario: <span><?php echo  $usuario; ?></span></p>
        <p>Rol: <span><?php echo  $rol; ?></span></p>
        </table>
        
<form method="post" action="">
    <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
    <a href="lista_usuario.php" class="btn_cancel">Cancelar</a>
    <input type="submit" value ="Aceptar" class="btn_ok">
</form>
    </div>
</body>
</html>