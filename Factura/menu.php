
<ul class="nav navbar-nav">
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Factura
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="listadefactura.php">Lista de Facturas</a></li>
		<li><a href="crear_factura.php">Crear Factura</a></li>				  
	</ul>
</li>
<?php 

session_start();
if(isset($_SESSION["userid"])) { ?>

	<li class="dropdown">
		<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Conectado: <?php echo $_SESSION['user']; ?>
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="#">Mi Cuenta</a></li>
			<li><a href="action.php?action=logout">Salir</a></li>		  
		</ul>
	</li>
<?php } ?>
</ul>
<br /><br /><br /><br />