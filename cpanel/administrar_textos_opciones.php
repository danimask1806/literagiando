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
		<title>Textos y opciones - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Textos y opciones'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>

<?php
	// Obtener los datos actuales del usuario
	$query = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
	$resultado = mysqli_query($conexion, $query);
	
	// Verificar si el usuario tiene el privilegio adecuado (id=1)
	if (mysqli_num_rows($resultado) > 0) {
		$fila = mysqli_fetch_assoc($resultado);
		if ($fila['id_usuario'] != 1) {
			
			// Si el usuario no tiene id=1, redireccionar a home.php
			header('Location: home.php');
			ob_end_flush();
			exit;
		}
	} else {
		
		// Si no se encuentra el usuario, también redireccionar a home.php
		header('Location: home.php');
		ob_end_flush();
		exit;
	}
?>
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-11 pt-5" style="margin: 0 auto;">
												<form method="post" action="administrar_textos_opciones.php">
													<div class="login-form mb-10">
														<h2 class="login-title-1 mb-2">
															<center>
																Caja de texto para editar textos y opciones.
															</center>
														</h2>
														<div class="row">
															<div><hr /></div>
															<div class="scrollspy-examplee position-relative mt-0 overflow-auto">
																<textarea
																	class="form-control mb-2"
																	name="contenido_php"
																	rows="15"
																	style="width: 2000px;"
																><?php $contenidoActual = file_get_contents('../includes/includes.php'); echo htmlspecialchars($contenidoActual); ?></textarea>
															</div>
															<div><hr /></div>
														</div>
														<center>
															<div class="row row-cols">
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
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
<?php
	// Antes de comprobar si el formulario se ha enviado y procesar los datos, verificamos la conexión con la base de datos.
	require_once('../includes/conexion.php');
	// Comprobamos si el formulario se ha enviado.
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
		
		// Recibimos y obtenemos los datos del formulario.
		$nuevoContenido = $_POST['contenido_php'];
		
		// Ruta del archivo a modificar
		$archivo = '../includes/includes.php';
		
		// Guardar el nuevo contenido en el archivo
		file_put_contents($archivo, $nuevoContenido);
		
	echo '
								<script>
									Swal.fire({
										title: "SITIO EDITADO EXITOSAMENTE!",
										icon: "success",
										html: "La configuración ha sido aplicada exitosamente.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#219f16",
										confirmButtonText: "OK",
									}).then(function(){
										window.location="administrar_textos_opciones.php";
									});
								</script>';
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