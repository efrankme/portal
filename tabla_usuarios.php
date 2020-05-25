<?php

require 'lib/usuarios.php'; 
require 'lib/funciones.php';

$users = new Usuarios();
$usuarios = $users->consultarTodos();

echo json_encode($usuarios);
