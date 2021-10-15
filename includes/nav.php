<nav>
    <ul>
        <li><a href="../Iniciar/index.php"><i class="fas fa-home"></i>
                Inicio</a></li>
        <?php
 if($_SESSION['rol'] == 1){
 ?>
        <li class="principal">
            <a href="../Iniciar/index.php"><i class="fas fa-users"></i>
                Usuarios</a>
            <ul>
                <li><a href="../usuario/registro_usuario.php"><i class="fas fa-user-plus"></i> Nuevo Usuario</a></li>
                <li><a href="../usuario/lista_usuarios.php"><i class="fas fa-users"></i> Lista de Usuarios</a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="principal">
            <a href="#"><i class="fas fa-user"></i> Clientes</a>
            <ul>
                <li><a href="../cliente/registro_cliente.php"><i class="fas fa-user-plus"></i> Nuevo Cliente</a></li>
                <li><a href="../cliente/lista_clientes.php"><i class="far fa-list-alt"></i> Lista de Clientes</a></li>
            </ul>
        </li>
        <?php
 if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){
 ?>
        <li class="principal">
            <a href="#"><i class="far fa-building"></i>
                Proveedores</a>
            <ul>
                <li><a href="../provedor/registro_proveedor.php"><i class="fas fa-plus"></i> Nuevo Proveedor</a></li>
                <li><a href="../provedor/lista_proveedor.php"><i class="far fa-list-alt"></i> Lista de Proveedores</a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="principal">
            <a href="../producto/lista_producto.php"><i class="fas fa-cubes"></i>
                Productos</a>
            <ul>
                <?php
 if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){
 ?>
                <li><a href="../producto/registro_producto.php"> <i class="fas fa-plus"></i> Nuevo Producto</a></li>
                <?php } ?>
                <li><a href="../producto/lista_producto.php"> <i class="fas fa-cube"></i> Lista de Productos</a></li>
            </ul>
        </li>
        <li class="principal">
            <a href="../Factura/ventas.php"><i class="far fa-file-alt"></i> Ventas</a>
            <ul>
                <li><a href="../Factura/nueva_venta.php"><i class="fas fa-plus"></i> Nueva Venta</a></li>
                <li><a href="../Factura/ventas.php"><i class="far fanewspaper"></i> Ventas</a></li>
            </ul>
        </li>
    </ul>
</nav>