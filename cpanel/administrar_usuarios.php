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
		<title>Administrar usuarios - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Administrar usuarios'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-12">
												<div class="pt-7">
													<a class="btn btn-dark btn-primary-hover mb-1" data-tippy="Agregar un usuario" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="agregar_usuarios.php">
														<i class="fa fa-plus fa-lg" aria-hidden="true"></i>
													</a>
												</div>
												<ul class="nav product-tab-navv mb-1" role="tablist">
													<li class="nav-item" role="presentation">
														<a class="active tab-btn" id="tabla_usuario-tab" data-bs-toggle="tab" href="#tabla_usuario" role="tab" aria-controls="tabla_usuario" aria-selected="false">
															Información principal
														</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="tab-btn" id="tabla_usuario_2-tab" data-bs-toggle="tab" href="#tabla_usuario_2" role="tab" aria-controls="tabla_usuario_2" aria-selected="true">
															Información secundaria
														</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="tab-btn" id="tabla_usuario_3-tab" data-bs-toggle="tab" href="#tabla_usuario_3" role="tab" aria-controls="tabla_usuario_3" aria-selected="true">
															Mas información
														</a>
													</li>
												</ul>
												<div class="tab-content product-tab-content scrollspy-example position-relative mt-3 overflow-auto">
													<div class="tab-pane fade show active" id="tabla_usuario" role="tabpanel" aria-labelledby="tabla_usuario-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center;vertical-align: middle;border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código usuario</th>
																		<th scope="col">Nombre completo</th>
																		<th scope="col">Identificación del usuario</th>
																		<th scope="col">Acceso del usuario</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
	// Consultar la tabla de usuarios
	$query = "SELECT usuarios.id_usuario, usuarios.identificacion, usuarios.nombre_completo, usuarios.sexo, usuarios.telefono, usuarios.correo, usuarios.usuario, usuarios.foto_perfil, usuarios.acceso, usuarios.fecha_creacion, roles.rol
	FROM usuarios
	LEFT JOIN roles ON usuarios.rol = roles.id_rol
	WHERE usuarios.id_usuario NOT IN (1)";
	$resultado = mysqli_query($conexion, $query);
	if ($resultado !== false) {
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td>' . $fila["id_usuario"] . '</td>
																		<td style="width: 250px; align-items: center;">
																			' . $fila["nombre_completo"] . '
																		</td>
																		<td style="width: 220px; align-items: center;">
																			' . $fila["identificacion"] . '
																		</td>
																		<td style="width: 200px; align-items: center;">
																			' . ($fila["acceso"] == 1 ? "Activo" : "Inactivo") . '
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar usuario" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_usuarios.php?id='.$fila['id_usuario'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar usuario" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_usuarios.php?id='.$fila['id_usuario'].'">
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
													
													<div class="tab-pane fade" id="tabla_usuario_2" role="tabpanel" aria-labelledby="tabla_usuario_2-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center; vertical-align: middle; border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código usuario</th>
																		<th scope="col">Teléfono del usuario</th>
																		<th scope="col">Genero del usuario</th>
																		<th scope="col">Rango del usuario</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
		$resultado = mysqli_query($conexion, $query);
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td>' . $fila["id_usuario"] . '</td>
																		<td style="width: 250px; align-items: center;">
																			' . $fila["telefono"] . '
																		</td>
																		<td style="width: 250px; align-items: center;">
																			' . $fila["sexo"] . '
																		</td>
																		<td style="width: 200px; align-items: center;">
																			' . $fila["rol"] . '
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar usuario" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_usuarios.php?id='.$fila['id_usuario'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar usuario" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_usuarios.php?id='.$fila['id_usuario'].'">
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
													
													<div class="tab-pane fade" id="tabla_usuario_3" role="tabpanel" aria-labelledby="tabla_usuario_3-tab">
														<div class="table-responsive">
															<table class="table table-bordered table-hover mb-3" style="text-align: center; vertical-align: middle; border-collapse: collapse;">
																<tbody>
																	<tr>
																		<th scope="col">Código usuario</th>
																		<th scope="col">Nombre de usuario</th>
																		<th scope="col">Correo electrónico</th>
																		<th scope="col">Fecha de registro</th>
																		<th scope="col">Foto del usuario</th>
																		<th scope="col">Administrar</th>
																	</tr>
<?php
		$resultado = mysqli_query($conexion, $query);
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																	<tr>
																		<td>' . $fila["id_usuario"] . '</td>
																		<td style="width: 250px; align-items: center;">
																			' . $fila["usuario"] . '
																		</td>
																		<td style="width: 330px; align-items: center;">
																			' . $fila["correo"] . '
																		</td>
																		<td style="width: 250px; align-items: center;">
																			' . $fila["fecha_creacion"] . '
																		</td>
																		<td style="width: 140px; align-items: center;">
																			<img src="'.base_urls.'recursos/img/perfiles/'.$fila['foto_perfil'].$codificacion.'" heigth="100%" />
																		</td>
																		<td>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Editar usuario" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_usuarios.php?id='.$fila['id_usuario'].'">
																				<i class="fa fa-edit" aria-hidden="true"></i>
																			</a>
																			<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar usuario" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_usuarios.php?id='.$fila['id_usuario'].'">
																				<i class="fa fa-trash" aria-hidden="true"></i>
																			</a>
																		</td>
																	</tr>';
			}
		} else {
	echo '															
																	<script>
																		Swal.fire({
																			title: "LISTADO DE USUARIOS, NO DISPONIBLE!",
																			icon: "warning",
																			html: "La tabla SQL: <font color=#d51a1a>usuarios</font>, se encuentra vacía en este momento.",
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
																			title: "ERROR AL CARGAR EL LISTADO DE USUARIOS DISPONIBLES!",
																			icon: "error",
																			html: "La tabla SQL: <font color=#d51a1a>usuarios</font>, no esta siendo especificada o es posible que haya un error en la consulta.",
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