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
		<title>Administrar libros - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Administrar libros'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-12">
												<div class="pt-7">
													<a class="btn btn-dark btn-primary-hover mb-1" data-tippy="Agregar un libro" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="agregar_libros.php">
														<i class="fa fa-plus fa-lg" aria-hidden="true"></i>
													</a>
												</div>
												<ul class="nav product-tab-navv mb-1" role="tablist">
													<li class="nav-item" role="presentation">
														<a class="active tab-btn" id="tabla_libro-tab" data-bs-toggle="tab" href="#tabla_libro" role="tab" aria-controls="tabla_libro" aria-selected="false">
															Información principal
														</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="tab-btn" id="tabla_libro_2-tab" data-bs-toggle="tab" href="#tabla_libro_2" role="tab" aria-controls="tabla_libro_2" aria-selected="true">
															Información secundaria
														</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="tab-btn" id="tabla_libro_3-tab" data-bs-toggle="tab" href="#tabla_libro_3" role="tab" aria-controls="tabla_libro_3" aria-selected="true">
															Mas información
														</a>
													</li>
												</ul>
												<div class="tab-content product-tab-content scrollspy-example position-relative mt-3 overflow-auto">
													<div class="tab-pane fade show active" id="tabla_libro" role="tabpanel" aria-labelledby="tabla_libro-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center; vertical-align: middle; border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código libro</th>
																		<th scope="col">Título del libro</th>
																		<th scope="col">Descripción del libro</th>
																		<th scope="col">Autor del libro</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
	// Consultar la tabla de libros
	$query = "SELECT libros.id_libro, libros.titulo, libros.autor, libros.tema, libros.descripcion, libros.condicion_libro, libros.edades, libros.color, libros.formato, libros.link, libros.portada, disponibles.disponible
	FROM libros
	LEFT JOIN disponibles ON libros.disponible = disponibles.id_disponible";
	$resultado = mysqli_query($conexion, $query);
	if ($resultado !== false) {
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td>' . $fila["id_libro"] . '</td>
																		<td style="width: 270px; align-items: center;">
																			' . $fila["titulo"] . '
																		</td>
																		<td style="width: 270px; align-items: center;">
																			<span id="descripcion_' . $fila["id_libro"] . '">
																				' . substr($fila["descripcion"], 0, 99) . '...
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
																		</td>
																		<td style="width: 270px; align-items: center;">
																			' . $fila["autor"] . '
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar libro" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_libros.php?id='.$fila['id_libro'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar libro" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_libros.php?id='.$fila['id_libro'].'">
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
													
													<div class="tab-pane fade" id="tabla_libro_2" role="tabpanel" aria-labelledby="tabla_libro_2-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center; vertical-align: middle; border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código libro</th>
																		<th scope="col">Tema del libro</th>
																		<th scope="col">Condición del libro</th>
																		<th scope="col">Edades del libro</th>
																		<th scope="col">Formato del libro</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
		$resultado = mysqli_query($conexion, $query);
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td>' . $fila["id_libro"] . '</td>
																		<td style="width: 250px; align-items: center;">
																			' . $fila["tema"] . '
																		</td>
																		<td style="width: 250px; align-items: center;">
																			' . $fila["condicion_libro"] . '
																		</td>
																		<td style="width: 150px; align-items: center;">
																			' . $fila["edades"] . '
																		</td>
																		<td style="width: 150px; align-items: center;">
																			' . $fila["formato"] . '
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar libro" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_libros.php?id='.$fila['id_libro'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar libro" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_libros.php?id='.$fila['id_libro'].'">
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
													
													<div class="tab-pane fade" id="tabla_libro_3" role="tabpanel" aria-labelledby="tabla_libro_3-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center; vertical-align: middle; border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código libro</th>
																		<th scope="col">URL del libro</th>
																		<th scope="col">Color del libro</th>
																		<th scope="col">Disponibilidad</th>
																		<th scope="col">Portada del libro</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
		$resultado = mysqli_query($conexion, $query);
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td style="width: 80px; align-items: center;">
																			' . $fila["id_libro"] . '
																		</td>
																		<td style="width: 100px; align-items: center;">
																			<span id="link_' . $fila["id_libro"] . '">
																				' . substr($fila["link"], 0, 40) . '...
																				<a class="aa4" href="javascript:void(0);" onclick="toggleLink(' . $fila["id_libro"] . ')">
																					<i class="fa fa-plus-square-o fa-lg" data-tippy="Mostrar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																			<span id="link_full_' . $fila["id_libro"] . '" style="display: none;">
																				' . $fila["link"] . '
																				<a class="aa4" href="javascript:void(0);" onclick="toggleLink(' . $fila["id_libro"] . ')" id="vermenosLink_' . $fila["id_libro"] . '" style="display: none;">
																					<i class="fa fa-minus-square-o fa-lg" data-tippy="Ocultar" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" aria-hidden="true"></i>
																				</a>
																			</span>
																		</td>
																		<td style="width: 160px; align-items: center;">
																			<center>
																				<input class="form-control" type="color" name="color" value="'.$fila['color'].'" title="" style="width: 150px; max-height: 36px; border: 0px solid #000; padding: 2px; display: flex; align-items: center;" disabled />
																			</center>
																		</td>
																		<td style="width: 180px; align-items: center;">
																			' . $fila["disponible"] . '
																		</td>
																		<td style="width: 160px; align-items: center;">
																			<img src="'.base_urls.'recursos/img/portadas/'.$fila['portada'].$codificacion.'" height="100%" style="max-width: 150px; align-items: center;" />
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar libro" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_libros.php?id='.$fila['id_libro'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar libro" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_libros.php?id='.$fila['id_libro'].'">
																				<i class="fa fa-trash" aria-hidden="true"></i>
																			</a>
																		</td>
																	</tr>';
			}
		} else {
	echo '															
																	<script>
																		Swal.fire({
																			title: "LISTADO DE LIBROS, NO DISPONIBLE!",
																			icon: "warning",
																			html: "La tabla SQL: <font color=#d51a1a>libros</font>, se encuentra vacía en este momento.",
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
																			title: "ERROR AL CARGAR EL LISTADO DE LIBROS DISPONIBLES!",
																			icon: "error",
																			html: "La tabla SQL: <font color=#d51a1a>libros</font>, no esta siendo especificada o es posible que haya un error en la consulta.",
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