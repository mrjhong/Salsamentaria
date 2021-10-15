
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
    background:bluew;
    color:white;
    padding:5px 25px;
    border-radius:10px;
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
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/scripts.php"; ?>
    <title>Lista de productos</title>  
<?php include "../includes/header.php"; ?>
<?php include "../includes/nav.php"; ?>
<script type="text/javascript" src="../js/functions.js"></script>
<title>Lista de productos</title>
</head>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<section id ="container">
  
<h1><font face="Optima">Lista de productos</font></h1>
<a href="registro_producto.php" class="btn_new">Registrar producto</a>
<form action="buscar_producto.php" method="get" class="form_search">
    <input type="text" name="busqueda" id ="busqueda" placeholder="Buscar">
    <input type="submit" value="Buscar" class="btn_search">
</form>
<hr>

<table border="1 solid" align="center" >
    <tr >
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Existencia</th>
        <th>Proveedor</th>
        <th>Foto</th>
        <th>Acciones</th>
    </tr>
         <?php

        /*Paginador*/
        $sql_register= mysqli_query($conection,"SELECT COUNT(*) as total_registro  FROM producto WHERE estatus = 1");
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

        $query = mysqli_query($conection, "SELECT p.codproducto, p.descripcion, p.precio, p.existencia,pr.proveedor,p.foto 
                                           FROM producto p
                                           INNER JOIN proveedor pr
                                           ON p.proveedor = pr.codproveedor
                                           WHERE p.estatus = 1 ORDER BY p.codproducto DESC LIMIT $desde,$por_pagina ");
         mysqli_close($conection);  

        $result = mysqli_num_rows($query);
        if ($result > 0){
            while ($data = mysqli_fetch_array($query)){
            if($data['foto'] != 'img_producto.png'){
                $foto = '../Imagenes/'.$data['foto'];
            }else{
                $foto = '../Imagenes/'.$data['foto'];
            }

        ?>
            <tr>
            <td><?php echo $data["codproducto"]; ?></td>
            <td><?php echo $data["descripcion"]; ?></td>
            <td><?php echo $data["precio"]; ?></td>
            <td><?php echo $data["existencia"]; ?></td>
            <td><?php echo $data["proveedor"]; ?></td>
            <td class ="img_producto"><img src="<?php echo $foto; ?>" alt="<?php echo $data["descripcion"];?>"></td>
            <td>
            <!-------?php if($_SESSION['rol'] == 1 || $_SESSION == 2) { ?>------>
                
           <!--------a class="link_add add_product" product="<?php echo $data["codproducto"]; ?>" href="#"><i class="fas fa-plus"></i>Agregar</a--->
    
            |
            <a class="link_edit" href="editar_producto.php?id=<?php echo $data["codproducto"]; ?>">Editar</a>
         
            |
            <a class="link_delete del_product" product="<?php echo $data["codproducto"]; ?>" href="#" >Eliminar</a>
    
            </td>    
            <!-----?php } ?>---->
        </tr>
        <?php

            }
        }

        ?>
   
</table>
<div class ="paginador">
<ul>
    <?php 
    if($pagina != 1)
    {

    
    ?>
    <li><a href="?pagina =<?php echo 1;?>">|<</a></li>
    <li><a href="?pagina=<?php echo $pagina-1;?>"><<</a></li>
    <?php 
    }
    
    for ($i=1; $i <= $total_paginas; $i++) {
        if($i == $pagina)
        {
        echo '<li class="pageSelected">'.$i.'</li>';  
        }else{
        echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';    
        }
        
    }
    if($pagina != $total_paginas)
    {

    ?>
   
    <li><a href="?pagina=<?php echo $pagina + 1;?>">>></a></li>
    <li><a href="?pagina=<?php echo $total_paginas;?>">>|</a></li>
    
    <?php } ?>
</ul>
</div>
</section>

<?php include "../includes/footer.php"; ?>
</body>
</html>


