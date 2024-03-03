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
		<title>Eliminar blog - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Eliminar blog'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
	
 <?php
	// Verificamos si se proporciono la ID del blog en la URL
	if (isset($_GET['id'])) {
		$id_blog = $_GET['id'];
		
		// Comprobar si el formulario se ha enviado
		if (isset($_POST['eliminar'])) {
			$imagenAnterior1 = $_POST["imagenAnterior1"];
			$imagenAnterior2 = $_POST["imagenAnterior2"];
			
			// Eliminar la imagen anterior si existe
			if (file_exists($imagenAnterior1)) {
				unlink($imagenAnterior1);
			}
			if (file_exists($imagenAnterior2)) {
				unlink($imagenAnterior2);
			}
			
			// Eliminar el blog
			$query = "DELETE FROM blogs WHERE id_blog='$id_blog'";
			if (mysqli_query($conexion, $query)) {
	echo '';
			} else {
	echo '
								<script>
									Swal.fire({
										title: "ELIMINACIÓN ERRONEO!",
										icon: "error",
										html: "Parece que hubo un error. El blog que está intentando eliminar, actualmente se encuentra prestado.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="administrar_blogs.php";
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
		}
		
		// Obtener los datos actuales del blog
		$query = "SELECT * FROM blogs WHERE id_blog = '$id_blog'";
		$resultado = mysqli_query($conexion, $query);
		if (mysqli_num_rows($resultado) > 0) {
			$fila = mysqli_fetch_assoc($resultado);
	echo '
								<script>
									Swal.fire({
										title: "BLOG NO ENCONTRADO!",
										icon: "error",
										html: "Parece que hubo un error con la selección del blog, verifique la existencia del blog e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="administrar_blogs.php";
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
		} else {
	echo '
								<script>
									Swal.fire({
										title: "ELIMINACIÓN EXITOSA!",
										icon: "success",
										html: "El blog ha sido eliminado exitosamente. Use el botón a continuación para volver al listado de blogs.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#219f16",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="administrar_blogs.php";
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
										title: "LIBRO SIN ESPECIFICAR!",
										icon: "error",
										html: "Parece que hubo un error con el blog seleccionado, verifique la selección del blog e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="administrar_blogs.php";
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