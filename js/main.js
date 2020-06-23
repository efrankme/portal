$(function () {
	// Eventos del index y registro
	$("#login").submit(function (e) {
		e.preventDefault();

		let usuario = $("#usuario").val();
		let clave = $("#clave").val();

		$.post("iniciar_sesion.php", { usuario: usuario, clave: clave }, function (
			sesion
		) {
			if (sesion == true) {
				location = "admin.php";
			} else {
				popup("Algo pasó, intente luego", "danger");
			}
		});
	});

	// Registrar usuario
	$("#registrar").click(function () {
		// $(this).attr("disabled", "disabled");

		//Validación
		var form = $("#registro");
		form.validate({
			rules: {
				usuario: {
					required: true,
					rangelength: [5, 20],
				},
				clave: {
					minlength: 4,
				},
				clave2: {
					required: true,
					equalTo: "#clave",
				},
				email: {
					required: true,
					email: true,
				},
				nombre: {
					required: true,
					minlength: 3,
				},
				apellido: {
					required: true,
					minlength: 3,
				},
				cedula: {
					required: true,
					minlength: 4,
				},
				fechanac: {
					required: true,
					// max: "2005-01-01",
				},
				telefono: {
					required: true,
					minlength: 7,
				},
				direccion: {
					required: true,
					minlength: 5,
				},
				ciudad: {
					required: true,
					minlength: 3,
				},
				estado: {
					required: true,
					minlength: 4,
				},
				codigopostal: {
					required: true,
					minlength: 4,
				},
			},
		});

		if (form.valid()) {
			var datos = $("#registro").serialize();

			$.post("crear.php", datos).done(function (registro) {
				if (registro) {
					popup("Usuario registrado con éxito", "success");
					setTimeout(function () {
						location = "index.php";
					}, 30000);
				} else {
					popup("Algo pasó, intente más tarde", "danger");
				}
			});
		}
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

	// Mostrar mensajes
	function popup(msj, tipo) {
		$("#msg")
			.addClass("alert alert-" + tipo)
			.text(msj)
			.fadeIn("slow")
			.delay(2500)
			.fadeOut("normal");
	}

	// Agrega fondo al login y registro
	var url = location.pathname;
	if (url == "/portal/index.php" || url == "/portal/registro.php") {
		$("body").addClass("fondo");
	}

	//// Eventos admin.php ////

	function cargaUsuarios() {
		$("#users").load("tabla_usuarios.php");
	}

	cargaUsuarios();

	var id;

	// ver usuario
	$("#users").on("click", ".btn-ver", function () {
		id = $(this).parents().eq(1).attr("user-id");
		$.post("ver.php", { id: id }).done(function (data) {
			$("#ver-modal .modal-body").html(data);
		});
	});

	//editar usuario
	$("#users").on("click", ".btn-editar", function () {
		id = $(this).parent().parent().attr("user-id");
		$.post("editar.php", { id: id, consul: "true" }).done(function (user) {
			user = $.parseJSON(user);
			// llenamos form con datos
			$("#id").val(id);
			$("#usuario").val(user.usuario);
			$("#nombre").val(user.nombre);
			$("#apellido").val(user.apellido);
			$("#email").val(user.email);
			$("#cedula").val(user.cedula);
			$("#fechanac").val(user.fechanac);
			$("#telefono").val(user.telefono);
			$("#direccion").val(user.direccion);
			$("#ciudad").val(user.ciudad);
			$("#estado").val(user.estado);
			$("#codigopostal").val(user.codigopostal);

			$("#editar").on("click", function () {
				//Validación
				var form = $("#form-editar");
				form.validate({
					rules: {
						email: {
							required: true,
							email: true,
						},
						nombre: {
							required: true,
							minlength: 3,
						},
						apellido: {
							required: true,
							minlength: 3,
						},
						cedula: {
							required: true,
							minlength: 4,
						},
						fechanac: {
							required: true,
							max: "2005-01-01",
						},
						telefono: {
							required: true,
							minlength: 7,
						},
						direccion: {
							required: true,
							minlength: 5,
						},
						ciudad: {
							required: true,
							minlength: 3,
						},
						estado: {
							required: true,
							minlength: 4,
						},
						codigopostal: {
							required: true,
							minlength: 4,
						},
					},
				});
				if (form.valid()) {
					var data = form.serialize();
					$.post("editar.php", data).done(function (resp) {
						if (resp) {
							$("#editar-modal").modal("hide");
							popup("Usuario se editó correctamente", "success");
							cargaUsuarios();
						}
					});
				}
			});
		});
	});

	// borrar usuario
	$("#users").on("click", ".btn-borrar", function () {
		id = $(this).parents().eq(1).attr("user-id");
		$.post("borrar.php", { id: id }).done(function (data) {
			$("#borrar-modal .modal-body").html(data);
		});

		$("#borrar").click(function () {
			var html = $("#borrar-modal .modal-body").html();
			$("#borrar-modal .modal-body").html(
				html +
					`<div class="text-center">
					<p>Esta seguro que desea eliminar?</p>
					<button class="btn btn-primary" id="modal-btn-si">Si</button>
        <button class="btn btn-warning" id="modal-btn-no">No</button></div>`
			);

			$("#borrar-modal").on("click", "#modal-btn-si", function () {
				$.get("borrar.php", { id: id }).done(function (data) {
					if (data) {
						$("#borrar-modal").modal("hide");
						popup("Usuario se eliminó del sitio", "danger");
						cargaUsuarios();
					}
				});
			});
		});
	});

	//cerrar sesión
	$("#salir").click(function (e) {
		e.preventDefault();
		$.post("cerrar.php").done(function () {
			location = "index.php";
		});
	});

	// Chequear inactividad

	var idleTimer = null;

	$(document).on("click scroll", function () {
		clearTimeout(idleTimer);

		// Reactivar ult acceso
		$.post("sesion.php");

		idleTimer = setTimeout(function () {
			// Inactividad detectada
			$.post("sesion.php", { sesion: "off" }, function (resp) {
				if (resp) {
					console.log("Inactividad detectada");
					location = "index.php";
				}
			});
		}, 600000);
	});

	$("body").trigger("click");
});
