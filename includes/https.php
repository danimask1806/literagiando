<?php
	// Utilice HTTP strict transport security para obligar al cliente a utilizar únicamente conexiones seguras
	$use_sts = true;
	
	// Establezca HTTPS en 'desactivado' para solicitudes que no sean SSL
	if ($use_sts && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
		header('Strict-Transport-Security: max-age=31536000');
	} elseif ($use_sts) {
		header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], true, 301);
		die();
	}
?>