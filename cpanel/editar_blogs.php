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
		<title>Editar blogs - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Editar blogs'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
<?php
	// Verificar si se proporciona la ID de usuario en la URL
	if (isset($_GET['id'])) {
		$id_blog = $_GET['id'];
		
		// Obtener los datos actuales del blog
		$query = "SELECT * FROM blogs WHERE id_blog = '$id_blog'";
		$resultado = mysqli_query($conexion, $query);
		if (mysqli_num_rows($resultado) > 0) {
			$fila = mysqli_fetch_assoc($resultado);
?>								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-11 pt-5" style="margin: 0 auto;">
												<form method="post" action="editar_blogs.php?id=<?php echo $fila['id_blog']; ?>" enctype="multipart/form-data">
													<div class="login-form mb-10">
														<h2 class="login-title-1 mb-2">
															<center>
																Formulario para editar blogs registrados.
															</center>
														</h2>
														<div class="row">
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Imagen del blog<span style="color: #f48005;">(cabecera)</span>.
																</label>
																<input
																	class="form-control form-control-lg"
																	type="file"
																	name="foto_1"
																	title=""
																	accept=".png, .jpg"
																/>
																<input 
																	type="hidden"
																	name="imagenAnterior1"
																	value="../recursos/img/blog/<?php echo $fila['foto_1']; ?>"
																/>
																<img 
																	src="../recursos/img/blog/<?php echo $fila['foto_1'].$codificacion; ?>"
																	alt="Foto de blog actual no disponible"
																	height="280px"
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-text-width fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Titulo del blog
																</label>
																<input
																	id="titulo"
																	class="form-control"
																	type="text"
																	name="titulo"
																	value="<?php echo $fila['titulo']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese el titulo del blog"
																	title=""
																	minlength="10"
																	maxlength="100"
																	pattern="<?php echo base_input_titulo; ?>"
																	onkeypress="<?php echo base_input_letras_numeros_espacios_caracteres; ?>"
																	required
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Autor del blog
																</label>
																<input
																	id="autor"
																	class="form-control"
																	type="text"
																	name="autor"
																	value="<?php echo $fila['autor']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese el autor del blog"
																	title=""
																	minlength="6"
																	maxlength="50"
																	pattern="<?php echo base_input_autor; ?>"
																	onkeypress="<?php echo base_input_letras_espacios_caracteres; ?>"
																	required
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-calendar-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Fecha de publicación
																</label>
																<input
																	class="form-control"
																	type="date"
																	name="fecha_publicacion"
																	value="<?php echo $fila['fecha_publicacion']; ?>"
																	title=""
																	minlength="8"
																	maxlength="10"
																	pattern="<?php echo base_input_fecha; ?>"
																	required
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label style="margin-bottom: 4px;">
																	<i class="fa fa-text-width fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Primer subtitulo del blog
																	<br />
																	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<span style="font-size: 18px; color: #f48005;">Campo opcional</span>.
																</label>
																<input
																	id="sub_titulo_1"
																	class="form-control"
																	type="text"
																	name="sub_titulo_1"
																	value="<?php echo $fila['sub_titulo_1']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese el subtitulo del blog"
																	title=""
																	minlength="0"
																	maxlength="100"
																	pattern="<?php echo base_input_titulo_2; ?>"
																	onkeypress="<?php echo base_input_letras_numeros_espacios_caracteres; ?>"
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Descripción del blog
																</label>
																<textarea 
																	class="form-control"
																	name="descripcion"
																	placeholder="Ingrese una descripción"
																	aria-label="With textarea"
																	id="textarea_blog"
																	required
																><?php echo $fila['descripcion']; ?></textarea>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Imagen del blog<span style="color: #f48005;">(cuerpo)</span>.
																</label>
																<input
																	class="form-control form-control-lg"
																	type="file"
																	name="foto_2"
																	title=""
																	accept=".png, .jpg"
																/>
																<input 
																	type="hidden"
																	name="imagenAnterior2"
																	value="../recursos/img/blog/<?php echo $fila['foto_2']; ?>"
																/>
																<img 
																	src="../recursos/img/blog/<?php echo $fila['foto_2'].$codificacion; ?>"
																	alt="Foto de blog actual no disponible"
																	height="280px"
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12">
																<label>
																	<i class="fa fa-text-width fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Segundo subtitulo del blog
																</label>
																<input
																	id="sub_titulo_2"
																	class="form-control"
																	type="text"
																	name="sub_titulo_2"
																	value="<?php echo $fila['sub_titulo_2']; ?>"
																	autocomplete="off"
																	placeholder="Ingrese el subtitulo del blog"
																	title=""
																	minlength="10"
																	maxlength="100"
																	pattern="<?php echo base_input_titulo; ?>"
																	onkeypress="<?php echo base_input_letras_numeros_espacios_caracteres; ?>"
																	required
																/>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-font fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Primer párrafo del blog
																</label>
																<textarea 
																	class="form-control"
																	name="parrafo_1"
																	placeholder="Ingrese un parrafo para el blog"
																	aria-label="With textarea"
																	id="textarea_parrafo_1"
																	required
																><?php echo $fila['parrafo_1']; ?></textarea>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-font fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Segundo párrafo del blog
																</label>
																<textarea 
																	class="form-control"
																	name="parrafo_2"
																	placeholder="Ingrese un parrafo para el blog"
																	aria-label="With textarea"
																	id="textarea_parrafo_2"
																	required
																><?php echo $fila['parrafo_2']; ?></textarea>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-font fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Tercer párrafo del blog
																</label>
																<textarea 
																	class="form-control"
																	name="parrafo_3"
																	placeholder="Ingrese un parrafo para el blog"
																	aria-label="With textarea"
																	id="textarea_parrafo_3"
																	required
																><?php echo $fila['parrafo_3']; ?></textarea>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-font fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Cuarto párrafo del blog
																</label>
																<textarea 
																	class="form-control"
																	name="parrafo_4"
																	placeholder="Ingrese un parrafo para el blog"
																	aria-label="With textarea"
																	id="textarea_parrafo_4"
																	required
																><?php echo $fila['parrafo_4']; ?></textarea>
															</div>
															<div><hr /></div>
															<div class="col-lg-12 mb-3">
																<label>
																	<i class="fa fa-toggle-on fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Disponibilidad del blog
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
																		<option data-display="<?php echo $acceso; ?>" value="<?php echo $fila['acceso'] ?>">
																			<?php echo $acceso; ?>
																		</option>
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
															<center>
																<div class="row row-cols pt-3">
																	<div class="col mb-3">
																		<button class="btn btn-custom-size lg-size btn-primary" type="submit" name="actualizar" style="color: white; text-shadow: 1px 1px 2px #060606;">
																			Actualizar
																		</button>
																	</div>
																	<div class="col">
																		<a class="btn btn-custom-size lg-size btn-primary" href="administrar_blogs.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
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
										title: "ERROR AL EDITAR EL BLOG!",
										icon: "error",
										html: "El blog que intenta editar, no existe. Use el botón a continuación para volver al listado de blogs registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "ADMINITRAR BLOGS",
									}).then(function(){
										window.location="administrar_blogs.php";
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
		<!-- .Control de los textarea -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/textarea_blogs.js'.$codificacion.'"></script>';
		
	echo '
		<!-- .Control de los inputs -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/obligatorio_blogs.js'.$codificacion.'"></script>';
		
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
			// Recibir los datos del formulario
			$imagenAnterior1 = $_POST["imagenAnterior1"];
			$nombreImagen1 = "";
			$titulo = $_POST['titulo'];
			$autor = $_POST['autor'];
			$fecha_publicacion = $_POST["fecha_publicacion"];
			$sub_titulo_1 = $_POST['sub_titulo_1'];
			$descripcion = $_POST['descripcion'];
			$sub_titulo_2 = $_POST['sub_titulo_2'];
			$imagenAnterior2 = $_POST["imagenAnterior2"];
			$nombreImagen2 = "";
			$parrafo_1 = $_POST['parrafo_1'];
			$parrafo_2 = $_POST['parrafo_2'];
			$parrafo_3 = $_POST['parrafo_3'];
			$parrafo_4 = $_POST['parrafo_4'];
			$acceso = $_POST['acceso'];
			
			// Verificar si se subió una nueva imagen de foto_1
			if ($_FILES["foto_1"]["name"]) {
				$foto_1 = $_FILES["foto_1"]["name"];
				$foto_1temp = $_FILES["foto_1"]["tmp_name"];

				// Generar un nombre único para la imagen de foto_1
				$extension1 = pathinfo($foto_1, PATHINFO_EXTENSION);
				$nombreImagen1 = uniqid() . "_1." . $extension1;

				// Verificar que el archivo es una imagen válida
				$formatosPermitidos = ["png", "jpg"];
				if (!in_array($extension1, $formatosPermitidos)) {
echo '
								<script>
									swal.fire({
										title: "ERROR AL EDITAR EL BLOG!",
										icon: "warning",
										html: "La imagen que intenta asignar como foto de cabecera, no es una imagen valida. Seleccione una imagen diferente e inténtelo de nuevo.",
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
		<!-- .Control de los textarea -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/textarea_blogs.js'.$codificacion.'"></script>';
		
	echo '
		<!-- .Control de los inputs -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/obligatorio_blogs.js'.$codificacion.'"></script>';
		
	echo '
	</body>
</html>';
					ob_end_flush();
					exit;
				} else {
					// Mover la imagen de foto_1 al directorio final
					$rutaGuardada1 = "../recursos/img/blog/" . $nombreImagen1;
					move_uploaded_file($foto_1temp, $rutaGuardada1);

					// Eliminar la imagen anterior de foto_1 si existe
					if (file_exists($imagenAnterior1)) {
						unlink($imagenAnterior1);
					}
				}
			}
			
			// Verificar si se subió una nueva imagen de foto_2
			if ($_FILES["foto_2"]["name"]) {
				$foto_2 = $_FILES["foto_2"]["name"];
				$foto_2temp = $_FILES["foto_2"]["tmp_name"];
				
				// Generar un nombre único para la imagen de foto_2
				$extension2 = pathinfo($foto_2, PATHINFO_EXTENSION);
				$nombreImagen2 = uniqid() . "_2." . $extension2;
				
				// Verificar que el archivo es una imagen válida
				$formatosPermitidos = ["png", "jpg"];
				if (!in_array($extension2, $formatosPermitidos)) {
	echo '
								<script>
									swal.fire({
										title: "ERROR AL EDITAR EL BLOG!",
										icon: "warning",
										html: "La imagen que intenta asignar como foto de cuerpo, no es una imagen valida. Seleccione una imagen diferente e inténtelo de nuevo.",
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
		<!-- .Control de los textarea -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/textarea_blogs.js'.$codificacion.'"></script>';
		
	echo '
		<!-- .Control de los inputs -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/obligatorio_blogs.js'.$codificacion.'"></script>';
		
	echo '
	</body>
</html>';
					ob_end_flush();
					exit;
				} else {
					// Mover la imagen de foto_2 al directorio final
					$rutaGuardada2 = "../recursos/img/blog/" . $nombreImagen2;
					move_uploaded_file($foto_2temp, $rutaGuardada2);
					
					// Eliminar la imagen anterior de foto_2 si existe
					if (file_exists($imagenAnterior2)) {
						unlink($imagenAnterior2);
					}
				}
			}
			
			// Actualizar los datos en la base de datos
			if (!empty($nombreImagen1) && !empty($nombreImagen2)) {
				$query = "UPDATE blogs SET foto_1='$nombreImagen1', titulo='$titulo', autor='$autor', fecha_publicacion='$fecha_publicacion', sub_titulo_1='$sub_titulo_1', descripcion='$descripcion', sub_titulo_2='$sub_titulo_2', foto_2='$nombreImagen2', parrafo_1='$parrafo_1', parrafo_2='$parrafo_2', parrafo_3='$parrafo_3', parrafo_4='$parrafo_4', acceso='$acceso' WHERE id_blog = '$id_blog'";
			} elseif (!empty($nombreImagen1)) {
				$query = "UPDATE blogs SET foto_1='$nombreImagen1', titulo='$titulo', autor='$autor', fecha_publicacion='$fecha_publicacion', sub_titulo_1='$sub_titulo_1', descripcion='$descripcion', sub_titulo_2='$sub_titulo_2', parrafo_1='$parrafo_1', parrafo_2='$parrafo_2', parrafo_3='$parrafo_3', parrafo_4='$parrafo_4', acceso='$acceso' WHERE id_blog = '$id_blog'";
			} elseif (!empty($nombreImagen2)) {
				$query = "UPDATE blogs SET titulo='$titulo', autor='$autor', fecha_publicacion='$fecha_publicacion', sub_titulo_1='$sub_titulo_1', descripcion='$descripcion', sub_titulo_2='$sub_titulo_2', foto_2='$nombreImagen2', parrafo_1='$parrafo_1', parrafo_2='$parrafo_2', parrafo_3='$parrafo_3', parrafo_4='$parrafo_4', acceso='$acceso' WHERE id_blog = '$id_blog'";
			} else {
				$query = "UPDATE blogs SET titulo='$titulo', autor='$autor', fecha_publicacion='$fecha_publicacion', sub_titulo_1='$sub_titulo_1', descripcion='$descripcion', sub_titulo_2='$sub_titulo_2', parrafo_1='$parrafo_1', parrafo_2='$parrafo_2', parrafo_3='$parrafo_3', parrafo_4='$parrafo_4', acceso='$acceso' WHERE id_blog = '$id_blog'";
			}
			
			// Ejecutar la consulta SQL
			if (mysqli_query($conexion, $query)) {
	echo '
								<script>
									Swal.fire({
										title: "BLOG EDITADO EXITOSAMENTE!",
										icon: "success",
										html: "Use el botón a continuación para volver al listado de blogs registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#219f16",
										confirmButtonText: "ADMINISTRAR BLOGS",
									}).then(function(){
										window.location="administrar_blogs.php";
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
		<!-- .Control de los textarea -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/textarea_blogs.js'.$codificacion.'"></script>';
		
	echo '
		<!-- .Control de los inputs -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/obligatorio_blogs.js'.$codificacion.'"></script>';
		
	echo '
	</body>
</html>';
				ob_end_flush();
				exit;
			} else {
	echo '
								<script>
									Swal.fire({
										title: "ERROR AL EDITAR EL BLOG!",
										icon: "error",
										html: "Parece haber un error con en los datos ingresados, verifique los datos ingresados e inténtelo de nuevo.",
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
		<!-- .Control de los textarea -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/textarea_blogs.js'.$codificacion.'"></script>';
		
	echo '
		<!-- .Control de los inputs -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/obligatorio_blogs.js'.$codificacion.'"></script>';
		
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
										title: "ERROR AL EDITAR EL BLOG!",
										icon: "error",
										html: "El blog que intenta editar, no existe. Use el botón a continuación para volver al listado de blogs registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "ADMINITRAR BLOGS",
									}).then(function(){
										window.location="administrar_blogs.php";
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
		<!-- .Control de los textarea -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/textarea_blogs.js'.$codificacion.'"></script>';
		
	echo '
		<!-- .Control de los inputs -->
		<script language="JavaScript" type="text/javascript" src="../recursos/js/obligatorio_blogs.js'.$codificacion.'"></script>';
		
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
		
		<!-- .Control de los textarea -->
		<script language="JavaScript" src="<?php echo base_urls; ?>recursos/js/textarea_blogs.js<?php include('../includes/codificacion.php'); ?>"></script>
		
		<!-- .Control de los inputs -->
		<script language="JavaScript" src="<?php echo base_urls; ?>recursos/js/obligatorio_blogs.js<?php include('../includes/codificacion.php'); ?>"></script>
	
	</body>
</html>
<?php
	ob_end_flush();
	exit;
?>