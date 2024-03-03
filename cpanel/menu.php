<header class="main-header-area">
                <div class="header-middle header-sticky py-66 py-lg-00" style="background-color: #060606;">
					<div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="header-middle-wrap position-relative">
        							<a href="<?php echo base_urls; ?>" class="header-logo">
        								<img src="<?php echo base_urls.base_logotipo; include('../includes/codificacion.php'); ?>" />
									</a>
									<div class="header-right">
                                        <ul>
											<li class="mobile-menu_wrap d-block d-lg-none">
                                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                    <i class="fa fa-reorder fa-2x" aria-hidden="true"></i>
                                                </a>
                                            </li>
<?php
	$query = "SELECT usuarios.id_usuario, usuarios.identificacion, usuarios.nombre_completo, usuarios.sexo, usuarios.telefono, usuarios.correo, usuarios.usuario, usuarios.foto_perfil, usuarios.acceso,
	roles.rol as rol
	FROM usuarios
	INNER JOIN roles ON usuarios.rol = roles.id_rol
	WHERE usuarios.id_usuario = $id_usuario";
	$resultado = $conexion->query($query);
	$fila = $resultado->fetch_assoc();
?>
											<li class="main-menu d-none d-lg-block">
												<div class="dropdown">
													<span class="d-flex align-items-center bb2">
														<img class="rounded-circle me-2" src="<?php echo ''.base_urls.'recursos/img/perfiles/'.$fila['foto_perfil'].$codificacion.''; ?>" width="50" height="50" />
														<p style="margin-bottom: 0rem;">
															<span style="text-transform: uppercase;">
																<?php echo $fila['usuario']; ?>
																
															</span>
															<br />
															<span style="color: #ffa519;">Rango:</span> <?php echo $fila['rol']; ?>
														
														</p>
													</span>
												</div>
											</li>
										</ul>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
                <div class="mobile-menu_wrapper" id="mobileMenu">
                    <div class="offcanvas-body" style="background-color: #060606;">
						<div class="offcanvas-top" style="background-color: #060606;">
                            <div style="text-align: right;">
								<a href="#" class="button-close aa2">
									<i class="pe-7s-close fa-3x"></i>
								</a>
							</div>
<?php include('../includes/global_menu.php'); ?>
						
						</div>
					</div>
				</div>
				<div class="global-overlay"></div>
			</header>