<?php
	ob_start();
	
	// Sesión
	require_once('../includes/session_usuarios.php');
	
	// Permiso
	require_once('../includes/sin_permiso_prestamos.php');
	
	// Include
	require_once('../includes/includes.php');
?>
<!DOCTYPE html>
<html lang="es">
	<!-- .Head -->
	<head>
		<!-- .UTF-8 -->
		<?php echo base_utf8_php; ?>
		
		<?php echo base_utf8_2_php; ?>
		
		<!-- .Titulo -->
		<title>Préstamo exitoso - <?php echo base_titulo_2; ?></title>
		
		<!-- .CSS -->
		<?php include('../css.php'); ?>
		
		<!-- .Indexación -->
		<?php echo base_sin_indexacion; ?>
		
		<!-- .Meta -->
		<?php include('../meta.php'); ?>
		
	</head>
	<!-- .Body -->
	<body style="background-color: #dbdbdb;">
		<div class="main-wrapper">
			<!-- .Menú -->
			<?php include('menu.php'); ?>
			
			<main class="main-content">
				<div class="product-area section-space-y-axis">
					<div class="containerr">
						<div class="roww">
							<div class="col-xl-3 col-lg-4 pt-lg-0 d-none d-lg-block" style="text-shadow: 1px 1px 2px #060606;">
								<div class="sidebar-area style-3" style="background-color: #060606; min-height: 105%; box-sizing: border-box;">
<?php include('../includes/global_menu.php'); ?>
									
								</div>
							</div>
<?php const base_tabla_titulo = 'Préstamo exitoso'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-10 pt-5" style="margin: 0 auto;">
												<div class="login-form mb-10">
													<div class="row">
														<center>
															<h2 class="login-title-1 pt-5 mb-5">
																<hr class="style-three" />
															</h2>
															<div class="row">
																<div class="error-404-content">
<?php
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
																	<h1 class="title" style="line-height: 40px;">
																		¡Felicidades, enhorabuena!
																	</h1>
																	<h2 class="col-lg-9 sub-title mb-5">
																		Tu préstamo ha sido registrado exitosamente.
																		<br />
																		Recuerda regresar los libros antes de la fecha limite para la devolución: <span>' . $fila['fecha_devolucion'] . '</span>
																	</h2>
																	<img src="'.base_urls.'recursos/img/banner/baner-prestamo.jpg'.$codificacion.'" />';
					} elseif ($estado == 1) {
						header('Location: home.php');
						ob_end_flush();
						exit;
					}
				} else {
					if ($estado == 2) {
	echo '
																	<h1 class="title" style="line-height: 40px;">
																		¡Fecha de devolución, excedida!
																	</h1>
																	<h2 class="col-lg-9 sub-title mb-5">
																		La fecha limite para la devolución: <span>' . $fila['fecha_devolucion'] . '</span>, ha expirado.
																		<br />
																		Le recordamos por favor devolver los libros prestados.
																	</h2>
																	<img src="'.base_urls.'recursos/img/banner/baner-prestamo_2.jpg'.$codificacion.'" />';
					} elseif ($estado == 1) {
						header('Location: home.php');
						ob_end_flush();
						exit;
					}
				}
			}
		} else {
			header('Location: home.php');
			ob_end_flush();
			exit;
		}
	}
	
	// Cerramos la conexión con la base de datos
	mysqli_close($conexion);
?>
																
																</div>
																<div class="pt-8 mb-5">
																	<a class="btn btn-custom-size lg-size btn-primary" href="home.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
																		Volver al inicio
																	</a>
																</div>
															</div>
															<h2 class="login-title-1">
																<hr class="style-three mb-8" />
															</h2>
														</center>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- Main Content Area End Here -->
		</div>
		
		<!-- .Final -->
		<?php include('final.php'); ?>
		
		<!-- .Script -->
		<?php include('../script.php'); ?>
	
	</body>
</html>
<?php
	ob_end_flush();
	exit;
?>