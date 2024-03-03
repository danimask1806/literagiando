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
		<title>Agregar usuario - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Agregar usuario'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-11 pt-5" style="margin: 0 auto;">
												<form method="post" action="agregar_usuarios.php" enctype="multipart/form-data">
													<input type="hidden" name="fecha_registro" value="<?php echo date('Y-m-d'); ?>" />
													<div class="login-form mb-10">
														<h2 class="login-title-1 mb-2">
															<center>
																Formulario para agregar nuevos usuario.
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
																	name="identificacion"
																	value="<?php if (isset($_POST['identificacion'])) echo $_POST['identificacion']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese una identificación"
																	title=""
																	minlength="8"
																	maxlength="11"
																	pattern="<?php echo base_input_identificacion; ?>"
																	onkeypress="<?php echo base_input_numeros; ?>"
																	required
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
																	name="nombre_completo"
																	value="<?php if (isset($_POST['nombre_completo'])) echo $_POST['nombre_completo']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese su nombre completo"
																	title=""
																	minlength="4"
																	maxlength="50"
																	pattern="<?php echo base_input_nombre_completo; ?>"
																	onkeypress="<?php echo base_input_letras_espacios; ?>"
																	required
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-venus-mars fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Genero de usuario
																</label>
																<select
																	class="nice-select form-control myniceselect wide"
																	name="sexo"
																	title=""
																	tabindex="-1"
																	required
																>
																	<option data-display="<?php if (isset($_POST['sexo'])) echo $_POST['sexo']; ?>" value="<?php if (isset($_POST['sexo'])) echo $_POST['sexo']; ?>" selected>Seleccione su genero</option>
																	<option value="Masculino">Masculino</option>
																	<option value="Femenino">Femenino</option>
																</select>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Numero de teléfono
																</label>
																<input
																	class="form-control"
																	type="tel"
																	name="telefono"
																	value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese su numero telefónico"
																	title=""
																	minlength="7"
																	maxlength="14"
																	pattern="<?php echo base_input_telefono; ?>"
																	onkeypress="<?php echo base_input_numeros; ?>"
																	required
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
																	name="correo"
																	value="<?php if (isset($_POST['correo'])) echo $_POST['correo']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese su correo electrónico"
																	title=""
																	minlength="5"
																	maxlength="65"
																	pattern="<?php echo base_input_email; ?>"
																	required
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Nombre de usuario
																</label>
																<input
																	class="form-control"
																	type="text"
																	name="usuario"
																	value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese un usuario"
																	title=""
																	minlength="4"
																	maxlength="50"
																	pattern="<?php echo base_input_usuario; ?>"
																	onkeypress="<?php echo base_input_letras_numeros; ?>"
																	required
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-key fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Contraseña de usuario
																</label>
																<input
																	class="form-control"
																	type="password"
																	name="password"
																	autocomplete="off"
																	placeholder="Ingrese una contraseña"
																	title=""
																	minlength="4"
																	maxlength="100"
																	pattern="<?php echo base_input_password; ?>"
																	required
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-toggle-on fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Disponibilidad de usuario
																</label>
																<select
																	class="nice-select form-control myniceselect wide"
																	name="acceso"
																	title=""
																	tabindex="-1"
																	required
																>
																	<option value="">Seleccione una disponibilidad</option>
																	<option value="1" <?php if (isset($_POST['acceso']) && $_POST['acceso'] == 1) echo 'selected'; ?>>Activo</option>
																	<option value="2" <?php if (isset($_POST['acceso']) && $_POST['acceso'] == 2) echo 'selected'; ?>>Inactivo</option>
																</select>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-star-half-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Rango de usuario
																</label>
																<select
																	class="nice-select form-control myniceselect wide"
																	name="rol"
																	title=""
																	tabindex="-1"
																	required
																>
																	<option value="">Seleccione un rango</option>
																	<option value="1" <?php if (isset($_POST['rol']) && $_POST['rol'] == 1) echo 'selected'; ?>>Staff</option>
																	<option value="2" <?php if (isset($_POST['rol']) && $_POST['rol'] == 2) echo 'selected'; ?>>Usuario</option>
																</select>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Foto de perfil de usuario
																</label>
																<input
																	class="form-control form-control-lg"
																	type="file"
																	name="foto_perfil"
																	title=""
																	accept=".png, .jpg"
																	required
																/>
															</div>
															<div><hr /></div>
															<center>
																<div class="row row-cols pt-3">
																	<div class="col mb-3">
																		<button class="btn btn-custom-size lg-size btn-primary" type="submit" name="agregar" style="color: white; text-shadow: 1px 1px 2px #060606;">
																			Agregar
																		</button>
																	</div>
																	<div class="col">
																		<a class="btn btn-custom-size lg-size btn-primary" href="administrar_usuarios.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
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
		$rol = $_POST['rol'];
		$identificacion = $_POST["identificacion"]; // Suponiendo que recibes esto desde un formulario
		$nombre_completo = $_POST["nombre_completo"];
		$sexo = $_POST["sexo"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];
		$usuario = $_POST["usuario"];
		$password = $_POST["password"]; // Contraseña sin encriptar
		$fecha_registro = $_POST["fecha_registro"];
		$acceso = $_POST['acceso'];
		
		// Encriptar la contraseña con bcrypt
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$foto_perfil = $_FILES["foto_perfil"]["name"];
		$foto_perfiltemp = $_FILES["foto_perfil"]["tmp_name"];
		
		// Generar un nombre único para la imagen
		$extension = pathinfo($foto_perfil, PATHINFO_EXTENSION);
		$nombreImagen = uniqid() . "." . $extension;
		
		// Verificar que el archivo es una imagen válida
		$formatosPermitidos = ["png", "jpg"];
		if (!in_array($extension, $formatosPermitidos)) {
	echo '
		<script>
			swal.fire({
				title: "ERROR AL CREAR LA CUENTA!",
				icon: "warning",
				html: "La imagen que intenta usar como foto de perfil, no es una imagen valida. Seleccione una imagen diferente para usar como foto de perfil e inténtelo de nuevo.",
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
	</body>
</html>';
			ob_end_flush();
			exit;
		}
		
		// Verificar duplicados en identificación
		$query_identificacion = "SELECT id_usuario FROM usuario WHERE identificacion = '$identificacion'";
		$resultado_identificacion = mysqli_query($conexion, $query_identificacion);
		if (mysqli_num_rows($resultado_identificacion) > 0) {
	echo '
		<script>
			Swal.fire({
				title: "ERROR AL CREAR LA CUENTA!",
				icon: "warning",
				html: "El número de identificación que intenta usar, parece estar en uso, verifique este campo e inténtelo de nuevo.",
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
	</body>
</html>';
			ob_end_flush();
			exit;
		}
		
		// Verificar duplicados en correo
		$query_correo = "SELECT id_usuario FROM usuario WHERE correo = '$correo'";
		$resultado_correo = mysqli_query($conexion, $query_correo);
		if (mysqli_num_rows($resultado_correo) > 0) {
	echo '
		<script>
			Swal.fire({
				title: "ERROR AL CREAR LA CUENTA!",
				icon: "warning",
				html: "El correo electrónico que intenta usar, parece estar en uso, verifique este campo e inténtelo de nuevo.",
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
	</body>
</html>';
			ob_end_flush();
			exit;
		}
		
		// Verificar duplicados en usuario
		$query_usuario = "SELECT id_usuario FROM usuario WHERE usuario = '$usuario'";
		$resultado_usuario = mysqli_query($conexion, $query_usuario);
		if (mysqli_num_rows($resultado_usuario) > 0) {
	echo '
		<script>
			Swal.fire({
				title: "ERROR AL CREAR LA CUENTA!",
				icon: "warning",
				html: "El nombre de usuario que intenta usar, parece estar en uso, verifique este campo e inténtelo de nuevo.",
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
	</body>
</html>';
			ob_end_flush();
			exit;
		} else {
			// Mover la imagen al directorio
			$rutaGuardada = "../recursos/img/perfiles/" . $nombreImagen;
			move_uploaded_file($foto_perfiltemp, $rutaGuardada);
		
			// Insertar los datos en la tablausuario con el nombre único de la imagen
			$query_insert = "INSERT INTOusuario (rol, identificacion, nombre_completo, sexo, telefono, correo, usuario, password, foto_perfil, fecha_registro, acceso) VALUES ('$rol', '$identificacion', '$nombre_completo', '$sexo', '$telefono', '$correo', '$usuario', '$hashed_password', '$nombreImagen', '$fecha_registro', '$acceso')";
			if (mysqli_query($conexion, $query_insert)) {
	echo '
		<script>
			Swal.fire({
				title: "CUENTA CREADA EXITOSAMENTE!",
				icon: "success",
				html: "Use el botón a continuación para volver al listado de usuario registrados.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#219f16",
				confirmButtonText: "Administrar usuario",
			}).then(function(){
				window.location="administrar_usuarios.php";
			});
		</script>';
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
				title: "ERROR AL CREAR LA CUENTA!",
				icon: "error",
				html: "Parece haber un error con los datos ingresados, verifique los datos de registro e inténtelo de nuevo.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#d51a1a",
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
	</body>
</html>';
				ob_end_flush();
				exit;
			}
		}
	}
	
	// Cerramos la conexión con la base de datos
	mysqli_close($conexion);
?>
		
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