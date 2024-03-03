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
		<title>Visualizar blog - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Visualizar blog'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
<?php
	// Verificamos si se proporciono la ID del blog en la URL
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
													<div class="blog-detail-item">
														<div class="blog-img">
															<img class="img-fulll" src="<?php echo base_urls; ?>recursos/img/blog/<?php echo $fila['foto_1'].$codificacion; ?>" />
														</div>
														<div class="blog-content pt-lg-0">
															<div class="meta-with-title mb-4">
																<center>
																	<div class="blog-meta text-paynes-grey pt-1 pb-2" style="font-size: 15px;">
																		<i class="fa fa-calendar-o" aria-hidden="true"></i>
																		<i style="font-family: arial;">Fecha de publicación:</i> <?php echo $fila['fecha_publicacion']; ?>
																		
																	</div>
																	<h1 style="line-height: 1.1; font-family: arial;">
																		<?php echo $fila['titulo']; ?>
																		
																	</h1>
																	<div class="blog-meta text-paynes-grey pt-0 pb-1" style="font-size: 15px;">
																		<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
																		<i style="font-family: arial;">Publicado por:</i> <?php echo $fila['autor']; ?>
																		
																	</div>
																</center>
															</div>
															<div class="col-lg-11 col-md-11 col-sm-11 col-12" style="margin: 0 auto;">
																<?php echo '<h4 class="title" style="font-family: arial;">'.$fila['sub_titulo_1'].'</h4>'; ?>
																
																<p class="short-desc mb-0 pt-3" style="display: flex; line-height: 25px; font-size: 16px;">
																	<?php echo $fila['descripcion']; ?>
																
																</p>
															</div>
															<div class="mb-7 pt-2"><hr /></div>
															<p class="img-hover-effect mb-0">
																<img class="img-fulll" src="<?php echo base_urls; ?>recursos/img/blog/<?php echo $fila['foto_2'].$codificacion; ?>" />
															</p>
															<blockquote class="mb-7" style="padding: 10px;">
																<div style="display: flex; line-height: 0px;">
																	<img src="<?php echo base_urls; ?>recursos/img/icon/fa-lightbulb-o.png<?php echo $codificacion; ?>"  style="margin-right: 5px; height: 41px;" />
																	<p class="short-desc" style="display: flex; line-height: 25px; font-size: 16px;">
																		<h4 class="title" style="font-family: arial;">
																			<?php echo $fila['sub_titulo_2']; ?>
																			
																		</h4>
																	</p>
																</div>
															</blockquote>
															<div class="col-lg-11 col-md-11 col-sm-11 col-12" style="margin: 0 auto;">
																<div class="mb-5" style="display: flex; line-height: 0px;">
																	<i class="fa fa-check-circle fa-4x" aria-hidden="true" style="color: #f2bf01;margin-right: 15px;"></i>
																	<p class="short-desc" style="display: flex; line-height: 25px; font-size: 16px;">
																		<?php echo $fila['parrafo_1']; ?>
																		
																	</p>
																</div>
																<div class="mb-5" style="display: flex; line-height: 0px;">
																	<i class="fa fa-check-circle fa-4x" aria-hidden="true" style="color: #f2bf01;margin-right: 15px;"></i>
																	<p class="short-desc" style="display: flex; line-height: 25px; font-size: 16px;">
																		<?php echo $fila['parrafo_2']; ?>
																		
																	</p>
																</div>
																<div class="mb-5" style="display: flex; line-height: 0px;">
																	<i class="fa fa-check-circle fa-4x" aria-hidden="true" style="color: #f2bf01;margin-right: 15px;"></i>
																	<p class="short-desc" style="display: flex; line-height: 25px; font-size: 16px;">
																		<?php echo $fila['parrafo_3']; ?>
																		
																	</p>
																</div>
																<div class="mb-10" style="display: flex; line-height: 0px;">
																	<i class="fa fa-check-circle fa-4x" aria-hidden="true" style="color: #f2bf01;margin-right: 15px;"></i>
																	<p class="short-desc" style="display: flex; line-height: 25px; font-size: 16px;">
																		<?php echo $fila['parrafo_4']; ?>
																		
																	</p>
																</div>
															</div>
														</div>
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
										title: "ERROR AL CARGAR EL BLOG!",
										icon: "error",
										html: "El blog que intenta ver, no existe. Use el botón a continuación para volver al listado de blog registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "ADMINITRAR BLOGS",
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
										html: "El blog que intenta ver, no existe. Use el botón a continuación para volver al listado de blog registrados.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "ADMINITRAR BLOGS",
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