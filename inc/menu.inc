<?php
$usuario = new Usuarios();
$usuario->consultar($_SESSION['id_usuario']);
$src = $usuario->pic;
?>
<div id="layoutSidenav_nav">
	<nav class="sb-sidenav sb-sidenav-dark">
		<div class="sb-sidenav-menu">
			<div class="col">
				<img src="<?php echo $src ?>" alt="" class="perfil">
			</div>
			<div class="nav">
				<a class="nav-link" href="admin.php">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Administración
				</a>
				<a class="nav-link" href="#">
					<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
					Gráficas
				</a><a class="nav-link" href="#">
					<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
					Reportes
				</a>
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Conectado como:</div>
			<?php echo $_SESSION['nombre']; ?>
		</div>
	</nav>
</div>