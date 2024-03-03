									<div class="widgets-areaa">
										<div class="offcanvas-user-info text-center px-0 pb-2">
											<p class="mb-0">
												<a class="aa2" href="###">
													ÚLTIMA ACTUALIZACIÓN
													<br />
													AÑADIDA:
													<span>
														<script>
															//<![CDATA[
															function makeArray() {
																for (i = 0;
																i<makeArray.arguments.length; i++)this[i + 1] = makeArray.arguments[i];
															}
															var months = new makeArray("01","02","03","04","05","06","07","08","09","10","11","12");
															var date = new Date();
															var day = date.getDate();
															var month = date.getMonth() + 1;
															var yy = date.getYear();
															var year = (yy < 1000) ? yy + 1900 : yy;
															document.write(+ day + "/" + months[month] + "/" + year);
															//]]>
														</script>
													</span>
												</a>
											</p>
											<hr class="style-one" />
										</div>
										<div class="offcanvas-menu_area">
											<nav class="offcanvas-navigation">
												<ul class="mobile-menu">
													<li>
														<a class="aa2 dropdown-itemm" href="home.php" style="font-size: 21px;">
															<span class="mm-text">
																<i class="fa fa-home fa-lg" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Dashboard
															</span>
														</a>
													</li>
													<hr class="style-two mb-3" />
<?php
    require_once('../includes/conexion.php');
	// Obtener los datos actuales del usuario
	$query = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
	$resultado = mysqli_query($conexion, $query);
            
	if (mysqli_num_rows($resultado) > 0) {
		$fila = mysqli_fetch_assoc($resultado);
		$rol = $fila['rol'];

		// Verificar si el "rol" es igual a 1 para mostrar opciones de Staff
		if ($rol == 1) {
	echo '
													<li class="menu-item-has-children">
														<a class="aa2 dropdown-itemm" href="#" style="font-size: 21px;">
															<span class="mm-text">
																<i class="fa fa-tachometer fa-lg" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Administración <i class="fa fa-angle-down" aria-hidden="true"></i>
															</span>
														</a>
														<ul class="sub-menu">
															<li class="menu-item-has-children pt-1">
																<a class="aa2 dropdown-itemm" href="administrar_blogs.php" style="font-size: 18px;">
																	<span class="mm-text">
																	&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-rss" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Administrar blogs
																	</span>
																</a>
															</li>
															<li class="menu-item-has-children pt-1">
																<a class="aa2 dropdown-itemm" href="administrar_libros.php" style="font-size: 18px;">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;<i class="fa fa-leanpub" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Administrar libros
																	</span>
																</a>
															</li>
															<li class="menu-item-has-children pt-1">
																<a class="aa2 dropdown-itemm" href="administrar_usuarios.php" style="font-size: 18px;">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Administrar usuarios
																	</span>
																</a>
															</li>
															<li class="menu-item-has-children pt-1">
																<a class="aa2 dropdown-itemm" href="administrar_prestamos.php" style="font-size: 18px;">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Administrar préstamos
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<hr class="style-two mb-3" />
													<li class="menu-item-has-children">
														<a class="aa2 dropdown-itemm" href="#" style="font-size: 21px;">
															<span class="mm-text">
																<i class="fa fa-history fa-lg" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Crear históricos <i class="fa fa-angle-down" aria-hidden="true"></i>
															</span>
														</a>
														<ul class="sub-menu">
															<li>
																<a class="aa2 dropdown-itemm" href="historico_libros.php'.$codificacion.'" target="Blank">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Histórico de libros
																	</span>
																</a>
															</li>
															<li>
																<a class="aa2 dropdown-itemm" href="historico_usuarios.php'.$codificacion.'" target="Blank">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Histórico de usuarios
																	</span>
																</a>
															</li>
															<li>
																<a class="aa2 dropdown-itemm" href="historico_prestamos.php'.$codificacion.'" target="Blank">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Histórico de préstamos
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<hr class="style-two mb-3" />
													<li class="menu-item-has-children">
														<a class="aa2 dropdown-itemm" href="#" style="font-size: 21px;">
															<span class="mm-text">
																<i class="fa fa-cogs fa-lg" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Configuración <i class="fa fa-angle-down" aria-hidden="true"></i>
															</span>
														</a>
														<ul class="sub-menu">
															<li>
																<a class="aa2 dropdown-itemm" href="administrar_menu_interno.php">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Menú interior
																	</span>
																</a>
															</li>
															<li>
																<a class="aa2 dropdown-itemm" href="administrar_menu_externo.php">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Menú exterior
																	</span>
																</a>
															</li>
															<li>
																<a class="aa2 dropdown-itemm" href="administrar_footer_externo.php">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Footer exterior
																	</span>
																</a>
															</li>
															<li>
																<a class="aa2 dropdown-itemm" href="administrar_textos_opciones.php">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Textos y opciones
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<hr class="style-two mb-3" />';
		}
	}
?>											
											
													<li class="menu-item-has-children">
														<a class="aa2 dropdown-itemm" href="#" style="font-size: 21px;">
															<span class="mm-text">
																<i class="fa fa-book fa-lg" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Biblioteca <i class="fa fa-angle-down" aria-hidden="true"></i>
															</span>
														</a>
														<ul class="sub-menu">
															<li class="pt-1">
																<a class="aa2 dropdown-itemm" href="catalogo_bibliografico.php">
																	<span class="mm-text">
																		&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Catalogo bibliográfico
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<hr class="style-two mb-3" />
													<li class="menu-item-has-children">
														<a class="aa2 dropdown-itemm" href="#" style="font-size: 21px;">
															<span class="mm-text">
																<i class="fa fa-rss-square fa-lg" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Blogs <i class="fa fa-angle-down" aria-hidden="true"></i>
															</span>
														</a>
														<ul class="sub-menu">
															<li class="pt-1">
																<a class="aa2 dropdown-itemm" href="catalogo_blogs.php">
																	<span class="mm-text">
																		&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Catalogo de Blogs
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<hr class="style-one mb-5" />
													<li class="menu-item-has-children">
														<a class="aa2 dropdown-itemm" href="#" style="font-size: 21px;">
															<span class="mm-text">
																&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-user-circle-o fa-lg" aria-hidden="true" style="color: white;"></i>&nbsp;&nbsp;Mi cuenta <i class="fa fa-angle-down" aria-hidden="true"></i>
															</span>
														</a>
														<ul class="sub-menu">
															<li class="pt-1">
																<a class="aa2 dropdown-itemm" href="perfil.php">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Editar perfil
																	</span>
																</a>
															</li>
															<li class="pt-1">
																<a class="aa2 dropdown-itemm" href="<?php echo base_urls; ?>logout">
																	<span class="mm-text">
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Cerrar sesión
																	</span>
																</a>
															</li>
														</ul>
													</li>
												</ul>
											</nav>
										</div>
									</div>