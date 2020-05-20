$(function () {
  // Eventos del index y registro
  $("#login").submit(function (e) {
    e.preventDefault();
    $("#iniciar_sesion").attr("disabled", "disabled");

    // $('form').validate({
    // reglas aquí
    //});

    let usuario = $("#usuario").val();
    let clave = $("#clave").val();

    $.post("iniciar_sesion.php", { usuario: usuario, clave: clave }, function (
      sesion
    ) {
      if (sesion == true) {
        location = "admin.php";
      } else {
        alertify.error("Algo pasó, intente más tarde");
      }
    });
  });

  $("#registrar").click(function () {
    $(this).attr("disabled", "disabled");

    // $('form').validate({
    // reglas aquí
    //});
    let usuario = $("#usuario").val();
    let clave = $("#clave").val();
    let email = $("#email").val();
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let cedula = $("#cedula").val();
    let fechanac = $("#fechanac").val();
    let telefono = $("#telefono").val();
    let direccion = $("#direccion").val();
    let ciudad = $("#ciudad").val();
    let estado = $("#estado").val();
    let codigopostal = $("#codigopostal").val();

    $.post(
      "crear_usuarios.php",
      {
        usuario: usuario,
        clave: clave,
        email: email,
        nombre: nombre,
        apellido: apellido,
        cedula: cedula,
        fechanac: fechanac,
        telefono: telefono,
        direccion: direccion,
        ciudad: ciudad,
        estado: estado,
        codigopostal: codigopostal,
      },
      function (registro) {
        if (registro == true) {
          alertify.success("Usuario registrado con éxito");
          setTimeout(function () {
            location = "index.php";
          }, 3000);
        } else {
          alertify.error("Algo pasó, intente más tarde");
        }
      }
    );
  });

  // Eventos template
  // Toggle sidebar
  $("#menu").on("click", function (e) {
    e.preventDefault();
    $("body").toggleClass("sb-sidenav-toggled");
  });

  // Agregar class active links
  var ruta = window.location.href;
  $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
    if (this.href === ruta) {
      $(this).addClass("active");
    }
  });


  // Eventos admin.php

  // cargar usuarios
  function cargarUsuarios() {
    $(".table-responsive").load("tabla_usuarios.php");
  }

  cargarUsuarios();

});
