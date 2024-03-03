<?php
	// Iniciar la sesión
	session_start();
	
	// Verificar si la sesión está activa
	if (isset($_SESSION['id_usuario'])) {
		$id_usuario = $_SESSION['id_usuario'];
		require_once('includes/conexion.php');
		header('Location: cpanel/home.php');
		exit;
	}
?>