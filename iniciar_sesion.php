<?php 
session_start();
require('lib/usuarios.php');

if($_POST) {
  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];

  $user = new Usuarios();

  if($user->iniciarSesion($usuario,$clave)){
    $_SESSION['usuario']=$user->usuario;
    $_SESSION['nombre']=$user->nombre;
    $_SESSION['email']=$user->email;
    $_SESSION['fingerprint'] = md5($_SERVER['HTTP_USER_AGENT']);
    //defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss
    $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
    echo true;
  } else {
    echo false;
  }
}

?>