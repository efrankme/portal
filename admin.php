<?php 
session_start(); include('inc/head.inc');

if(!$_SESSION['fingerprint'] == md5($_SERVER['HTTP_USER_AGENT'])){
  header('location: index.php');
}
?>

<div class="container container-md inicio-sesion">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Portal Web</h2>

      </div>
    </div>
</div>

<?php include('inc/foot.inc') ?>