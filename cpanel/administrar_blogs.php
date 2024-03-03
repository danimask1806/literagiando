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
		<title>Administrar blogs - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Administrar blogs'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-12">
												<div class="pt-7">
													<a class="btn btn-dark btn-primary-hover mb-1" data-tippy="Agregar un blog" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="agregar_blogs.php">
														<i class="fa fa-plus fa-lg" aria-hidden="true"></i>
													</a>
												</div>
												<ul class="nav product-tab-navv mb-1" role="tablist">
													<li class="nav-item" role="presentation">
														<a class="active tab-btn" id="tabla_blog-tab" data-bs-toggle="tab" href="#tabla_blog" role="tab" aria-controls="tabla_blog" aria-selected="false">
															Información principal
														</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="tab-btn" id="tabla_blog_2-tab" data-bs-toggle="tab" href="#tabla_blog_2" role="tab" aria-controls="tabla_blog_2" aria-selected="true">
															Información secundaria
														</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="tab-btn" id="tabla_blog_3-tab" data-bs-toggle="tab" href="#tabla_blog_3" role="tab" aria-controls="tabla_blog_3" aria-selected="true">
															Mas información
														</a>
													</li>
												</ul>
												<div class="tab-content product-tab-content scrollspy-example position-relative mt-3 overflow-auto">
													<div class="tab-pane fade show active" id="tabla_blog" role="tabpanel" aria-labelledby="tabla_blog-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center; vertical-align: middle; border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código blog</th>
																		<th scope="col">Foto cabecera</th>
																		<th scope="col">Titulo del blog</th>
																		<th scope="col">Autor del blog</th>
																		<th scope="col">Fecha de publicación</th>
																		<th scope="col">Estado del blog</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
	// Consultar la tabla de blogs
	$query = "SELECT blogs.id_blog, blogs.foto_1, blogs.titulo, blogs.autor, blogs.fecha_publicacion, blogs.sub_titulo_1, blogs.descripcion, blogs.foto_2, blogs.sub_titulo_2, blogs.parrafo_1, blogs.parrafo_2, blogs.parrafo_3, blogs.parrafo_4, accesos.acceso
	FROM blogs
	LEFT JOIN accesos ON blogs.acceso = accesos.id_acceso";
	$resultado = mysqli_query($conexion, $query);
	if ($resultado !== false) {
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td>' . $fila["id_blog"] . '</td>
																		<td style="width: 200px; align-items: center;">
																			<img src="'.base_urls.'recursos/img/blog/'.$fila['foto_1'].$codificacion.'" heigth="100%" />
																		</td>
																		<td style="width: 200px; align-items: center;">
																			' . $fila["titulo"] . '
																		</td>
																		<td style="width: 200px; align-items: center;">
																			' . $fila["autor"] . '
																		</td>
																		<td style="width: 220px; align-items: center;">
																			' . $fila["fecha_publicacion"] . '
																		</td>
																		<td style="width: 170px; align-items: center;">
																			' . $fila["acceso"] . '
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar blog" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_blogs.php?id='.$fila['id_blog'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar blog" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_blogs.php?id='.$fila['id_blog'].'">
																				<i class="fa fa-trash" aria-hidden="true"></i>
																			</a>
																		</td>
																	</tr>';
			}
		}
?>
																
																</tbody>
															</table>
														</div>
													</div>
													
													<div class="tab-pane fade" id="tabla_blog_2" role="tabpanel" aria-labelledby="tabla_blog_2-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center; vertical-align: middle; border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código blog</th>
																		<th scope="col">Primer subtitulo</th>
																		<th scope="col">Descripción del blog</th>
																		<th scope="col">Foto cuerpo</th>
																		<th scope="col">Segundo subtitulo</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
		$resultado = mysqli_query($conexion, $query);
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td>' . $fila["id_blog"] . '</td>
																		<td style="width: 200px; align-items: center;">
																			' . $fila["sub_titulo_1"] . '
																		</td>
																		<td style="width: 250px; align-items: center;">
																			<span id="descripcion_' . $fila["id_blog"] . '">
																				' . substr($fila["descripcion"], 0, 100) . '...
																				<a class="aa4" href="javascript:void(0);" onclick="toggleDescription(' . $fila["id_blog"] . ')">
																					<i class="fa fa-plus-square-o fa-lg" data-tippy="Mostrar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																			<span id="descripcion_full_' . $fila["id_blog"] . '" style="display: none;">
																				' . $fila["descripcion"] . '
																				<a class="aa4" href="javascript:void(0);" onclick="toggleDescription(' . $fila["id_blog"] . ')" id="vermenosDescription_' . $fila["id_blog"] . '" style="display: none;">
																					<i class="fa fa-minus-square-o fa-lg" data-tippy="Ocultar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																		</td>
																		<td style="width: 200px; align-items: center;">
																			<img src="'.base_urls.'recursos/img/blog/'.$fila['foto_2'].$codificacion.'" width="100%" />
																		</td>
																		<td style="width: 200px; align-items: center;">
																			' . $fila["sub_titulo_2"] . '
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar blog" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_blogs.php?id='.$fila['id_blog'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar blog" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_blogs.php?id='.$fila['id_blog'].'">
																				<i class="fa fa-trash" aria-hidden="true"></i>
																			</a>
																		</td>
																	</tr>';
			}
		}
