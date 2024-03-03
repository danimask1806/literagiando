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
													<h2 class="login-title-1 mb-2">
														<center>
															Listado de libros prestados.
														</center>
													</h2>
													<div class="row">
														<div><hr /></div>
														<h2 class="login-title-1 pt-5 mb-7 d-none d-lg-block">
															<center>
																<table>
																	<tr style="font-size: 18px;">
																		<th scope="col">
																			<center>
																				<div class="" style="width: 80px; height: 80px; border-radius: 50%; background: #eb8600; opacity: 0.50;" role="status"></div>
																				SELECCIÓNAR LIBROS
																			</center>
																		</th>
																		<th scope="col" style="width: 180px;">
																			<hr style="border: none; margin-bottom: 60px; height: 8px; background-color: #eb8600; opacity: 0.50;" role="status" />
																		</th>
																		<th scope="col">
																			<center>
																				<div class="" style="width: 80px; height: 80px; border-radius: 50%; background: #eb8600; opacity: 0.50;" role="status"></div>
																				PROCESAR FORMULARIO
																			</center>
																		</th>
																		<th scope="col" style="width: 180px;">
																			<hr style="border: none; margin-bottom: 60px; height: 8px; background-color: #eb8600; opacity: 0.50;" role="status" />
																		</th>
																		<th scope="col">
																			<center>
																				<div class="spinner-grow" style="width: 80px; height: 80px; color:#eb8600;" role="status"></div>
																				VERIFICAR PRÉSTAMO
																			</center>
																		</th>
																	</tr>
																</table>
															</center>
														</h2>
														<div class="table-responsive small">
															<fieldset required>
																<table class="table table-bordered table-hover">
																	<tbody style="border: 3px solid #fff5f5;">
																		<tr style="border: 3px solid #fff5f5; font-size: 18px;">
																			<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Código</th>
																			<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Portada</th>
																			<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Título del libro</th>
																			<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Estado</th>
																			<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Seleccionar</th>
																		</tr>
