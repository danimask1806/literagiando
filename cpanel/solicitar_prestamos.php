<?php
	ob_start();
	
	// Sesión
	require_once('../includes/session_usuarios.php');
	
	// Permiso
	require_once('../includes/permiso_prestamos.php');
	
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
		<title>Solicitar préstamo - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Solicitar préstamo'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>

<?php
	// Obtener los datos actuales del usuario
	$query = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
	$resultado = mysqli_query($conexion, $query);
	if (mysqli_num_rows($resultado) > 0) {
		$fila = mysqli_fetch_assoc($resultado);
	
?>								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-10 pt-5" style="margin: 0 auto;">
												<form method="post" action="solicitar_prestamos.php" onsubmit="return validarFormulario()">
													<input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario']; ?>">
													<input type="hidden" name="verificar" id="verificar" value="0">
													<div class="login-form mb-10">
														<h2 class="login-title-1 mb-2">
															<center>
																Formulario para solicitar un préstamo.
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
																					<div class="spinner-grow" style="width: 80px; height: 80px; color:#eb8600;" role="status"></div>
																					PROCESAR FORMULARIO
																				</center>
																			</th>
																			<th scope="col" style="width: 180px;">
																				<hr style="border: none; margin-bottom: 60px; height: 8px; background-color: #eb8600; opacity: 0.50;" role="status" />
																			</th>
																			<th scope="col" style="padding:0rem 0rem 0rem 0.9rem;">
																				<center>
																					<div class="" style="width: 80px; height: 80px; border-radius: 50%; background: #eb8600; opacity: 0.50;" role="status"></div>
																					VERIFICAR PRÉSTAMO
																				</center>
																			</th>
																		</tr>
																	</table>
																</center>
															</h2>
															<h2 class="login-title-1">
																<center>
																	Datos del usuario solicitante.
																</center>
															</h2>
															<div class="col-lg-12 pt-2">
																<label>
																	<i class="fa fa-drivers-license-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Identificación de usuario
																</label>
																<input
																	class="form-control"
																	type="text"
																	value="<?php echo $fila['identificacion']; ?>"
																	title=""
																	minlength="8"
																	maxlength="11"
																	pattern="<?php echo base_input_identificacion; ?>"
																	onkeypress="<?php echo base_input_numeros; ?>"
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
																	minlength="4"
																	maxlength="50"
																	pattern="<?php echo base_input_nombre_completo; ?>"
																	onkeypress="<?php echo base_input_letras_espacios; ?>"
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
																	minlength="5"
																	maxlength="65"
																	pattern="<?php echo base_input_email; ?>"
																	readonly
																/>
															</div>
															<div><hr /></div>
															<h2 class="login-title-1">
																<center>
																	Listado de libros seleccionados.
																</center>
															</h2>
<?php
	}
	$query = "SELECT libros.id_libro, libros.titulo, libros.autor, libros.tema, libros.descripcion, libros.condicion_libro, libros.edades, libros.color, libros.formato, libros.link, libros.portada,
	libros.disponible
	FROM libros";
	$resultado = mysqli_query($conexion, $query);
	if ($resultado !== false) {
		if (mysqli_num_rows($resultado) > 0) {
			$fila = mysqli_fetch_assoc($resultado);
			
			// Verificar si se han seleccionado libros
			if(isset($_POST['id_libro_']) && count($_POST['id_libro_']) > 0) {
				// Obtener los IDs seleccionados
				$id = $_POST['id_libro_'];
				// Verificar si se han seleccionado más de tres libros
				if(count($id) > 3) {
					// Manejar el caso de más de tres libros seleccionados
echo '
															<script>
																Swal.fire({
																	title: "ERROR AL SELECCIONAR LIBROS!",
																	icon: "warning",
																	html: "La cantidad de libros seleccionados, fue superior a 3 libros. Debes seleccionar hasta un máximo de 3 libros y no menos de 1 libro.",
																	allowOutsideClick: false,
																	showCloseButton: false,
																	showCancelButton: false,
																	focusConfirm: false,
																	confirmButtonColor: "#ff7800",
																	confirmButtonText: "OK",
																});
															</script>';
				} else {
					// Procesar los IDs de los libros seleccionados
					foreach($id as $id) {
						// Consultar el título del libro asociado a la ID
						$titulo = "SELECT titulo FROM libros WHERE id_libro = $id";
						$resultado = mysqli_query($conexion, $titulo);
						if ($resultado && mysqli_num_rows($resultado) > 0) {
							$fila = mysqli_fetch_assoc($resultado);
							$titulo = $fila['titulo'];

							// Mostrar el título del libro en lugar de la ID
?>
															<div class="col-lg-3 pt-2">
																<label>
																	<i class="fa fa-qrcode fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Código del libro
																</label>
																<input
																	class="form-control"
																	type="text"
																	value="00<? echo $id; ?>"
																	autocomplete="off"
																	placeholder="Ingrese el titulo del libro"
																	title=""
																	minlength="1"
																	pattern="<?php echo base_input_codigo; ?>"
																	onkeypress="<?php echo base_input_numeros; ?>"
																	required
																	readonly
																/>
															</div>
															<div class="col-lg-9 pt-2">
																<label>
																	<i class="fa fa-text-width fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Titulo del libro
																</label>
																<input class="input-checkbox" type="checkbox" name="id_libro_<? echo $id; ?>" value="<? echo $id; ?>" onchange="updateSelectedCount()" checked hidden />
																<input
																	class="form-control"
																	type="text"
																	value="<?php echo $titulo; ?>"
																	autocomplete="off"
																	placeholder="Ingrese el titulo del libro"
																	title=""
																	minlength="10"
																	maxlength="100"
																	pattern="<?php echo base_input_titulo; ?>"
																	onkeypress="<?php echo base_input_letras_numeros_espacios_caracteres; ?>"
																	data-tippy="<?php echo $titulo; ?>"
																	data-tippy-inertia="true"
																	data-tippy-animation="shift-away"
																	data-tippy-delay="50"
																	data-tippy-arrow="true"
																	data-tippy-theme="sharpborder"
																	required
																	readonly
																/>
															</div>
															<div><hr /></div>
<?php
							// Puedes almacenarlos en una base de datos, realizar otras operaciones, etc.
						}
					}
				}
			} else {
				// Manejar el caso de que no se hayan seleccionado libros
echo '
															<script>
																Swal.fire({
																	title: "ERROR AL SELECCIONAR LIBROS!",
																	icon: "warning",
																	html: "La cantidad de libros seleccionados, fue inferior a 1 libro. Debes seleccionar mínimo 1 libro y hasta un máximo de 3 libros.",
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
?>
															
															<h2 class="login-title-1">
																<center>
																	Fecha de inicio y finalización del préstamo.
																</center>
															</h2>
															<div class="col-lg-12 pt-2">
																<label>
																	<i class="fa fa-calendar-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Inicio del préstamo
																</label>
																<input
																	class="form-control"
																	type="date"
																	name="fecha_prestamo"
																	id="fecha_prestamo"
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
																	name="fecha_devolucion"
																	id="fecha_devolucion"
																	title=""
																	minlength="8"
																	maxlength="10"
																	pattern="<?php echo base_input_fecha; ?>"
																	readonly
																/>
															</div>
															<div><hr /></div>
															<center>
																<div class="row row-cols pt-3">
																	<div class="col mb-3">
																		<button class="btn btn-custom-size lg-size btn-primary" type="submit" name="agregar" style="color: white; text-shadow: 1px 1px 2px #060606;">
																			Continuar
																		</button>
																	</div>
																	<div class="col">
																		<a class="btn btn-custom-size lg-size btn-primary" href="confirmar_solicitar_libros.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
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
							</div>
						</div>
					</div>
				</div>
			</main>
			<!-- Main Content Area End Here -->
		</div>
<?php
	// Antes de comprobar si el formulario se ha enviado y procesar los datos, verificamos la conexión con la base de datos.
	require_once('../includes/conexion.php');
	// Comprobamos si el formulario se ha enviado.
	if (isset($_POST['agregar'])) {
		// Recibimos y obtenemos los datos del formulario.
		$id_usuario = $_POST["id_usuario"];
		$fecha_prestamo = $_POST["fecha_prestamo"];
		$fecha_devolucion = $_POST["fecha_devolucion"];
		
		// Crear un arreglo para almacenar los IDs de los libros seleccionados
		$libros_ids = array();
		
		foreach ($_POST as $campo => $valor) {
			if (strpos($campo, "id_libro_") === 0) {
				// Verificar si el valor es un entero positivo (evita inyección SQL)
				if (ctype_digit($valor) && $valor > 0) {
					$libros_ids[] = $valor;
				}
			}
		}
		
		// Verificar si se seleccionaron más de 3 libros
		if (count($libros_ids) > 3) {
	echo '
		<script>
			Swal.fire({
				title: "ERROR AL REGISTRAR EL PRÉSTAMO!",
				icon: "warning",
				html: "La cantidad de libros seleccionada, fue superior a 3 libros. Seleccione un máximo de 3 libros e inténtelo de nuevo.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#ff7800",
				confirmButtonText: "OK",
			});
		</script>';
	echo '
		<!-- .Final-->';
		include("final.php");
		
	echo '
		<!-- .Script -->';
		include("../script.php");
		
	echo '
		<!-- .Control de libros -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/bloquear_checkbox_libros.js'.$codificacion.'"></script>
		<script language="JavaScript" type="text/javascript" src="../recursos/js/libros_no_seleccionados.js'.$codificacion.'"></script>
		<script language="JavaScript" type="text/javascript" src="../recursos/js/libros_no_seleccionados_2.js'.$codificacion.'"></script>
		
		<!-- .Control de la fecha de préstamo -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/fecha_prestamo_automatica.js'.$codificacion.'"></script>';
		
	echo '
	</body>
</html>';
			ob_end_flush();
			exit;
		} else if (count($libros_ids) > 0) {
			// Insertar los datos en la tabla 'prestamos'
			// Aquí asumimos que se insertarán hasta 3 libros (id_libro_1, id_libro_2, id_libro_3)
			$query = "INSERT INTO prestamos (id_usuario, id_libro_1, id_libro_2, id_libro_3, fecha_prestamo, fecha_devolucion, estado, permiso) VALUES ('$id_usuario', NULL, NULL, NULL, '$fecha_prestamo', '$fecha_devolucion', '2', '2')";
			
			if ($conexion->query($query) === TRUE) {
				// Obtener el ID del préstamo recién insertado
				$id_prestamo = $conexion->insert_id;
				
				// Actualizar los campos de libros seleccionados en el préstamo
				for ($i = 0; $i < count($libros_ids); $i++) {
					$indice_columna = $i + 1; // Para determinar si es id_libro_1, id_libro_2, id_libro_3
					$id_libro_actual = $libros_ids[$i];
					$query = "UPDATE prestamos SET id_libro_$indice_columna = '$id_libro_actual' WHERE id_prestamo = '$id_prestamo'";
					$conexion->query($query);
				}
				header('Location:confirmar_solicitar_prestamos.php');
				ob_end_flush();
				exit;
			} else {
    echo '
		<script>
			Swal.fire({
				title: "ERROR AL REGISTRAR EL PRÉSTAMO!",
				icon: "warning",
				html: "Parece haber un error con los libros seleccionados, verifique los libros seleccionados e inténtelo de nuevo.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#dd7c29",
				confirmButtonText: "OK",
			});
		</script>';
	echo '
		<!-- .Final-->';
		include("final.php");
		
	echo '
		<!-- .Script -->';
		include("../script.php");
		
	echo '
		<!-- .Control de libros -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/bloquear_checkbox_libros.js'.$codificacion.'"></script>
		<script language="JavaScript" type="text/javascript" src="../recursos/js/libros_no_seleccionados.js'.$codificacion.'"></script>
		<script language="JavaScript" type="text/javascript" src="../recursos/js/libros_no_seleccionados_2.js'.$codificacion.'"></script>
		
		<!-- .Control de la fecha de préstamo -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/fecha_prestamo_automatica.js'.$codificacion.'"></script>';
		
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
                title: "ERROR AL SELECCIONAR LIBROS!",
                icon: "warning",
                html: "La cantidad de libros seleccionados, fue inferior a 1 libro. Debes seleccionar mínimo 1 libro y hasta un máximo de 3 libros.",
                allowOutsideClick: false,
                showCloseButton: false,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonColor: "#ff7800",
                confirmButtonText: "OK",
            });
        </script>';
	echo '
		<!-- .Final-->';
		include("final.php");
		
	echo '
		<!-- .Script -->';
		include("../script.php");
	echo '
		<!-- .Control de libros -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/bloquear_checkbox_libros.js'.$codificacion.'"></script>
		<script language="JavaScript" type="text/javascript" src="../recursos/js/libros_no_seleccionados.js'.$codificacion.'"></script>
		<script language="JavaScript" type="text/javascript" src="../recursos/js/libros_no_seleccionados_2.js'.$codificacion.'"></script>
		
		<!-- .Control de la fecha de préstamo -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/fecha_prestamo_automatica.js'.$codificacion.'"></script>';
	echo '
	</body>
</html>';
			ob_end_flush();
			exit;
		}
	}
	
	// Cerramos la conexión con la base de datos
	mysqli_close($conexion);
?>
		
		<!-- .Final -->
		<?php include('final.php'); ?>

		<!-- .Script -->
		<?php include('../script.php'); ?>
		
		<!-- .Control de libros -->
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/bloquear_checkbox_libros.js<?php include('../includes/codificacion.php'); ?>"></script>
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/libros_no_seleccionados.js<?php include('../includes/codificacion.php'); ?>"></script>
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/libros_no_seleccionados_2.js<?php include('../includes/codificacion.php'); ?>"></script>
		
		<!-- .Control de la fecha de préstamo -->
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/fecha_prestamo_automatica.js<?php include('../includes/codificacion.php'); ?>"></script>
	
	</body>
</html>
<?php
	ob_end_flush();
	exit;
?>