?>
																
																</tbody>
															</table>
														</div>
													</div>
													
													<div class="tab-pane fade" id="tabla_blog_3" role="tabpanel" aria-labelledby="tabla_blog_3-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center; vertical-align: middle; border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código blog</th>
																		<th scope="col">Primer párrafo</th>
																		<th scope="col">Segundo párrafo</th>
																		<th scope="col">Tercer párrafo</th>
																		<th scope="col">Cuarto párrafo</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
		$resultado = mysqli_query($conexion, $query);
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td>' . $fila["id_blog"] . '</td>
																		<td style="width: 250px; align-items: center;">
																			<span id="parrafo_1_' . $fila["id_blog"] . '">
																				' . substr($fila["parrafo_1"], 0, 100) . '...
																				<a class="aa4" href="javascript:void(0);" onclick="toggleParrafo_1(' . $fila["id_blog"] . ')">
																					<i class="fa fa-plus-square-o fa-lg" data-tippy="Mostrar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																			<span id="parrafo_1_full_' . $fila["id_blog"] . '" style="display: none;">
																				' . $fila["parrafo_1"] . '
																				<a class="aa4" href="javascript:void(0);" onclick="toggleParrafo_1(' . $fila["id_blog"] . ')" id="vermenosParrafo_1_' . $fila["id_blog"] . '" style="display: none;">
																					<i class="fa fa-minus-square-o fa-lg" data-tippy="Ocultar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																		</td>
																		<td style="width: 250px; align-items: center;">
																			<span id="parrafo_2_' . $fila["id_blog"] . '">
																				' . substr($fila["parrafo_2"], 0, 101) . '...
																				<a class="aa4" href="javascript:void(0);" onclick="toggleParrafo_2(' . $fila["id_blog"] . ')">
																					<i class="fa fa-plus-square-o fa-lg" data-tippy="Mostrar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																			<span id="parrafo_2_full_' . $fila["id_blog"] . '" style="display: none;">
																				' . $fila["parrafo_2"] . '
																				<a class="aa4" href="javascript:void(0);" onclick="toggleParrafo_2(' . $fila["id_blog"] . ')" id="vermenosParrafo_2_' . $fila["id_blog"] . '" style="display: none;">
																					<i class="fa fa-minus-square-o fa-lg" data-tippy="Ocultar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																		</td>
																		<td style="width: 250px; align-items: center;">
																			<span id="parrafo_3_' . $fila["id_blog"] . '">
																				' . substr($fila["parrafo_3"], 0, 100) . '...
																				<a class="aa4" href="javascript:void(0);" onclick="toggleParrafo_3(' . $fila["id_blog"] . ')">
																					<i class="fa fa-plus-square-o fa-lg" data-tippy="Mostrar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																			<span id="parrafo_3_full_' . $fila["id_blog"] . '" style="display: none;">
																				' . $fila["parrafo_3"] . '
																				<a class="aa4" href="javascript:void(0);" onclick="toggleParrafo_3(' . $fila["id_blog"] . ')" id="vermenosParrafo_3_' . $fila["id_blog"] . '" style="display: none;">
																					<i class="fa fa-minus-square-o fa-lg" data-tippy="Ocultar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																		</td>
																		<td style="width: 250px; align-items: center;">
																			<span id="parrafo_4_' . $fila["id_blog"] . '">
																				' . substr($fila["parrafo_4"], 0, 100) . '...
																				<a class="aa4" href="javascript:void(0);" onclick="toggleParrafo_4(' . $fila["id_blog"] . ')">
																					<i class="fa fa-plus-square-o fa-lg" data-tippy="Mostrar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																			<span id="parrafo_4_full_' . $fila["id_blog"] . '" style="display: none;">
																				' . $fila["parrafo_4"] . '
																				<a class="aa4" href="javascript:void(0);" onclick="toggleParrafo_4(' . $fila["id_blog"] . ')" id="vermenosParrafo_4_' . $fila["id_blog"] . '" style="display: none;">
																					<i class="fa fa-minus-square-o fa-lg" data-tippy="Ocultar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar blog" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_blogs.php?id='.$fila['id_blog'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar blog" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_blogs.php?id='.$fila['id_blog'].'">
																				<i class="fa fa-trash" aria-hidden="true"></i>
																			</a>
																		</td>
																	</tr>';
			}
		} else {
	echo '															
																	<script>
																		Swal.fire({
																			title: "LISTADO DE BLOGS, NO DISPONIBLE!",
																			icon: "warning",
																			html: "La tabla SQL: <font color=#d51a1a>blogs</font>, se encuentra vacía en este momento.",
																			allowOutsideClick: false,
																			showCloseButton: false,
																			showCancelButton: false,
																			focusConfirm: false,
																			confirmButtonColor: "#ff7800",
																			confirmButtonText: "OK",
																		});
																	</script>';
		}
	} else {
	echo '															
																	<script>
																		Swal.fire({
																			title: "ERROR AL CARGAR EL LISTADO DE BLOGS DISPONIBLES!",
																			icon: "error",
																			html: "La tabla SQL: <font color=#d51a1a>blogs</font>, no esta siendo especificada o es posible que haya un error en la consulta.",
																			allowOutsideClick: false,
																			showCloseButton: false,
																			showCancelButton: false,
																			focusConfirm: false,
																			confirmButtonColor: "#d51a1a",
																			confirmButtonText: "OK",
																		});
																	</script>
																</tbody>
															</table>
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
																
																</tbody>
															</table>
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