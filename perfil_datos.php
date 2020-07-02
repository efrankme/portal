<?php
session_start();
require 'lib/usuarios.php';
require 'lib/funciones.php';

if ($_GET) {  
  $id = $_GET['id'];

	$usuario = new Usuarios();
  $usuario->consultar($id);
  echo json_encode($usuario);
}

if($_POST){
  if (($_FILES["imagen"]["type"] == "image/jpeg")
  || ($_FILES["imagen"]["type"] == "image/png")
  || ($_FILES["imagen"]["type"] == "image/gif")) {
    $path = "img/" . $_SESSION['usuario'];
    if(!file_exists($path))
      mkdir($path);
    $destino = "img/".$_SESSION['usuario']."/" . $_FILES['imagen']['name'];
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino)) {
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
        'pic' => $destino,
        'codigopostal' => $codigopostal
      ];
      $usuario = new Usuarios();
      $usuario->editar($data_usuario);
      echo true;
    } else {
      echo false;
    }
  }
  echo false;
}
?>