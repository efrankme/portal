<?php

function formatFecha($fecha)
{
	$fecha = date_create($fecha);
	return date_format($fecha, 'd-m-Y');
}