<?php
	if (isset($id_usuario)) {
		// Funciones para mostrar vacios los campos correspondientes si el contenido deseado no existe o si su valor es nulo
		function codigo($codigo) {
			return ($codigo === null) ? "" : '00' . $codigo;
		}
		function titulo($titulo) {
			return ($titulo === null) ? "" : $titulo;
		}
		function disponibilidad($disponibilidad) {
			if ($disponibilidad === null) {
				return "";
			} else {
				// Cambiar 1 a "Disponible" y 2 a "Agotado"
				return ($disponibilidad == 1) ? 'Disponible' : 'Agotado';
			}
		}
		function portada_libro($id_libro, $codificacion) {
			$contenido = ($id_libro === null) ? "" : '
			<img src="'.base_urls.'recursos/img/portadas/'.$id_libro.$codificacion.'" height="100%" style="max-width: 100px; align-items: center;" />';
			return $contenido;
		}
		function checkbox($id_libro) {
			$contenido = ($id_libro === null) ? "" : '
			<label class="form-check-label">
				<input class="input-checkbox" type="checkbox" name="id_libro_'.$id_libro.'" onchange="updateSelectedCount()" checked disabled style="transform: scale(2.0); margin-bottom: 0px; margin-top: 10px;" />
			</label>';
			return $contenido;
		}

		// Realizar una consulta SQL para obtener los libros del préstamo relacionado al usuario
		$query = "SELECT prestamos.id_prestamo, prestamos.fecha_prestamo, prestamos.fecha_devolucion,
		usuario.id_usuario,usuario.usuario,usuario.nombre_completo,usuario.foto_perfil,usuario.identificacion,usuario.correo,
		libros_1.id_libro AS id_libro_1, libros_1.titulo AS titulo_libro_1, libros_1.portada AS portada_libro_1, libros_1.disponible AS disponibilidad_libro_1,
		libros_2.id_libro AS id_libro_2, libros_2.titulo AS titulo_libro_2, libros_2.portada AS portada_libro_2, libros_2.disponible AS disponibilidad_libro_2,
		libros_3.id_libro AS id_libro_3, libros_3.titulo AS titulo_libro_3, libros_3.portada AS portada_libro_3, libros_3.disponible AS disponibilidad_libro_3,
		permisos.permiso, estados.estado
		FROM prestamos
		LEFT JOIN usuario ON prestamos.id_usuario =usuario.id_usuario
		LEFT JOIN libros AS libros_1 ON prestamos.id_libro_1 = libros_1.id_libro
		LEFT JOIN libros AS libros_2 ON prestamos.id_libro_2 = libros_2.id_libro
		LEFT JOIN libros AS libros_3 ON prestamos.id_libro_3 = libros_3.id_libro
		LEFT JOIN estados ON prestamos.estado = estados.id_estado
		LEFT JOIN permisos ON prestamos.permiso = permisos.id_permiso
		WHERE prestamos.id_usuario = $id_usuario ORDER BY id_prestamo DESC LIMIT 1";
		$resultado = mysqli_query($conexion, $query);
		if ($resultado !== false) {
			if ($resultado->num_rows > 0) {
				while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																		<tr style="border: 3px solid #fff5f5;">
																			<td style="border: 3px solid #fff5f5; width: 130px; font-size: 18px; align-items: center;">
																				' . codigo($fila["id_libro_1"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; align-items: center;">
																				' . portada_libro($fila["portada_libro_1"], $codificacion) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 270px; align-items: center;">
																				' . titulo($fila["titulo_libro_1"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; font-size: 18px; align-items: center;">
																				' . disponibilidad($fila["disponibilidad_libro_1"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; align-items: center;">
																				' . checkbox($fila["id_libro_1"]) . '
																			</td>
																		</tr>
																		<tr style="border: 3px solid #fff5f5;">
																			<td style="border: 3px solid #fff5f5; width: 130px; font-size: 18px; align-items: center;">
																				' . codigo($fila["id_libro_2"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; align-items: center;">
																				' . portada_libro($fila["portada_libro_2"], $codificacion) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 270px; align-items: center;">
																				' . titulo($fila["titulo_libro_2"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; font-size: 18px; align-items: center;">
																				' . disponibilidad($fila["disponibilidad_libro_2"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; align-items: center;">
																				' . checkbox($fila["id_libro_2"]) . '
																			</td>
																		</tr>
																		<tr style="border: 3px solid #fff5f5;">
																			<td style="border: 3px solid #fff5f5; width: 130px; font-size: 18px; align-items: center;">
																				' . codigo($fila["id_libro_3"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; align-items: center;">
																				' . portada_libro($fila["portada_libro_3"], $codificacion) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 270px; align-items: center;">
																				' . titulo($fila["titulo_libro_3"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; font-size: 18px; align-items: center;">
																				' . disponibilidad($fila["disponibilidad_libro_3"]) . '
																			</td>
																			<td style="border: 3px solid #fff5f5; width: 160px; align-items: center;">
																				' . checkbox($fila["id_libro_3"]) . '
																			</td>
																		</tr>';
				}
			} else {
	echo '
																		<script>
																			Swal.fire({
																				title: "LISTADO DE LIBROS, NO DISPONIBLE!",
																				icon: "warning",
																				html: "La tabla SQL: <font color=#d51a1a>libros</font>, se encuentra vacía en este momento.",
																				allowOutsideClick: false,
																				showCloseButton: false,
																				showCancelButton: false,
																				focusConfirm: false,
																				confirmButtonColor: "#ff7800",
																				confirmButtonText: "OK",
																			});
																		</script>';
			}
		} else {
	echo '
																		<script>
																			Swal.fire({
																				title: "ERROR AL CARGAR EL LISTADO DE LIBROS DISPONIBLES!",
																				icon: "error",
																				html: "La tabla SQL: <font color=#d51a1a>libros</font>, no esta siendo especificada o es posible que haya un error en la consulta.",
																				allowOutsideClick: false,
																				showCloseButton: false,
																				showCancelButton: false,
																				focusConfirm: false,
																				confirmButtonColor: "#d51a1a",
																				confirmButtonText: "OK",
																			});
																		</script>';
			
		}
	}
	// Cerramos la conexión con la base de datos
	mysqli_close($conexion);
?>
																		
																	</tbody>
																</table>
															</fieldset>
														</div>
														<div><hr /></div>
														<center>
															<div class="row row-cols pt-3">
																<div class="col">
																	<a class="btn btn-custom-size lg-size btn-primary" href="prestamos_solicitados.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
																		Continuar
																	</a>
																</div>
															</div>
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
		
		<!-- .Control de libros -->
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/libros_no_seleccionados.js<?php include('../includes/codificacion.php'); ?>"></script>
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/libros_no_seleccionados_2.js<?php include('../includes/codificacion.php'); ?>"></script>
	
	</body>
</html>
<?php
	ob_end_flush();
	exit;
?>