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
	// Verificar si se proporciona la ID de blog en la URL
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
												<div class="login-form mb-10">
													<div class="row">
														<form method="post" action="confirmar_eliminar_blogs.php?id=<?php echo $fila['id_blog']; ?>">
															<input type="hidden" name="id_blog" value="<?php echo $fila['id_blog']; ?>" />
															<input type="hidden" name="imagenAnterior1" value="../recursos/img/blog/<?php echo $fila['foto_1']; ?>">
															<input type="hidden" name="imagenAnterior2" value="../recursos/img/blog/<?php echo $fila['foto_2']; ?>">
															<center>
																<h2 class="login-title-1 pt-5">
																	<hr class="style-three mb-5" />
																</h2>
																<div class="row">
																	<div class="error-404-content">
																		<h1 class="title mb-7" style="line-height: 40px;">
																			¡Eliminación de blog!
																		</h1>
																		<h2 class="sub-title mb-9">
																			Esta por eliminar el blog titulado:
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
																			<a class="btn btn-custom-size lg-size btn-primary" href="administrar_blogs.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
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
										title: "BLOG NO ENCONTRADO!",
										icon: "error",
										html: "Parece que hubo un error al seleccionar al blog, verifique la existencia del blog e inténtelo de nuevo.",
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
	} else {
	echo '
								<script>
									Swal.fire({
										title: "BLOG SIN ESPECIFICAR!",
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