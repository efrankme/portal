<?php
session_start();

include 'inc/head.inc';

if (!$_SESSION['fingerprint'] == md5($_SERVER['HTTP_USER_AGENT'])) {
	header('location: index.php');
}
?>

<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sb-sidenav sb-sidenav-dark">
			<div class="sb-sidenav-menu">
				<div class="nav">
					<a class="nav-link" href="admin.php"
						><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
						Administración</a>
					<a class="nav-link" href="charts.html"
						><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
						Charts</a
					><a class="nav-link" href="tables.html"
						><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
						Tables</a
					>
				</div>
			</div>
			<div class="sb-sidenav-footer">
				<div class="small">Conectado como:</div>
				<?php echo $_SESSION['nombre']; ?>
			</div>
		</nav>
	</div>
	<div id="layoutSidenav_content">
		<main>
				<div class="container-fluid">
						<h1 class="mt-4">Administración de usuarios</h1>
						<ol class="breadcrumb mb-4">
								<li class="breadcrumb-item active">Desde aquí puede gestionar usuarios</li>
						</ol>

						<div class="card">
								<div class="card-header">
										<i class="fas fa-table mr-1"></i>Usuarios
								</div>
								<div class="card-body">
										<div class="table-responsive">

										</div>
								</div>
						</div>
				</div>
		</main>
		<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid">
						<div class="d-flex align-items-center justify-content-between small">
								<div class="text-muted">
										Copyright &copy; Portal Usuarios 2020
								</div>
								<div>
										Proyecto
										&middot;
										<a href="#">Frank</a>
								</div>
						</div>
				</div>
		</footer>
	</div>
</div>

<?php include 'inc/foot.inc'; ?>
