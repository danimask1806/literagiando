<?php
	ob_start();
	
	// Sesión
	require_once('../includes/session_staff.php');
	
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
		<title>Eliminar préstamo - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Eliminar préstamo'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
	
<?php
	// Verificar si se proporciona la ID de préstamo en la URL
	if (isset($_GET['id'])) {
		$id_prestamo = $_GET['id'];
		
		// Obtener los datos actuales del préstamo
		$query = "SELECT prestamos.id_prestamo, prestamos.fecha_prestamo, prestamos.fecha_devolucion, prestamos.estado,
		usuario.id_usuario,usuario.identificacion AS identificacion,usuario.usuario AS usuario,usuario.nombre_completo AS nombre_completo,usuario.correo AS correo,
		libros_1.titulo AS libro_1, libros_2.titulo AS libro_2, libros_3.titulo AS libro_3,
		permisos.permiso
		FROM prestamos
		LEFT JOIN usuario ON prestamos.id_usuario =usuario.id_usuario
		LEFT JOIN usuario AS usuario ON prestamos.id_usuario = usuario.id_usuario
		LEFT JOIN usuario AS identificacion ON prestamos.id_usuario = identificacion.id_usuario
		LEFT JOIN usuario AS nombre_completo ON prestamos.id_usuario = nombre_completo.id_usuario
		LEFT JOIN usuario AS correo ON prestamos.id_usuario = correo.id_usuario
		LEFT JOIN libros AS libros_1 ON prestamos.id_libro_1 = libros_1.id_libro
		LEFT JOIN libros AS libros_2 ON prestamos.id_libro_2 = libros_2.id_libro
		LEFT JOIN libros AS libros_3 ON prestamos.id_libro_3 = libros_3.id_libro
		LEFT JOIN permisos ON prestamos.permiso = permisos.id_permiso
		WHERE prestamos.id_prestamo = '$id_prestamo'";
		$resultado = mysqli_query($conexion, $query);
		if (mysqli_num_rows($resultado) > 0) {
			$fila = mysqli_fetch_assoc($resultado);
?>
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-11 pt-5" style="margin: 0 auto;">
												<div class="login-form mb-10">
													<div class="row">
														<form method="post" action="confirmar_eliminar_prestamos.php?id=<?php echo $fila['id_prestamo']; ?>">
															<input type="hidden" name="id_prestamo" value="<?php echo $fila['id_prestamo']; ?>" />
															<center>
																<h2 class="login-title-1 pt-5">
																	<hr class="style-three mb-5" />
																</h2>
																<div class="row">
																	<div class="error-404-content">
																		<h1 class="title mb-7" style="line-height: 40px;">
																			¡Eliminación de préstamo!
																		</h1>
																		<h2 class="sub-title mb-9">
																			Esta por eliminar el préstamo perteneciente:
																			<br />
																			al usuario: <span><?php echo $fila['usuario'] ?></span>.
																			<div><br /></div>
																			Tenga en cuenta que una vez realizada esta
																			<br />
																			acción, la misma no podrá ser deshecha.
																		</h2>
																	</div>
																	<div class="row row-cols mb-5">
																		<div class="col mb-3">
																			<button class="btn btn-custom-size lg-size btn-primary" type="submit" name="eliminar" style="color: white; text-shadow: 1px 1px 2px #060606;">
																				Continuar
																			</button>
																		</div>
																		<div class="col">
																			<a class="btn btn-custom-size lg-size btn-primary" href="administrar_prestamos.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
																				Cancelar
																			</a>
																		</div>
																	</div>
																</div>
																<h2 class="login-title-1 mb-5">
																	<hr class="style-three mb-8" />
																</h2>
															</center>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
<?php
		} else {
	echo '
								<script>
									Swal.fire({
										title: "PRÉSTAMO NO ENCONTRADO!",
										icon: "error",
										html: "Parece que hubo un error al seleccionar al prestamo, verifique la existencia del prestamo e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "OK",
									}).then(function(){
										window.location="administrar_prestamos.php";
									});
								</script>';
	echo '
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- Main Content Area End Here -->
		</div>';
	echo '
		<!-- .Final-->';
		include("final.php");
		
	echo '
		<!-- .Script -->';
		include("../script.php");
		
	echo '
	</body>
</html>';
			ob_end_flush();
			exit;
		}
	} else {
	echo '
								<script>
									Swal.fire({
										title: "PRÉSTAMO SIN ESPECIFICAR!",
										icon: "error",
										html: "Parece que hubo un error con el prestamo seleccionado, verifique la selección del prestamo e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "OK",
									}).then(function(){
										window.location="administrar_prestamos.php";
									});
								</script>';
	echo '
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- Main Content Area End Here -->
		</div>';
	echo '
		<!-- .Final-->';
		include("final.php");
		
	echo '
		<!-- .Script -->';
		include("../script.php");
		
	echo '
	</body>
</html>';
		ob_end_flush();
		exit;
	}
	
	// Cerramos la conexión con la base de datos
	mysqli_close($conexion);
?>
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