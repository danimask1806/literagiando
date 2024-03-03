<?php
	ob_start();
	
	// Https
	require_once('includes/https.php');
	
	// Sesión
	require_once('includes/session.php');
	
	// Include
	require_once('includes/includes.php');
?>
<!DOCTYPE html>
<html lang="es">
	<!-- .Head -->
	<head>
		<!-- .UTF-8 -->
		<?php echo base_utf8_php; ?>

		<?php echo base_utf8_2_php; ?>
		
		<!-- .Titulo -->
		<title>Iniciar sesión - <?php echo base_titulo_2; ?></title>

		<!-- .CSS -->
		<?php include('css.php'); ?>

		<!-- .Indexación -->
		<?php echo base_con_indexacion; ?>
		
		<!-- .Meta -->
		<?php include('meta.php'); ?>
		
	</head>
	<!-- .Body -->
	<body>
        <div class="main-wrapper">
			<!-- .Menú -->
			<?php include('menu.php'); ?>

			<!-- Begin Main Content Area -->
			<main class="main-content">
				<div class="breadcrumb-area breadcrumb-height" data-bg-image="<?php echo base_urls; ?>recursos/img/bg/1-1-1920x400.jpg<?php include('includes/codificacion.php'); ?>">
					<div class="container h-100">
						<div class="row h-100">
							<div class="col-lg-12">
								<div class="breadcrumb-item">
									<h2 class="breadcrumb-headingg text-color-sobre-imagen pt-3" style="text-shadow: 1px 1px 1px #060606;">Centro de identificación</h2>
									<div id="login"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- ---------------------------------------------------------------- -->
				<div class="login-register-area section-space-y-axis-150">
					<div class="container">
						<div class="row">
							<div class="col-lg-7" style="margin: 0 auto;">
								<form method="post" action="login.php#login">
									<div class="login-form">
										<h2 class="login-title-1">
											<center>
												Identificador de usuarios registrados.
											</center>
										</h2>
										<div class="row">
											<div><hr /></div>
											<div class="col-lg-12 pt-2">
												<label> 
													<i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Nombre de usuario
												</label>
												<input
													class="form-control"
													type="text"
													name="usuario"
													value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>"
													autocomplete="off"
													placeholder="Ingrese un usuario"
													title=""
													minlength="4"
													maxlength="50"
													pattern="<?php echo base_input_usuario; ?>"
													onkeypress="<?php echo base_input_letras_numeros; ?>"
													required
												/>
											</div>
											<div><hr /></div>
											<div class="col-lg-12">
												<label>
													<i class="fa fa-key fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Contraseña de usuario
												</label>
												<input
													class="form-control"
													type="password"
													name="password"
													autocomplete="off"
													placeholder="Ingrese una contraseña"
													title=""
													minlength="4"
													maxlength="100"
													pattern="<?php echo base_input_password; ?>"
													onkeypress=""
													required
												/>
											</div>
											<div><hr /></div>
											<center>
												<div class="row pt-3">
													<div class="col-md-6 mb-3">
														<button class="btn btn-custom-size lg-size btn-primary" type="submit" name="acceder" style="color: white; text-shadow: 1px 1px 2px #060606;">
															Entrar
														</button>
													</div>
													<div class="col-md-6">
														<a class="btn btn-custom-size lg-size btn-primary" href="register.php" style="color: white; text-shadow: 1px 1px 2px #060606;">
															Crear cuenta
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
			</main>
			<!-- Main Content Area End Here -->
		</div>
<?php
	// Antes de comprobar si el formulario se ha enviado y procesar los datos, verificamos la conexión con la base de datos.
	require_once('includes/conexion.php');
	// Comprobamos si el formulario se ha enviado.
	if (isset($_POST["acceder"])) {
		// Recibimos y obtenemos los datos del formulario.
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];
		
		// Buscar el usuario en la base de datos
		$query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND acceso=1";
		$resultado = $conexion->query($query);
		
		if ($resultado->num_rows > 0) {
			$fila = $resultado->fetch_assoc();
			$hashed_password = $fila["password"];
			
			// Verificar la contraseña con bcrypt
			if (password_verify($password, $hashed_password)) {
				session_start();
				$_SESSION["id_usuario"] = $fila["id_usuario"];
				header("Location: cpanel/home.php");
				exit;
			} else {
	// Contraseña incorrecta
	echo '
		<script>
			Swal.fire({
				title: "ERROR AL INICIAR SESIÓN!",
				icon: "error",
				html: "Parece haber un error con la contraseña ingresada, verifique sus datos de acceso e inténtelo de nuevo.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#d51a1a",
				confirmButtonText: "OK"
			});
		</script>';
	echo '
		<!-- .Final-->';
		include("final.php");
		
	echo '
		<!-- .Script -->';
		include("script.php");
		
	echo '
	</body>
</html>';
				session_destroy();
				ob_end_flush();
				exit;
			}
		} else {
	// Usuario no encontrado o inactivo
	echo '
        <script>
            Swal.fire({
                title: "ERROR AL INICIAR SESIÓN!",
                icon: "error",
                html: "Parece haber un error con los datos ingresados, verifique sus datos de acceso e inténtelo de nuevo.",
                allowOutsideClick: false,
                showCloseButton: false,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonColor: "#d51a1a",
                confirmButtonText: "OK"
            });
        </script>';
	echo '
		<!-- .Final-->';
		include("final.php");
		
	echo '
		<!-- .Script -->';
		include("script.php");
		
	echo '
	</body>
</html>';
			session_destroy();
			ob_end_flush();
			exit;
		}
	}
	
	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
?>
		
		<!-- .Final-->
		<?php include('final.php'); ?>

		<!-- .Script -->
		<?php include('script.php'); ?>
	
	</body>
</html>
<?php 
	ob_end_flush();
	exit;
?>