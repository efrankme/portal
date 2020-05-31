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
      <th>Teléfono</th>
      <td><?php echo $usuario->telefono ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $usuario->email ?></td>
    </tr>
    <tr>
      <th>Cedula</th>
      <td><?php echo $usuario->cedula ?></td>
    </tr>
    <tr>
      <th>Fecha Nac</th>
      <td><?php echo $usuario->fechanac ?></td>
    </tr>
    <tr>
      <th>Dirección</th>
      <td><?php echo $usuario->direccion ?></td>
    </tr>
    <tr>
      <th>Ciudad</th>
      <td><?php echo $usuario->ciudad ?></td>
    </tr>
    <tr>
      <th>Estado</th>
      <td><?php echo $usuario->estado ?></td>
    </tr>
    <tr>
      <th>Código postal</th>
      <td><?php echo $usuario->codigopostal ?></td>
    </tr>
  </tbody> 
</table>