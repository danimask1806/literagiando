<?php
	// Iniciar la sesión
	session_start();
	
	// Verificar si la sesión está activa
	if (isset($_SESSION['id_usuario'])) {
		$id_usuario = $_SESSION['id_usuario'];
		require_once('../includes/conexion.php');
	} else {
		// Redirigir si la sesión no está activa o el usuario no ha iniciado sesión
		header('Location: ../logout.php');
		exit;
	}
?>