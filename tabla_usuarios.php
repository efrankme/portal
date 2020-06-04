<?php

require 'lib/usuarios.php'; 
require 'lib/funciones.php';

$users = new Usuarios();
$usuarios = $users->consultarTodos();
?>

<table class="table table-striped table-bordered" id="datatable" style="width:100%">
  <thead>
    <tr>
      <th>Usuario</th>
      <th>Email</th>
      <th>Nombre</th>
      <th>Fecha Nac</th>
      <th>Teléfono</th>
      <th>Ciudad</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($usuarios as $usuario) : ?>
    <tr user-id="<?php echo $usuario->id ?>">
      <td><?php echo $usuario->usuario ?></td>
      <td><?php echo $usuario->email ?></td>
      <td><?php echo $usuario->nombre, ' ', $usuario->apellido ?></td>
      <td><?php echo formatFecha($usuario->fechanac) ?></td>
      <td><?php echo $usuario->telefono ?></td>
      <td><?php echo $usuario->ciudad ?></td>
      <td>
        <button class="btn btn-primary btn-ver" data-toggle="modal" data-target="#ver-modal">
          <i class="fa fa-eye"></i>
        </button>
        <button class="btn btn-info btn-editar" data-toggle="modal" data-target="#editar-modal">
          <i class="fa fa-edit"></i>
        </button>
        <button class="btn btn-danger btn-borrar" data-toggle="modal" data-target="#borrar-modal">
          <i class="fa fa-eraser"></i>
        </button>
      </td>
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
        <th>Acciones</th>
      </tr>
    </tfoot>
</table>

<script> 
$("#datatable").DataTable();
</script>