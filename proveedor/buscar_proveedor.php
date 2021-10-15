<?php

 include "../Conexiones/conexion.php";

?>


<style>
    .btn_new{
        background:white;
    }
    .link_edit{
        display:inline-block;
        background:white;
    }
    .link_delete{
        background:white;
        display:inline-block;
    }
    /********* estilos de Lista para usuarios */
#container h1{
    font-size: 35px;
    display:inline-block;

}
.btn_new{
    display:inline-block;
    background:#0C2EA0;
    color:white;
    padding:5px 25px;
    border-radius:4px;
    margin:20px;

}
table{
    border-collapse:collapse;/*quitar el borde de las celdas*/
    font-size:12pt;
    font-family:'Optima';
    width:100%;
    
}
table th{
    text-align: center; /*para que se vea a la izquierda*/
    padding:10px;
    background:#0C2EA0;
    color:#FFF;
    align:center;
    
}
table tr:nth-child(odd){
  
}
table td{
    padding:10px;
    background:white;

}
.table{
    width:10px;
    margin:0 auto;
}
.link_edit{
    color:#0ca4ce;
}
.link_delete{
    color:#f26b6b;
}

/*estilos para paginador*/
.paginador ul{
padding:15px;
list-style:none;

margin-top:15px;
display:-webkit-flex;
display:-moz-flex;
display:-o-flex;
display:flex;
justify-content:flex-end;

}
.paginador a, .pageSelected{
    color:#FFF;
    border:1px solid  #ddd;
    padding:5px;
    display:inline-block;
    font-size:14px;
    text-align:center;
    width:35px;
}
.paginador a.hover{
    background:#ddd;
}
.pageSelected{
    color:#FFF;
    background:#0C2EA0;
    border:1px solid  #0C2EA0;
}

/*tabla*/
table{
    width: 80%;
    text-align:center;
}
/*titulos de tabla*/
th, tr{
    text-align:center;
}
/*estilos para formulario buscar*/
.form_search{
display:-webkit-flex;
display:-moz-flex;
display:-o-flex;
display:flex;
float:right;
background:initial;
padding:10px;
border-radius:10px;
}
.form_search .btn_search{
    background:#0C2EA0;
    color:#FFF;
    padding:0 20px;
    border:0 ;
    cursor:pointer;
    margin-left:10px;
}
/*estilo para devolver a lista*/
.devolver{
    width:20px;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar proveedor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <?php include "../includes/scripts.php"; ?>
    <title>Buscar proveedor</title>
</head>
<body>

<?php include "../includes/header.php";?>

<section id ="container">
<?php include "../includes/nav.php";?>
    <?php

    $busqueda = strtolower($_REQUEST['busqueda']);
    if(empty($busqueda))
    {
        header("location:lista_proveedor.php");
        mysqli_close($conection); 
    }

    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<h1><font face="Optima"><i class="far fa-building"></i> Lista proveedores</font></h1>
<a href="registro_proveedor.php" class="btn_new">Crear Proveedor</a>
<form action="busca_proveedor.php" method="get" class="form_search">
    <input type="text" name="busqueda" id ="busqueda" placeholder="Buscar" value="<?php  echo $busqueda; ?>">
    <input type="submit" value="Buscar" class="btn_search">
</form>



<hr>
<br>
<br>
<table border="1 solid" align="center" >
    <tr >
    <th>ID</th>
        <th>Proveedor</th>
        <th>Contacto</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>
         <?php

        /*Paginador*/
        $sql_register= mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM proveedor
                                               WHERE ( codproveedor LIKE '%$busqueda%' OR 
                                                       proveedor LIKE   '%$busqueda%' OR
                                                       contacto LIKE    '%$busqueda%' OR 
                                                       telefono LIKE    '%$busqueda%'  
                                              
                                             )    
                                              AND estatus = 1 ");
        $result_register = mysqli_fetch_array($sql_register); 
        $total_registro = $result_register['total_registro'];
       
        /*mostrar registros por pagina para paginador*/
        $por_pagina = 5;
        if(empty($_GET['pagina']))
        {
            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }
        $desde = ($pagina-1) * $por_pagina;
        $total_paginas = ceil($total_registro / $por_pagina);

        $query = mysqli_query($conection,"SELECT * FROM proveedor WHERE
                      ( codproveedor LIKE    '%$busqueda%' OR 
                        proveedor      LIKE    '%$busqueda%' OR 
                        contacto   LIKE    '%$busqueda%' OR 
                        telefono  LIKE    '%$busqueda%' )
        AND
        estatus = 1 ORDER BY codproveedor ASC LIMIT $desde,$por_pagina
        ");
        mysqli_close($conection); 
        $result = mysqli_num_rows($query);

        if($result > 0){
            while ($data = mysqli_fetch_array($query)){
                $formato = 'Y-m-d  H:i:s';
                $fecha = DateTime::createFromFormat($formato,$data["dateadd"])

        ?>
            <tr>
            <td><?php echo $data["codproveedor"]; ?></td>
            <td><?php echo $data["proveedor"]; ?></td>
            <td><?php echo $data["contacto"]; ?></td>
            <td><?php echo $data["telefono"]; ?></td>
            <td><?php echo $data["direccion"]; ?></td>
            <td><?php echo $fecha->format('d-m-Y');?></td>
            <td>
            <a class="link_edit" href="editar_proveedor.php?id=<?php echo $data["codproveedor"] ?>">Editar</a>
           
          
            |
            <a class="link_delete"href="eliminar_confirmar_proveedor.php?id=<?php echo $data["codproveedor"] ?>">Eliminar</a>
            </td>
            </tr>
        <?php

            }
        }

        ?>
   
</table>
<?php
if($total_registro != 0)
{


?>
<div class ="paginador">
<ul>
    <?php 
    if($pagina != 1)
    {

    
    ?>
    <li><a href="?pagina =<?php echo 1;?>&busqueda=<?php echo $busqueda;?>">|<</a></li>
    <li><a href="?pagina=<?php echo $pagina-1;?>&busqueda=<?php echo $busqueda;?>"><<</a></li>
    <?php 
    }
    
    for ($i=1; $i <= $total_paginas; $i++) {
        if($i == $pagina)
        {
        echo '<li class="pageSelected">'.$i.'</li>';  
        }else{
        echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';    
        }
        
    }
    if($pagina != $total_paginas)
    {

    ?>
   
    <li><a href="?pagina=<?php echo $pagina + 1;?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
    <li><a href="?pagina=<?php echo $total_paginas;?>&busqueda=<?php echo $busqueda;?>">>|</a></li>
    
    <?php } ?>
</ul>
</div>
<?php } ?>
<br>
<br>
<br>
<br>
<br>

<center><a href="lista_proveedor.php" style="color:white;"><h5><i class="fas fa-angle-double-left"></i></h5></a></center>
</section>

</body>
</html>