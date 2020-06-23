<?php 

require('lib/usuarios.php');

if($_POST){
  extract($_POST,EXTR_OVERWRITE);
  $data_usuario = [
    'usuario' => $usuario,
    'clave' => $clave,
    'email' => $email,
    'nombre' => $nombre,
    'apellido' => $apellido,
    'cedula' => $cedula,
    'fechanac' => $fechanac,
    'telefono' => $telefono,
    'direccion' => $direccion,
    'ciudad' => $ciudad,
    'estado' => $estado,
    'codigopostal' => $codigopostal];

    // crea objeto usuario
    $usuario = new Usuarios();
    $usuario->crear($data_usuario);
    echo true;
}

?>