<?php
session_start();

if (isset($_POST['sesion'])) {
  //si pasaron 10 minutos o más
  session_destroy(); // destruyo la sesión
  echo true;
} else {
  //sino, actualizo la fecha de la sesión
  $ahora = date("Y-n-j H:i:s");
  $_SESSION["ultimoAcceso"] = $ahora;
}
