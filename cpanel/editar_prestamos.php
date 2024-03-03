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
		<title>Editar préstamos - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Editar préstamos'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>

<?php
	// Verificar si se proporciona la ID de préstamo en la URL
	if (isset($_GET['id'])) {
		$id_prestamo = $_GET['id'];
		
		// Función para mostrar "Sin libro" si el valor/resultado del libro es nulo.
		function no_hay_datos($resultado_2) {
			return ($resultado_2 === null) ? "Sin libro" : $resultado_2;
		}
		
		// Consultar la tabla de préstamo
		$query = "SELECT prestamos.id_prestamo,
		usuario.id_usuario,usuario.identificacion,usuario.nombre_completo,usuario.correo,
		libros_1.titulo AS libro_1, libros_2.titulo AS libro_2, libros_3.titulo AS libro_3,
		prestamos.fecha_prestamo, prestamos.fecha_devolucion, prestamos.estado, prestamos.permiso
		FROM prestamos
		LEFT JOIN usuario ON prestamos.id_usuario =usuario.id_usuario
		LEFT JOIN libros AS libros_1 ON prestamos.id_libro_1 = libros_1.id_libro
		LEFT JOIN libros AS libros_2 ON prestamos.id_libro_2 = libros_2.id_libro
		LEFT JOIN libros AS libros_3 ON prestamos.id_libro_3 = libros_3.id_libro
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
												<form method="post" action="editar_prestamos.php?id=<?php echo $fila['id_prestamo']; ?>">
													<div class="login-form mb-10">
														<h2 class="login-title-1 mb-2">
															<center>
																Formulario para editar préstamos registrados.
															</center>
														</h2>
														<div class="row">
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-drivers-license-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Identificación de usuario
																</label>
																<input
																	class="form-control"
																	type="tel"
																	value="<?php echo $fila['identificacion']; ?>"
																	title=""
																	readonly
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Nombre completo
																</label>
																<input
																	class="form-control"
																	type="text"
																	value="<?php echo $fila['nombre_completo']; ?>"
																	title=""
																	readonly
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Correo electrónico
																</label>
																<input
																	class="form-control"
																	type="email"
																	value="<?php echo $fila['correo']; ?>"
																	title=""
																	readonly
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-text-width fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Titulo del primer libro
																</label>
																<input
																	class="form-control"
																	type="text"
																	value="<?php echo no_hay_datos($fila['libro_1']); ?>"
																	title=""
																	readonly
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-text-width fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Titulo del segundo libro
																</label>
																<input
																	class="form-control"
																	type="text"
																	value="<?php echo no_hay_datos($fila['libro_2']); ?>"
																	title=""
																	readonly
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-text-width fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Titulo del tercer libro
																</label>
																<input
																	class="form-control"
																	type="text"
																	value="<?php echo no_hay_datos($fila['libro_3']); ?>"
																	title=""
																	readonly
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-calendar-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Inicio del préstamo
																</label>
																<input
																	class="form-control"
																	type="date"
																	value="<?php echo $fila['fecha_prestamo']; ?>"
																	title=""
																	minlength="8"
																	maxlength="10"
																	pattern="<?php echo base_input_fecha; ?>"
																	readonly
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-calendar-times-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Finalización del préstamo
																</label>
																<input
																	class="form-control"
																	type="date"
																	value="<?php echo $fila['fecha_devolucion']; ?>"
																	title=""
																	minlength="8"
																	maxlength="10"
																	pattern="<?php echo base_input_fecha; ?>"
																	readonly
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-toggle-on fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Estado del préstamo
																</label>
																<select
																	class="nice-select form-control myniceselect wide"
																	name="estado"
																	title=""
																	tabindex="-1"
																	required
																>
<?php
			$estado = $fila['estado'];
			if ($estado == 1) {
				$estado = 'Devuelto';
			} else {
				$estado = 'Prestado';
			}
?>
																	<option data-display="<?php echo $estado; ?>" value="<?php echo $fila['estado'] ?>"><?php echo $estado; ?></option>
<?php
			if ($estado == 'Prestado') {
			echo '
																	<option value="1">Devuelto</option>';
			} elseif ($estado == 'Devuelto') {
			echo '
																	<option value="2">Prestado</option>';
			}
?>
																
																</select>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-toggle-on fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Permiso del préstamo
																</label>
																<select 
																	class="nice-select form-control myniceselect wide"
																	name="permiso"
																	title=""
																	tabindex="-1"
																	required
																>
<?php
	$permiso = $fila['permiso'];
	if ($permiso == 1) {
		$permiso = 'Aprobado';
	} else {
		$permiso = 'Desaprobado';
	}
?>
																	<option data-display="<?php echo $permiso; ?>" value="<?php echo $fila['permiso'] ?>"><?php echo $permiso; ?></option>
<?php
	if ($permiso == 'Desaprobado') {
	echo '
																	<option value="1">Aprobado</option>';
	} elseif ($permiso == 'Aprobado') {
	echo '
																	<option value="2">Desaprobado</option>';
	}
?>
																
																</select>
															</div>
															<div><hr /></div>
															<center>
																<div class="row row-cols pt-3">
																	<div class="col mb-3">
																		<button class="btn btn-custom-size lg-size btn-primary" type="submit" name="actualizar" style="color: white; text-shadow: 1px 1px 2px #060606;">
																			Actualizar
																		</button>
																	</div>
																	<div class="col">
																		<a class="btn btn-custom-size lg-size btn-primary" href="administrar_prestamos.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
																			Cancelar
																		</a>
																	</div>
																</div>
															</center>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
<?php
		} else {
	echo '
								<script>
									Swal.fire({
										title: "ERROR AL EDITAR EL PRÉSTAMO!",
										icon: "error",
										html: "El registro del préstamo que intenta editar, no existe. Use el botón a continuación para volver al listado de préstamos registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "ADMINITRAR PRÉSTAMOS",
									}).then(function(){
										window.location="administrar_prestamos.php";
									});
								</script>
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- Product Area End Here -->
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
		
		// Antes de comprobar si el formulario se ha enviado y procesar los datos, verificamos la conexión con la base de datos.
		require_once('../includes/conexion.php');
		// Comprobamos si el formulario se ha enviado.
		if (isset($_POST['actualizar'])) {
			// Recibimos y obtenemos los datos del formulario.
			$estado = $_POST['estado'];
			$permiso = $_POST['permiso'];
			
			// Actualizar los datos en la tabla prestamos
			$query = "UPDATE prestamos SET estado='$estado', permiso='$permiso' WHERE id_prestamo = '$id_prestamo'";
			if (mysqli_query($conexion, $query)) {
	echo '
								<script>
									Swal.fire({
										title: "PRÉSTAMO EDITADO EXITOSAMENTE!",
										icon: "success",
										html: "Use el botón a continuación para volver al listado de préstamos registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#219f16",
										confirmButtonText: "ADMINISTRAR PRÉSTAMOS",
									}).then(function(){
										window.location="administrar_prestamos.php";
									});
								</script>
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- Product Area End Here -->
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
			} else {
	echo '
								<script>
									Swal.fire({
										title: "ERROR AL EDITAR EL PRÉSTAMO!",
										icon: "error",
										html: "Parece haber un error con las opciones seleccionadas, verifique las opciones disponibles e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "OK",
									});
								</script>
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- Product Area End Here -->
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
		}
	} else {
	echo '
								<script>
									Swal.fire({
										title: "ERROR AL EDITAR EL PRÉSTAMO!",
										icon: "error",
										html: "El registro del préstamo que intenta editar, no existe. Use el botón a continuación para volver al listado de préstamos registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "ADMINITRAR PRÉSTAMOS",
									}).then(function(){
										window.location="administrar_prestamos.php";
									});
								</script>
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- Product Area End Here -->
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