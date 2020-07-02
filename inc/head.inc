<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Portal de usuarios</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/fontawesome.css" />
	<link rel="stylesheet" href="css/solid.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/datatables.css">
</head>

<body class="sb-nav-fixed">
	<?php	if (isset($_SESSION['usuario'])) { ?>

		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<a class="navbar-brand" href="admin.php">Portal Usuarios</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="menu" href="#">
				<i class="fas fa-bars"></i>
			</button>
			<ul class="navbar-nav ml-auto ml-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="perfil.php">Editar perfil</a>
						<a class="dropdown-item" href="perfil_clave.php">Cambiar contraseña</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#" id="salir">Salir</a>
					</div>
				</li>
			</ul>
		</nav>

	<?php } ?>