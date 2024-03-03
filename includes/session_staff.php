<?php
	// Iniciar la sesión
	session_start();

	// Verificar si la sesión está activa
	if (isset($_SESSION['id_usuario'])) {
		$id_usuario = $_SESSION['id_usuario'];
		require_once('../includes/conexion.php');
		
		// Consulta SQL para obtener el rol del usuario
		$query = "SELECT rol FROM usuario WHERE id_usuario = $id_usuario";
		$resultado = $conexion->query($query);
		
		if ($resultado) {
			$fila = $resultado->fetch_assoc();
			$rol = $fila['rol'];
			
			if ($rol == 1) {
				// Si el "rol" es igual a 1(Staffs), no se hace nada
			} elseif ($rol == 2) {
				// Si el "rol" es igual a 2(Usuarios), redirigir al usuario
				header('Location: home.php');
				exit;
			}
		}
	} else {
		// Redirigir si la sesión no está activa o el usuario no ha iniciado sesión
		header('Location: ../logout.php');
		exit;
	}
?>