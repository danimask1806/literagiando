<div class="alertt alert-carrito" role="alert">
									<table style="width: 100%;">
										<tr>
											<td style="text-align: left; color: white; font-size: 25px;">
												<?php echo base_tabla_titulo; ?>
											
											</td>
											<td style="text-align: right;">
												<div class="header-right">
													<ul>
														<li class="minicart-wrap d-lg-block" style="text-align: right;">
<?php
	require_once('../includes/conexion.php');
	if (isset($id_usuario)) {
		
		// Realizar una consulta SQL para obtener los préstamos relacionados con el usuario
		$query = "SELECT * FROM prestamos WHERE id_usuario = '$id_usuario' ORDER BY id_prestamo DESC LIMIT 1";
		$resultado = mysqli_query($conexion, $query);
		
		if (mysqli_num_rows($resultado) > 0) {
			
			// Iterar a través de los registros de préstamos y mostrar la información
			while ($fila = mysqli_fetch_assoc($resultado)) {
				$fechaDevolucion = $fila['fecha_devolucion'];
				$fechaActual = date('Y-m-d');
				$estado = $fila['estado'];
				
				if ($fechaDevolucion >= $fechaActual) {
					if ($estado == 2) {
	echo '
															<span class="minicart-btn" data-tippy="Carrito de préstamos<br />Fecha de devolución: ' . $fila['fecha_devolucion'] . '" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">';
					} elseif ($estado == 1) {
	echo '
															<span class="minicart-btn" data-tippy="Carrito de préstamos<br />Solicitar un nuevo préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">';
					}
				} else {
					if ($estado == 2) {
	echo '
															<span class="minicart-btn" data-tippy="Carrito de préstamos<br />Fecha de devolución: Excedida<br />Devuelva los libros prestados" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">';
					} elseif ($estado == 1) {
	echo '
															<span class="minicart-btn" data-tippy="Carrito de préstamos<br />Solicita un nuevo préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">';
					}
				}
			}
		} else {
	echo '
															<span class="minicart-btn" data-tippy="Carrito de préstamos<br />Solicitar mi primer préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">';
		}
	}
	
	// Obtener el ID del usuario de la sesión activa.
	$id_usuario = $_SESSION['id_usuario']; // Asumiendo que utilizas sesiones para almacenar el ID del usuario
	$query = "SELECT SUM(IF(id_libro_1 IS NOT NULL, 1, 0) + IF(id_libro_2 IS NOT NULL, 1, 0) + IF(id_libro_3 IS NOT NULL, 1, 0)) AS total_prestamos
	FROM prestamos
	WHERE id_usuario = '$id_usuario' AND estado = 2";
	$resultado = mysqli_query($conexion, $query);
	
	if ($resultado) {
		$fila = mysqli_fetch_assoc($resultado);
		$total_prestamos = $fila['total_prestamos'];
		if ($total_prestamos === null) {
			$total_prestamos = 0;
		}
	echo '
																<img src="'.base_urls.'recursos/img/icon/6.png'.$codificacion.'" />
																<span class="quantity">'.$total_prestamos.'</span>';
	} else {
		echo '';
	}
?>
															
															</span>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</table>
								</div>