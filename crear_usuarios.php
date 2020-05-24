<?php 

require('lib/usuarios.php');

echo "<pre>";
var_dump($_POST);
echo "</pre>";

if($_POST){
  $data_usuario = [
    'usuario' => $_POST['usuario'],
    'clave' => $_POST['clave'],
    'email' => $_POST['email'],
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'cedula' => $_POST['cedula'],
    'fechanac' => $_POST['fechanac'],
    'telefono' => $_POST['telefono'],
    'direccion' => $_POST['direccion'],
    'ciudad' => $_POST['ciudad'],
    'estado' => $_POST['estado'],
    'codigopostal' => $_POST['codigopostal']];

    // crea objeto usuario
    $usuario = new Usuarios();
    $usuario->crear($data_usuario);

    echo true;
}

?>