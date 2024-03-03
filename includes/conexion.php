<?php
	$conexion = mysqli_connect('host del servidor','usuario del servidor','contraseña del servidor');
	mysqli_select_db($conexion,'base de datos del servidor');
	$conexion->set_charset('UTF8');
?>