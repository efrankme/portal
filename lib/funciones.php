<?php

function formatFecha($fecha)
{
	$fecha = date_create($fecha);
	return date_format($fecha, 'd-m-Y');
}

function verificaInactividad()
{
	// calculamos el tiempo transcurrido
	$ult_acceso = $_SESSION["ultimoAcceso"];
	$ahora = date("Y-n-j H:i:s");
	$tiempo_transcurrido = (strtotime($ahora) - strtotime($ult_acceso));
	//comparamos el tiempo transcurrido
	if ($tiempo_transcurrido >= 6000) {
		//si pasaron 10 minutos o más
		session_destroy(); // destruyo la sesión
		header("Location: index.php"); //envío al usuario a la pag. de autenticación
	} else {
		//sino, actualizo la fecha de la sesión
		$_SESSION["ultimoAcceso"] = $ahora;
	}
}
