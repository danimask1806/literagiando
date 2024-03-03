<?php
// Sesión
require_once('../includes/session_staff.php');

// Include
require_once('../includes/includes.php');

// FPDF / PDF_MC_Table
require('../recursos/libraries/fpdf/pdf_mc_table.php');

class PDF extends FPDF {
	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		// Número de página
		$this->Cell(0,10,utf8_decode('Pagína ').$this->PageNo().'',0,0,'C');
	}
}

$pdf = new PDF_MC_Table('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$pdf->SetFont('Arial', '', 14);
$pdf->SetTitle("");

$pdf->SetFont('Arial', 'B', 25);
$pdf->Cell(270, 10, utf8_decode(base_titulo_3), 0, 1, 'C');
$pdf->Image(base_url.base_logotipo_2, 15, 25);
$pdf->Ln(14);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(210, 7, utf8_decode('CORREO ELECTRÓNICO:'), 0, 0, 'R');		
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, 7, utf8_decode( base_correo), 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(210, 7, utf8_decode('DIRECCIÓN / CONTACTO:'), 0, 0, 'R');		
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, 7, utf8_decode( base_direccion), 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(210, 7, utf8_decode('TELÉFONO / CONTACTO:'), 0, 0, 'R');		
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, 7, utf8_decode( base_telefono), 0, 0, 'L');
$pdf->Ln(17);

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetFillColor(251, 117, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(275, 10, utf8_decode(base_titulo_17), 1, 1, 'C', 1);
$pdf->Ln(1);

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(17, 8, utf8_decode('CÓDIGO'), 1, 0, 'C');
$pdf->Cell(35, 8, utf8_decode('USUARIO'), 1, 0, 'C');
$pdf->Cell(36, 8, utf8_decode('TITULO 1'), 1, 0, 'C');
$pdf->Cell(36, 8, utf8_decode('TITULO 2'), 1, 0, 'C');
$pdf->Cell(36, 8, utf8_decode('TITULO 3'), 1, 0, 'C');
$pdf->Cell(33, 8, utf8_decode('FECHA PRESTAMO'), 1, 0, 'C');
$pdf->Cell(36, 8, utf8_decode('FECHA DEVOLUCION'), 1, 0, 'C');
$pdf->Cell(20, 8, utf8_decode('ESTADO'), 1, 0, 'C');
$pdf->Cell(26, 8, utf8_decode('PERMISO'), 1, 1, 'C');
$pdf->Ln(2);

// Table with 11 columns
$pdf->SetWidths(array(17, 35, 36, 36, 36, 33, 36, 20, 26));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));

$pdf->SetLineHeight(6);

$query = "SELECT prestamos.id_prestamo, prestamos.fecha_prestamo, prestamos.fecha_devolucion,
usuarios.id_usuario, usuarios.usuario, usuarios.nombre_completo, usuarios.foto_perfil, usuarios_identificacion.identificacion AS identificacion, usuarios_correo.correo AS correo,
libros_1.titulo AS libro_1, libros_2.titulo AS libro_2, libros_3.titulo AS libro_3,
permisos.permiso, estados.estado
FROM prestamos
LEFT JOIN usuarios ON prestamos.id_usuario = usuarios.id_usuario
LEFT JOIN usuarios AS usuarios_identificacion ON prestamos.id_usuario = usuarios_identificacion.id_usuario
LEFT JOIN usuarios AS usuarios_correo ON prestamos.id_usuario = usuarios_correo.id_usuario
LEFT JOIN libros AS libros_1 ON prestamos.id_libro_1 = libros_1.id_libro
LEFT JOIN libros AS libros_2 ON prestamos.id_libro_2 = libros_2.id_libro
LEFT JOIN libros AS libros_3 ON prestamos.id_libro_3 = libros_3.id_libro
LEFT JOIN estados ON prestamos.estado = estados.id_estado
LEFT JOIN permisos ON prestamos.permiso = permisos.id_permiso";
$resultado = mysqli_query($conexion, $query);

$pdf->SetFont('Arial', '', 10);
foreach ($resultado as $fila) {
	$pdf->Row(array(utf8_decode($fila['id_prestamo']),utf8_decode($fila['usuario']),utf8_decode($fila['libro_1']),utf8_decode($fila['libro_2']),utf8_decode($fila['libro_3']),utf8_decode($fila['fecha_prestamo']),utf8_decode($fila['fecha_devolucion']),utf8_decode($fila['estado']),utf8_decode($fila['permiso']),));
}
$pdf->Output(utf8_decode(base_titulo_17.base_titulo_1), "I");
exit();
?>