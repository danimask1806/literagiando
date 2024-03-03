<?php
	ob_start();
	
	// Sesión
	require_once('../includes/session_usuarios.php');
	
	// Permiso
	require_once('../includes/permiso_prestamos.php');
	
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
		<title>Solicitar préstamo - <?php echo base_titulo_2; ?></title>
		
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
<?php const base_tabla_titulo = 'Solicitar préstamo'; ?>
							<div class="col-xl-9 col-lg-8 order-lg-2 order-1">
								<!-- .Carrito de préstamos -->
								<?php include('carrito.php'); ?>
								
								<!-- ---------------------------------------------------------------- -->
								<div class="product-tab-area section-space-y-axis">
									<div class="containerr">
										<div class="roww">
											<div class="col-lg-10 pt-5" style="margin: 0 auto;">
												<form method="post" action="solicitar_prestamos.php" onsubmit="return validarFormulario()">
													<input type="hidden" name="verificar" id="verificar" value="0">
													<div class="login-form mb-10">
														<h2 class="login-title-1 mb-2">
															<center>
																Listado de libros disponibles.
															</center>
														</h2>
														<div class="row">
															<div><hr /></div>
															<h2 class="login-title-1 pt-5 mb-7 d-none d-lg-block">
																<center>
																	<table>
																		<tr style="font-size: 18px;">
																			<th scope="col">
																				<center>
																					<div class="spinner-grow" style="width: 80px; height: 80px; color:#eb8600;" role="status"></div>
																					SELECCIÓNAR LIBROS
																				</center>
																			</th>
																			<th scope="col" style="width: 180px;">
																				<hr style="border: none; margin-bottom: 60px; height: 8px; background-color: #eb8600; opacity: 0.50;" role="status" />
																			</th>
																			<th scope="col">
																				<center>
																					<div class="" style="width: 80px; height: 80px; border-radius: 50%; background: #eb8600; opacity: 0.50;" role="status"></div>
																					PROCESAR FORMULARIO
																				</center>
																			</th>
																			<th scope="col" style="width: 180px;">
																				<hr style="border: none; margin-bottom: 60px; height: 8px; background-color: #eb8600; opacity: 0.50;" role="status" />
																			</th>
																			<th scope="col" style="padding:0rem 0rem 0rem 0.9rem;">
																				<center>
																					<div class="" style="width: 80px; height: 80px; border-radius: 50%; background: #eb8600; opacity: 0.50;" role="status"></div>
																					VERIFICAR PRÉSTAMO
																				</center>
																			</th>
																		</tr>
																	</table>
																</center>
															</h2>
															<div class="table-responsive small">
																<fieldset required>
																	<table class="table table-bordered table-hover">
																		<tbody style="border: 3px solid #fff5f5;">
																			<tr style="border: 3px solid #fff5f5; font-size: 18px;">
																				<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Código</th>
																				<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Portada</th>
																				<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Título del libro</th>
																				<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Estado</th>
																				<th scope="col" style="border: 3px solid #fff5f5; padding:0.8rem 0.2rem; background-color:#eb8600; color:white;">Seleccionar</th>
																			</tr>
<?php
	$query = "SELECT libros.id_libro, libros.titulo, libros.autor, libros.tema, libros.descripcion, libros.condicion_libro, libros.edades, libros.color, libros.formato, libros.link, libros.portada,
	disponibles.disponible
	FROM libros
	LEFT JOIN disponibles ON libros.disponible = disponibles.id_disponible
	WHERE libros.disponible = 1";
	$resultado = mysqli_query($conexion, $query);
	if ($resultado !== false) {
		if ($resultado->num_rows > 0) {
			while ($fila = mysqli_fetch_array($resultado)) {
	echo '
																			<tr style="border: 3px solid #fff5f5;">
																				<td style="border: 3px solid #fff5f5; width: 130px; font-size: 18px; align-items: center;">00' . $fila["id_libro"] . '</td>
																				<td style="border: 3px solid #fff5f5; width: 160px; align-items: center;">
																					<img src="'.base_urls.'recursos/img/portadas/'.$fila['portada'].$codificacion.'" height="100%" style="max-width: 100px; align-items: center;" />
																				</td>
																				<td style="border: 3px solid #fff5f5; width: 270px; align-items: center;">
																					' . $fila["titulo"] . '
																				</td>
																				<td style="border: 3px solid #fff5f5; width: 160px; font-size: 18px; align-items: center;">
																					' . $fila["disponible"] . '
																				</td>
																				<td style="border: 3px solid #fff5f5; width: 160px; align-items: center;">
																					<label class="form-check-label" for="invalidCheck'.$fila['id_libro'].'">
																						<input class="input-checkbox" type="checkbox" name="id_libro_[]" id="invalidCheck'.$fila['id_libro'].'" value="'.$fila['id_libro'].'" onchange="updateSelectedCount()" style="transform: scale(2.0); margin-bottom: 0px; margin-top: 10px;" /> 
																					</label>
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
																			</script>';
		
	}
	
	// Cerramos la conexión con la base de datos
	mysqli_close($conexion);
?>
																		
																		</tbody>
																	</table>
																</fieldset>
															</div>
															<div><hr /></div>
															<center>
																<div class="row row-cols pt-3">
																	<div class="col mb-3">
																		<button class="btn btn-custom-size lg-size btn-primary" type="submit" name="solicitar" style="color: white; text-shadow: 1px 1px 2px #060606;">
																			Continuar
																		</button>
																	</div>
																	<div class="col">
																		<a class="btn btn-custom-size lg-size btn-primary" href="catalogo_bibliografico.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
																			Cancelar
																		</a>
																	</div>
																</div>
															</center>
														</div>
													</div>
												</form>
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
		
		<!-- .Control de libros -->
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/libros_seleccionados.js<?php include('../includes/codificacion.php'); ?>"></script>
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/libros_no_seleccionados.js<?php include('../includes/codificacion.php'); ?>"></script>
		<script language="JavaScript" type="text/javascript" src="<?php echo base_urls; ?>recursos/js/libros_no_seleccionados_2.js<?php include('../includes/codificacion.php'); ?>"></script>
	
	</body>
</html>
<?php
	ob_end_flush();
	exit;
?>