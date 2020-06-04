<?php

if ($_POST) {
	require 'lib/usuarios.php';
  require 'lib/funciones.php';
  
  $id = $_POST['id'];

	$usuario = new Usuarios();
  $usuario->consultar($id);
} ?>


<table class="table table-striped table-bordered">
  <tbody>
    <tr>
      <th>Usuario</th>
      <td><?php echo $usuario->usuario ?></td>
    </tr>
    <tr>
      <th>Nombre</th>
      <td><?php echo $usuario->nombre,' ', $usuario->apellido ?></td>
    </tr>
    <tr>
      <th>Cedula</th>
      <td><?php echo $usuario->cedula ?></td>
    </tr>
    <tr>
      <th>Teléfono</th>
      <td><?php echo $usuario->telefono ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $usuario->email ?></td>
    </tr>
  </tbody> 
</table>