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
		<title>Catalogo bibliográfico - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Catalogo bibliográfico'; ?>
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
															Listado de libros disponibles.
														</center>
													</h2>
													<div class="row">
														<div><hr /></div>
														<div class="scrollspy-example position-relative mt-0 overflow-auto">
															<div class="tab-pane fade show active">
																<div class="table-responsive">
																	<div class="row row-cols" style="margin-left: auto; margin-right: auto;">
<?php
	// Consultar la tabla de libros
	$query = "SELECT libros.id_libro, libros.titulo, libros.autor, libros.tema, libros.descripcion, libros.condicion_libro, libros.edades, libros.color, libros.formato, libros.link, libros.portada, disponibles.disponible
	FROM libros
	LEFT JOIN disponibles ON libros.disponible = disponibles.id_disponible WHERE libros.disponible = 1";
	$resultado = mysqli_query($conexion, $query);
	if ($resultado !== false) {
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																		<div class="col mb-7 text-center" style="margin-left: auto; margin-right: auto;">
																			<div style="min-width: 248px; height: 475px;">
																				<div class="card rounded-3 shadow-sm border-primary">
																					<div class="card-header border-primary py-2">
																						<h5 class="my-0 fw-normal">
																							'.$fila['titulo'].'
																						</h5>
																					</div>
																					<div class="card-body">
																						<center>
																							<h1 class="card-title pricing-card-title pt-2 mb-2">
																								<img class="bd-placeholder-img mb-1" src="'.base_urls.'recursos/img/portadas/'.$fila['portada'].$codificacion.'" width="214px" height="260px" />
																								<div class="alert-ficha" role="alert">
																									<span class="quickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal'.$fila['id_libro'].'">
																										<a class="aaa3" href="###" data-tippy="Mostrar información" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
																											VER FICHA TÉCNICA
																										</a>
																									</span>
																								</div>
																							</h1>
																							<a class="btn btn-custom-size lg-sizee btn-primary mb-3" href="confirmar_solicitar_libros.php" style="color: white; width: 195px; font-size: 15px; text-shadow: 1px 1px 2px #060606;">
																								Solicitar préstamo
																							</a>
																						</center>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="modal quick-view-modal fade" id="quickModal'.$fila['id_libro'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickModal'.$fila['id_libro'].'" aria-hidden="true" style="padding-right: 3px;">
																			<div class="modal-dialog modal-dialog-centered">
																				<div class="modal-content">
																					<div class="modal-header">
																						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																					</div>
																					<div class="modal-body">
																						<div class="modal-wrap row">
																							<div class="col-lg-4">
																								<div class="modal-img">
																									<div class="swiper-container modal-sliderr">
																										<div class="swiper-wrapper">
																											<div class="swiper-slide">
																												<a href="#" class="single-img">
																													<img class="img-full" src="'.base_urls.'recursos/img/portadas/'.$fila['portada'].$codificacion.'" />
																												</a>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div class="col-lg-8 pt-0 pt-lg-0">
																								<div class="single-product-content style="font-size: 19px;">
																									<p class="short-desc pt-0 mb-2">
																										<span class="new-price text-danger" style="font-size: 28px;">
																											Título del libro:
																										</span>
																										<font size="5">'.$fila['titulo'].'</font>
																									</p>
																									<div><hr /></div>
																									<p class="short-desc pt-1 mb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Descripción del libro:
																										</span>
																										<span id="descripcion_' . $fila["id_libro"] . '">
																											' . substr($fila["descripcion"], 0, 150) . '...
																											<a class="aa4" href="javascript:void(0);" onclick="toggleDescription(' . $fila["id_libro"] . ')">
																												<i class="fa fa-plus-square-o fa-lg" data-tippy="Mostrar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																											</a>
																										</span>
																										<span id="descripcion_full_' . $fila["id_libro"] . '" style="display: none;">
																											' . $fila["descripcion"] . '
																											<a class="aa4" href="javascript:void(0);" onclick="toggleDescription(' . $fila["id_libro"] . ')" id="vermenosDescription_' . $fila["id_libro"] . '" style="display: none;">
																												<i class="fa fa-minus-square-o fa-lg" data-tippy="Ocultar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																											</a>
																										</span>
																									</p>
																									<div><hr /></div>
																									<p class="short-desc mb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Condición del libro:
																										</span>
																										'.$fila['condicion_libro'].'
																									</p>
																									<div><hr /></div>
																									<p class="short-desc mb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Formato del libro:
																										</span>
																										'.$fila['formato'].'
																									</p>
																									<div><hr /></div>
																									<p class="short-desc mb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Edades del libro:
																										</span>
																										'.$fila['edades'].'
																									</p>
																									<div><hr /></div>
																									<p class="short-desc mb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Código del libro:
																										</span>
																										00'.$fila['id_libro'].'
																									</p>
																									<div><hr /></div>
																									<p class="short-desc mb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Autor del libro:
																										</span>
																										'.$fila['autor'].'
																									</p>
																									<div><hr /></div>
																									<p class="short-desc mb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Tema del libro:
																										</span>
																										'.$fila['tema'].'
																									</p>
																									<div><hr /></div>
																									<div class="product-category pb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Color del libro:&nbsp;
																										</span>
																										<ul>
																											<li>
																												<input class="form-control" type="color" name="color" value="'.$fila['color'].'" title="" style="width: 260px; max-height: 36px; border: 0px solid #000; margin-bottom: 0px; margin-top: 5px;padding: 2px; display: flex; align-items: center;" disabled />
																											</li>
																										</ul>
																									</div>
																									<div><hr /></div>
																									<p class="short-desc mb-0">
																										<span class="new-price text-danger" style="font-size: 22px;">
																											Link del libro:
																										</span>
																										<a class="aaa3" href="'.$fila['link'].'" target="_Blank">'.$fila['link'].'</a>
																									</p>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>';
			}
		} else {
	echo '
																		<script>
																			Swal.fire({
																				title: "LISTADO DE LIBROS, NO DISPONIBLE!",
																				icon: "warning",
																				html: "El catalogo bibliográfico que intentas ver, se encuentra vacío en este momento.",
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
																				title: "ERROR AL CARGAR EL LISTADO DE LIBROS DISPONIBLES!",
																				icon: "error",
																				html: "Este error se manifiesta debido a que la tabla SQL: <font color=#d51a1a>libros</font>, no esta siendo especificada.",
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