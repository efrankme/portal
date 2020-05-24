<?php

require('lib/usuarios.php');

$users = new Usuarios();
$usuarios = $users->consultarTodos();
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Usuario</th>
      <th>Email</th>
      <th>Nombre</th>
      <th>Fecha Nac</th>
      <th>Teléfono</th>
      <th>Ciudad</th>
    </tr>
  </thead>
  <?php foreach ($usuarios as $usuario) : ?>
    <tbody>
      <tr>
        <td><?php echo $usuario->usuario ?></td>
        <td><?php echo $usuario->email ?></td>
        <td><?php echo $usuario->nombre, ' ', $usuario->apellido ?></td>
        <td><?php echo formatFecha($usuario->fechanac) ?></td>
        <td><?php echo $usuario->telefono ?></td>
        <td><?php echo $usuario->ciudad ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Usuario</th>
        <th>Email</th>
        <th>Nombre</th>
        <th>Fecha Nac</th>
        <th>Teléfono</th>
        <th>Ciudad</th>
      </tr>
    </tfoot>
</table>