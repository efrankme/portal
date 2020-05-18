<?php
session_start(); 

if(isset($_SESSION['fingerprint'])){
  header('location: admin.php');
}
include('inc/head.inc') 

?>

  <div class="container container-md inicio-sesion">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Portal Web</h2>

      </div>
    </div>
    <div class="row">
      
      <div class="col-md-6 offset-md-3"">
        
        <form action="" method="post" id="login">
          <legend>Inicio sesión</legend>
          
          <div class="form-group">
            <input type="text" class="form-control" id="usuario" placeholder="Usuario">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="clave" placeholder="Contraseña">
          </div>
          
          <button type="submit" id="iniciar_sesion" class="btn btn-primary">Iniciar sesión</button>

          <a href="registro.php" class="float-right">Registro</a>
        </form>

      </div>

    </div>
  </div>

  <?php include('inc/foot.inc') ?>
