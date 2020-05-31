<?php

require 'lib/usuarios.php';
require 'lib/funciones.php';

if (isset($_POST) && isset($_POST['consul'])) {
  
  $id = $_POST['id'];

	$usuario = new Usuarios();
  $usuario->consultar($id);
  echo json_encode($usuario);
} else if(isset($_POST)){
  extract($_POST,EXTR_OVERWRITE);

  var_dump($_POST);
}
?>