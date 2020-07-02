<?php

if ($_POST) {
	require 'lib/usuarios.php';
	require 'lib/funciones.php';
	$id = $_POST['id'];
	$_usuario = new Usuarios();

	if (isset($_POST['consul'])) {
		$_usuario->consultar($id);
		echo json_encode($_usuario);
	} else {
		extract($_POST, EXTR_OVERWRITE);
		$data_usuario = [
                    'id' => $id,
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'cedula' => $cedula,
                    'telefono' => $telefono,
                    'fechanac' => $fechanac,
                    'direccion' => $direccion,
                    'ciudad' => $ciudad,
                    'estado' => $estado,
                    'codigopostal' => $codigopostal ];
    $_usuario->editar($data_usuario);
    echo true;
	}
}
?>
