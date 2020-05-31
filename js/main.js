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
	
	var id;

	// ver usuario
	$("#users").on("click", ".btn-ver", function () {
		id = $(this).parents().eq(1).attr('user-id');
		$.post('ver_usuario.php',{ id: id })
		.done(function(data){
			$("#ver-modal .modal-body").html(data);
		})
	});


	//editar usuario
	$('#users').on('click','.btn-editar',function(){
		id = $(this).parent().parent().attr('user-id');
		$.post('editar.php',{ id : id, consul : 'true'})
			.done(function(user){
				user = $.parseJSON(user)
				$("#editar-modal .modal-body").append(`
					<form id="edicion" method="post">           
              <div class="form-group">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" disabled value="${user.usuario}">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="${user.email}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="${user.nombre}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="${user.apellido}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula" value="${user.cedula}">
              </div>
              <div class="form-group">
                <input type="date" id="fechanac" name="fechanac" class="form-control" value="${user.fechanac}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="${user.telefono}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="${user.direccion}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="${user.ciudad}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="${user.estado}">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="codigopostal" name="codigopostal" placeholder="Código postal" value="${user.codigopostal}">
              </div>
						</form>`);
				$('#editar').on('click',function(){
					//Validación
					var data = $('#edicion').serialize();
					$.post('editar.php',data)
						.done(function(resp){
							if (resp){
								alert('ok');
							}
						});
				})
			})
	})
  
  
	//cerrar sesión
	$("#salir").click(function (e) {
		e.preventDefault();
		$.post("cerrar.php").done(function () {
			location = "index.php";
		});
	});
});
