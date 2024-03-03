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
$pdf->Cell(275, 10, utf8_decode(base_titulo_7), 1, 1, 'C', 1);
$pdf->Ln(1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(17, 8, utf8_decode('CÓDIGO'), 1, 0, 'C');
$pdf->Cell(16, 8, utf8_decode('RANGO'), 1, 0, 'C');
$pdf->Cell(31, 8, utf8_decode('IDENTIFICACIÓN'), 1, 0, 'C');
$pdf->Cell(56, 8, utf8_decode('NOMBRE COMPLETO'), 1, 0, 'C');
$pdf->Cell(20, 8, utf8_decode('SEXO'), 1, 0, 'C');
$pdf->Cell(22, 8, utf8_decode('TELÉFONO'), 1, 0, 'C');
$pdf->Cell(60, 8, utf8_decode('CORREO ELECTRÓNICO'), 1, 0, 'C');
$pdf->Cell(35, 8, utf8_decode('USUARIO'), 1, 0, 'C');
$pdf->Cell(18, 8, utf8_decode('ACCESO'), 1, 1, 'C');
$pdf->Ln(2);

// Table with 11 columns
$pdf->SetWidths(array(17, 16, 31, 56, 20, 22, 60, 35, 18));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));
$pdf->SetLineHeight(array(5, 2, 2, 2, 2, 2, 2, 2, 2));


$pdf->SetLineHeight(8);

$query = "SELECT usuarios.id_usuario, usuarios.identificacion, usuarios.nombre_completo, usuarios.sexo, usuarios.telefono, usuarios.correo, usuarios.usuario, accesos.acceso, roles.rol
FROM usuarios
LEFT JOIN accesos ON usuarios.acceso = accesos.id_acceso
LEFT JOIN roles ON usuarios.rol = roles.id_rol WHERE usuarios.id_usuario NOT IN (1)";
$resultado = mysqli_query($conexion, $query);

$pdf->SetFont('Arial', '', 10);
foreach ($resultado as $fila) {
	$pdf->Row(array(utf8_decode($fila['id_usuario']),utf8_decode($fila['rol']),utf8_decode($fila['identificacion']),utf8_decode($fila['nombre_completo']),utf8_decode($fila['sexo']),utf8_decode($fila['telefono']),utf8_decode($fila['correo']),utf8_decode($fila['usuario']),utf8_decode($fila['acceso']),));
}
$pdf->Output(utf8_decode(base_titulo_7.base_titulo_1), "I");
exit();
?>