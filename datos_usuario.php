<?php

if ($_GET) {
	require 'lib/usuarios.php';
  require 'lib/funciones.php';
  
  $_usuario = $_GET['usuario'];

	$usuario = new Usuarios();
  $usuario->consultarPerfil($_usuario);
  echo json_encode($usuario);
}
?>
