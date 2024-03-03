<?php
	// Consulta SQL para verificar si existe al menos un registro con permiso igual a 2
	$query = "SELECT COUNT(*) AS permiso_prestamos FROM prestamos WHERE id_usuario = $id_usuario AND permiso = '2'";
	$resultado = $conexion->query($query);
	
	if ($resultado) {
		$fila = $resultado->fetch_assoc();
		$permiso_prestamos = $fila['permiso_prestamos'];
		
		if ($permiso_prestamos > 0) {
			// Si existe al menos un registro con "permiso" igual a 2, el usuario permanece en la página actual
		} else {
			// Si no hay registros con "permiso" igual a 2, redirigir al usuario
			header('Location: catalogo_bibliografico.php');
			exit;
		}
	} 
?>