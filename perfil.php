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
        <h1 class="mt-4">Actualizar perfil de usuario</h1>

        <div role="alert" id="msg"></div>
        <div class="card">
          <div class="card-header">
            <i class="fas fa-table mr-1"></i>Usuarios
          </div>
          <div class="card-body">
            <form id="form-perfil" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id_usuario'] ?>">
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" readonly value="<?php echo $_SESSION['usuario'] ?>">
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="imagen">Imagen de perfil</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
              </div>
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
              </div>
              <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
              </div>
              <div class="form-group">
                <label for="cedula">Cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula">
              </div>
              <div class="form-group">
                <label for="fechanac">Fecha Nacimiento</label>
                <input type="date" id="fechanac" name="fechanac" class="form-control">
              </div>
              <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
              </div>
              <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
              </div>
              <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad">
              </div>
              <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
              </div>
              <div class="form-group">
                <label for="codigopostal">Código Postal</label>
                <input type="text" class="form-control" id="codigopostal" name="codigopostal" placeholder="Código postal">
              </div>
              <input type="button" class="btn btn-primary" id="actualizar" value="Actualizar">
            </form>
            </>
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