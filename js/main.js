$(function () {
	// Eventos del index y registro
	$("#login").submit(function (e) {
		e.preventDefault();

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
				$("#msg")
					.addClass("alert alert-danger")
					.text("Algo pasó, intente más tarde")
					.fadeIn("slow", ocultaMsg);
			}
		});
	});

	$("#registrar").click(function () {
		$(this).attr("disabled", "disabled");

		var datos = $("#registro").serialize();
		console.log(datos);

		$.post("crear_usuarios.php", datos).done(function (registro) {
			if (registro) {
				alertify.success("Usuario registrado con éxito");
				setTimeout(function () {
					location = "index.php";
				}, 3000);
			} else {
				alertify.error("Algo pasó, intente más tarde");
			}
		});
	});

	//// Eventos template ////
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

	// Ocultar mensajes
	function ocultaMsg() {
		$("#msg")
			.delay(1000)
			.fadeOut("normal", function () {
				$(this).remove();
			});
	}

	// Agrega fondo al login y registro
	var url = location.pathname;
	if (url == "/portal/index.php" || url == "/portal/registro.php") {
		$("body").addClass("fondo");
	}

	//// Eventos admin.php ////

  function cargaUsuarios(){
    $("#users").load("tabla_usuarios.php");
  }

	cargaUsuarios();
	

	// ver usuario
	$("#users").on("click", "#datatable .btn-ver", function () {
		var id = $(this).parents().eq(1).attr('user-id');
		$.post('ver_usuario.php',{ id: id })
		.done(function(data){
			$("#ver-modal .modal-body").html(data);
		})
	});
  
  
	//cerrar sesión
	$("#salir").click(function (e) {
		e.preventDefault();
		$.post("cerrar.php").done(function () {
			location = "index.php";
		});
	});
});
