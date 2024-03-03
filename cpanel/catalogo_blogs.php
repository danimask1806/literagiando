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
		<title>Catalogo de blogs - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Catalogo de blogs'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-11 pt-5" style="margin: 0 auto;">
												<div class="login-form mb-10">
													<h2 class="login-title-1 mb-2">
														<center>
															Catalogo de blogs publicados.
														</center>
													</h2>
													<div class="row">
														<div><hr /></div>
														<div class="scrollspy-example position-relative mt-0 overflow-auto">
															<div class="tab-pane fade show active">
																<div class="table-responsive">
																	<div class="row row-cols-lg row-cols-md row-cols-sm row-cols text-center" style="margin-left: auto; margin-right: auto;">
<?php
	// Consultar la tabla de libros
	$query = "SELECT blogs.id_blog, blogs.foto_1, blogs.titulo, blogs.autor, blogs.fecha_publicacion, blogs.sub_titulo_1, blogs.descripcion, blogs.foto_2, blogs.sub_titulo_2, blogs.parrafo_1, blogs.parrafo_2, blogs.parrafo_3, blogs.parrafo_4, accesos.acceso
	FROM blogs
	LEFT JOIN accesos ON blogs.acceso = accesos.id_acceso WHERE blogs.acceso = 1";
	$resultado = mysqli_query($conexion, $query);
	if ($resultado !== false) {
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																		<div class="col" style="margin-left: auto; margin-right: auto; width: 290px;">
																			<div class="card text-bg-dark mb-5" style="background-image: url('.base_urls.'recursos/img/blog/'.$fila['foto_1'].$codificacion.'); background-size: cover; background-position: center; background-repeat: no-repeat;">
																				<div class="d-flex flex-column pt-6 p-4 pb-4 text-white">
																					<p class="mb-3">
																						<span style="font-size: 26px; line-height: 28px; text-shadow: 1px 1px 2px #060606;">
																							' . $fila["titulo"] . '
																						</span>
																					</p>
																					<ul class="pt-4">
																						<li>
																							<a class="btn btn-custom-size lg-size btn-primary mb-3" href="ver_blogs.php?id='.$fila['id_blog'].'" style="width: 180px; font-size: 14px; text-shadow: 1px 1px 2px #060606;">
																								Ver articulo
																							</a>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</div>';
			}
		} else {
	echo '
																		<script>
																			Swal.fire({
																				title: "LISTADO DE BLOGS, NO DISPONIBLE!",
																				icon: "warning",
																				html: "El catalogo de blogs o artículos que intentas ver, se encuentra vacío en este momento.",
																				allowOutsideClick: false,
																				showCloseButton: false,
																				showCancelButton: false,
																				focusConfirm: false,
																				confirmButtonColor: "#ff7800",
																				confirmButtonText: "OK",
																			});
																		</script>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
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
																				title: "ERROR AL CARGAR EL LISTADO DE BLOGS DISPONIBLES!",
																				icon: "error",
																				html: "Este error se manifiesta debido a que la tabla SQL: <font color=#d51a1a>blogs</font>, no esta siendo especificada.",
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
													</div>
												</div>
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
													</div>
												</div>
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