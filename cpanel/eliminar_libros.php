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
		<title>Eliminar libro - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Eliminar libro'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
	
<?php
	// Verificar si se proporciona la ID de libro en la URL
	if (isset($_GET['id'])) {
		$id_libro = $_GET['id'];
		
		// Obtener los datos actuales del libro
		$query = "SELECT * FROM libros WHERE id_libro = '$id_libro'";
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
														<form method="post" action="confirmar_eliminar_libros.php?id=<?php echo $fila['id_libro']; ?>">
															<input type="hidden" name="id_libro" value="<?php echo $fila['id_libro']; ?>" />
															<input type="hidden" name="imagenAnterior" value="../recursos/img/portadas/<?php echo $fila['portada']; ?>">
															<center>
																<h2 class="login-title-1 pt-5">
																	<hr class="style-three mb-5" />
																</h2>
																<div class="row">
																	<div class="error-404-content">
																		<h1 class="title mb-7" style="line-height: 40px;">
																			¡Eliminación de libro!
																		</h1>
																		<h2 class="sub-title mb-9">
																			Esta por eliminar el libro titulado:
																			<br />
																			<span><?php echo $fila['titulo'] ?></span>.
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
																			<a class="btn btn-custom-size lg-size btn-primary" href="administrar_libros.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
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
										title: "LIBRO NO ENCONTRADO!",
										icon: "error",
										html: "Parece que hubo un error al seleccionar al libro, verifique la existencia del libro e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="administrar_libros.php";
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
										html: "Parece que hubo un error con el libro seleccionado, verifique la selección del libro e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="administrar_libros.php";
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