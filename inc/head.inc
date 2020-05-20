<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/alertify.css">
  <link rel="stylesheet" href="css/fontawesome.css">
  <link rel="stylesheet" href="css/solid.css">
  <link rel="stylesheet" href="css/regular.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="sb-nav-fixed">

<?php if($_SERVER['SCRIPT_NAME'] != '/portal/index.php') { ?> 

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Portal Usuarios</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="menu" href="#"><i class="fas fa-bars"></i></button
    >
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item">
            <a class="nav-link" href="login.html">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.html">Salir</a>
        </li>
    </ul>
</nav>

<?php } ?>