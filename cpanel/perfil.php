<?php
	ob_start();
	
	// Sesión
	require_once('../includes/session_usuarios.php');
	
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
		<title>Editar perfil - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Editar perfil'; ?>
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
											<div class="col-lg-11 pt-5" style="margin: 0 auto;">
												<form method="post" action="perfil.php" enctype="multipart/form-data">
													<input type="hidden" name="id_usuario" value="<?php echo $fila['id_usuario']; ?>" />
													<div class="login-form mb-10">
														<h2 class="login-title-1 mb-2">
															<center>
																Formulario para editar perfil de usuario.
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
																	autocomplete="off"
																	placeholder="Ingrese una identificación"
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
																	name="nombre_completo"
																	value="<?php echo $fila['nombre_completo']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese un nombre"
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
																	placeholder="Seleccione un genero"
																	title=""
																	required
																	tabindex="-1"
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
																	placeholder="Ingrese un telefono"
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
																	placeholder="Ingrese un correo"
																	title=""
																	minlength="5"
																	maxlength="65"
																	pattern="<?php echo base_input_email; ?>"
																	readonly
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
																	value="<?php echo $fila['usuario'] ?>"
																	autocomplete="off"
																	placeholder="Ingrese un usuario"
																	title=""
																	minlength="4"
																	maxlength="50"
																	pattern="<?php echo base_input_usuario; ?>"
																	onkeypress="<?php echo base_input_letras_numeros; ?>"
																	readonly
																/>
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
																	alt="Foto de perfil actual, no disponible"
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
																		<a class="btn btn-custom-size lg-size btn-primary" href="home.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
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
    }
	require_once('../includes/conexion.php');
	// Comprobar si el formulario se ha enviado
	if (isset($_POST['actualizar'])) {
		
		// Recibir los datos del formulario
		$id_usuario = $_POST['id_usuario'];
		$nombre_completo = $_POST['nombre_completo'];
		$sexo = $_POST['sexo'];
		$telefono = $_POST['telefono'];
		$foto_perfil = $_FILES["foto_perfil"]["name"];
		$foto_perfiltemp = $_FILES["foto_perfil"]["tmp_name"];
		$imagenAnterior = $_POST["imagenAnterior"];
		
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
										html: "La imagen que intenta usar como foto de perfil, no es una imagen valida. Seleccione una imagen diferente para usar como foto de perfil e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#dd7c29",
										confirmButtonText: "OK",
									}).then(function(){
										window.location="perfil.php";
									});
								</script>';
	echo '
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
            $query = "UPDATE usuario SET nombre_completo='$nombre_completo', sexo='$sexo', telefono='$telefono', foto_perfil='$nombreImagen' WHERE id_usuario = '$id_usuario'";
        } else {
            // No se subió una nueva imagen, actualizar los datos sin cambiar la imagen
            $query = "UPDATE usuario SET nombre_completo='$nombre_completo', sexo='$sexo', telefono='$telefono', WHERE id_usuario = '$id_usuario'";
        }
		
		if (mysqli_query($conexion, $query)) {
    echo '
								<script>
									Swal.fire({
										title: "CUENTA EDITADA EXITOSAMENTE!",
										icon: "success",
										html: "Sus datos de usuario han sido actualizados exitosamente.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#219f16",
										confirmButtonText: "OK",
									}).then(function(){
										window.location="perfil.php";
									});
								</script>';
	echo '
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
										html: "Parece haber un error con los datos ingresados, verifique sus datos de usuario e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "OK",
									}).then(function(){
										window.location="perfil.php";
									});
								</script>';
	echo '
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