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
		<title>Editar usuario - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Editar usuario'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>

<?php
	// Verificar si se proporciona la ID de usuario en la URL
	if (isset($_GET['id'])) {
		$id_usuario = $_GET['id'];
		
		// Verificar si el ID de usuario no es igual a 1
		if ($id_usuario == 1) {
			header("Location: administrar_usuarios.php");
			ob_end_flush();
			exit;
		}
		
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
											<div class="col-lg-11 pt-5" style="margin: 0 auto;">
												<form method="post" action="editar_usuarios.php?id=<?php echo $fila['id_usuario']; ?>" enctype="multipart/form-data">
													<div class="login-form mb-10">
														<h2 class="login-title-1 mb-2">
															<center>
																Formulario para editar usuario registrados.
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
																	value="<?php echo $fila['identificacion']; ?>"
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
																	value="<?php echo $fila['nombre_completo']; ?>"
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
																	<option data-display="<?php echo $fila['sexo'] ?>" value="<?php echo $fila['sexo'] ?>"><?php echo $fila['sexo'] ?></option>
																	<?php
																	$sexo = $fila['sexo'];
																	if ($sexo == "Masculino") {
																		echo '<option value="Femenino">Femenino</option>';
																	} elseif ($sexo == "Femenino") {
																		echo '<option value="Masculino">Masculino</option>';
																	}
																	?>
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
																	value="<?php echo $fila['telefono'] ?>"
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
																	value="<?php echo $fila['correo'] ?>"
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
																	value="<?php echo $fila['usuario'] ?>"
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
																	<?php
																	$acceso = $fila['acceso'];
																	if ($acceso == 1) {
																		$acceso = 'Activo';
																	} else {
																		$acceso = 'Inactivo';
																	}
																	?>
																	<option data-display="<?php echo $acceso; ?>" value="<?php echo $fila['acceso'] ?>"><?php echo $acceso; ?></option>
																	<?php
																	if ($acceso == 'Inactivo') {
																		echo '<option value="1">Activo</option>';
																	} elseif ($acceso == 'Activo') {
																		echo '<option value="2">Inactivo</option>';
																	}
																	?>
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
																	<?php
																	$rol = $fila['rol'];
																	if ($rol == 1) {
																		$rol = 'Staff';
																	} else {
																		$rol = 'Usuario';
																	}
																	?>
																	<option data-display="<?php echo $rol; ?>" value="<?php echo $fila['rol'] ?>"><?php echo $rol; ?></option>
																	<?php
																	if ($rol == 'Usuario') {
																		echo '<option value="1">Staff</option>';
																	} elseif ($rol == 'Staff') {
																		echo '<option value="2">Usuario</option>';
																	}
																	?>
																</select>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Foto de perfil de usuario
																</label>
																<input
																	class="form-control form-control-lg"
																	type="file"
																	name="foto_perfil"
																	title=""
																	accept=".png, .jpg"
																/>
																<input 
																	type="hidden"
																	name="imagenAnterior"
																	value="../recursos/img/perfiles/<?php echo $fila['foto_perfil']; ?>"
																/>
																<img 
																	src="../recursos/img/perfiles/<?php echo $fila['foto_perfil'].$codificacion; ?>"
																	alt="Foto de perfil actual no disponible"
																	width="200px"
																/>
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
<?php
		} else {
	echo '
								<script>
									Swal.fire({
										title: "ERROR AL EDITAR LA CUENTA!",
										icon: "error",
										html: "La cuenta de usuario que intenta editar, no existe. Use el botón a continuación para volver al listado de usuario registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "ADMINITRAR USUARIOS",
									}).then(function(){
										window.location="administrar_usuarios.php";
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
			$rol = $_POST['rol'];
			$identificacion = $_POST['identificacion'];
			$nombre_completo = $_POST['nombre_completo'];
			$sexo = $_POST['sexo'];
			$telefono = $_POST['telefono'];
			$correo = $_POST['correo'];
			$usuario = $_POST['usuario'];
			$foto_perfil = $_FILES["foto_perfil"]["name"];
			$foto_perfiltemp = $_FILES["foto_perfil"]["tmp_name"];
			$imagenAnterior = $_POST["imagenAnterior"];
			$acceso = $_POST['acceso'];
			
			// Verificar si se subió una nueva imagen de foto_perfil
			if ($_FILES["foto_perfil"]["name"]) {
				
				// Generar un nombre único para la imagen
				$extension = pathinfo($_FILES["foto_perfil"]["name"], PATHINFO_EXTENSION);
				$nombreImagen = uniqid() . "." . $extension;
				
				// Verificar que el archivo es una imagen válida
				$formatosPermitidos = ["png", "jpg"];
				if (!in_array($extension, $formatosPermitidos)) {
	echo '
								<script>
									swal.fire({
										title: "ERROR AL EDITAR LA CUENTA!",
										icon: "warning",
										html: "La imagen que intenta asignar como foto de perfil, no es una imagen valida. Seleccione una imagen diferente e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#dd7c29",
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
				
				// Ruta donde se guardará la imagen
				$rutaGuardada = "../recursos/img/perfiles/" . $nombreImagen;

				// Mover la imagen desde la ubicación temporal a la ruta final
				move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $rutaGuardada);

				// Eliminar la imagen anterior si existe
				if (file_exists($imagenAnterior)) {
					unlink($imagenAnterior);
				}         
				
				// Actualizar la columna de la base de datos con el nuevo nombre de imagen
				$query = "UPDATE usuario SET rol='$rol', identificacion='$identificacion', nombre_completo='$nombre_completo', sexo='$sexo', telefono='$telefono', correo='$correo', usuario='$usuario', foto_perfil='$nombreImagen', acceso='$acceso' WHERE id_usuario = '$id_usuario'";
			} else {
				// No se subió una nueva imagen, actualizar los datos sin cambiar la imagen
				$query = "UPDATE usuario SET rol='$rol', identificacion='$identificacion', nombre_completo='$nombre_completo', sexo='$sexo', telefono='$telefono', correo='$correo', usuario='$usuario', acceso='$acceso' WHERE id_usuario = '$id_usuario'";
			}
			
			// Ejecutar la consulta SQL
			if (mysqli_query($conexion, $query)) {
	echo '
								<script>
									Swal.fire({
										title: "CUENTA EDITADA EXITOSAMENTE!",
										icon: "success",
										html: "Use el botón a continuación para volver al listado de usuario registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#219f16",
										confirmButtonText: "ADMINISTRAR USUARIOS",
									}).then(function(){
										window.location="administrar_usuarios.php";
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
										title: "ERROR AL EDITAR LA CUENTA!",
										icon: "error",
										html: "Parece haber un error con los datos ingresados, verifique los datos ingresados e inténtelo de nuevo.",
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
										title: "ERROR AL EDITAR LA CUENTA!",
										icon: "error",
										html: "La cuenta de usuario que intenta editar, no existe. Use el botón a continuación para volver al listado de usuario registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "ADMINITRAR USUARIOS",
									}).then(function(){
										window.location="administrar_usuarios.php";
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