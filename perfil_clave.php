<?php
session_start();

require 'inc/head.inc';
require 'lib/funciones.php';
require 'lib/usuarios.php';

if (!$_SESSION['fingerprint'] == md5($_SERVER['HTTP_USER_AGENT'])) {
  header('location: index.php');
} else {
  verificaInactividad();
}


?>


<div id="layoutSidenav">
  <?php require 'inc/menu.inc' ?>

  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4">Administración de usuarios</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Desde aquí puede gestionar usuarios</li>
        </ol>
        <div role="alert" id="msg"></div>
        <div class="card">
          <div class="card-header">
            <i class="fas fa-table mr-1"></i>Usuarios
          </div>
          <div class="card-body">
            <form id="clave-editar" method="post">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" readonly value="<?php echo $_SESSION['usuario'] ?>">
              </div>
              <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
              </div>
              <div class="form-group">
                <label for="clave2">Confirmar contraseña</label>
                <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Confirmar Contraseña">
              </div>
              <button type="button" class="btn btn-primary" id="actualizar-clave">Guardar</button>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
</main>
<footer class="py-4 bg-light mt-auto">
  <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between small">
      <div class="text-muted">
        Copyright &copy; Portal Usuarios 2020
      </div>
      <div>
        Proyecto
        &middot;
        <a href="#">Frank</a>
      </div>
    </div>
  </div>
</footer>
</div>
</div>



<?php include 'inc/foot.inc'; ?>