<?php
session_start();

require 'inc/head.inc';
require 'lib/funciones.php';

if (!$_SESSION['fingerprint'] == md5($_SERVER['HTTP_USER_AGENT'])) {
  header('location: index.php');
} else {
  verificaInactividad();
}


?>


<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav sb-sidenav-dark">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <a class="nav-link" href="admin.php">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Administración
          </a>
          <a class="nav-link" href="charts.html">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Charts
          </a><a class="nav-link" href="tables.html">
            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
            Tables
          </a>
        </div>
      </div>
      <div class="sb-sidenav-footer">
        <div class="small">Conectado como:</div>
        <?php echo $_SESSION['nombre']; ?>
      </div>
    </nav>
  </div>

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
            <form id="form-editar" method="post">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $_SESSION['usuario'] ?>">
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
              </div>
              <div class="form-group">
                <label for="clave2">Confirmar contraseña</label>
                <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Confirmar Contraseña">
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
              <button type="button" class="btn btn-primary" id="editar">Editar</button>
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
    
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