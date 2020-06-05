<?php

require 'lib/usuarios.php';
require 'lib/funciones.php';
$usuario = new Usuarios();

if ($_GET){
  $id = $_GET['id'];
  $usuario->borrar($id);
  echo true;
  die;
}

if ($_POST) {  
  $id = $_POST['id'];
  $usuario->consultar($id);
 ?>


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

<?php 
}
?>