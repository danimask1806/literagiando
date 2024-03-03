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
$pdf->Cell(275, 10, utf8_decode(base_titulo_12), 1, 1, 'C', 1);
$pdf->Ln(1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(17, 8, utf8_decode('CÓDIGO'), 1, 0, 'C');
$pdf->Cell(45, 8, utf8_decode('TITULO DEL LIBRO'), 1, 0, 'C');
$pdf->Cell(34, 8, utf8_decode('AUTOR'), 1, 0, 'C');
$pdf->Cell(34, 8, utf8_decode('TEMAS'), 1, 0, 'C');
$pdf->Cell(30, 8, utf8_decode('EDADES'), 1, 0, 'C');
$pdf->Cell(30, 8, utf8_decode('COLOR'), 1, 0, 'C');
$pdf->Cell(22, 8, utf8_decode('FORMATO'), 1, 0, 'C');
$pdf->Cell(32, 8, utf8_decode('LINK'), 1, 0, 'C');
$pdf->Cell(31, 8, utf8_decode('DISPONIBILIDAD'), 1, 1, 'C');
$pdf->Ln(2);

// Table with 11 columns
$pdf->SetWidths(array(17, 45, 34, 34, 30, 30, 22, 32, 31));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C'));

$pdf->SetLineHeight(6);

$query = "SELECT libros.id_libro, libros.titulo, libros.autor, libros.tema, libros.descripcion, libros.condicion_libro, libros.edades, libros.color, libros.formato, libros.link, libros.portada, disponibles.disponible
FROM libros
LEFT JOIN disponibles ON libros.disponible = disponibles.id_disponible";
$resultado = mysqli_query($conexion, $query);

$pdf->SetFont('Arial', '', 10);
foreach ($resultado as $fila) {
	$pdf->Row(array(utf8_decode($fila['id_libro']),utf8_decode($fila['titulo']),utf8_decode($fila['autor']),utf8_decode($fila['tema']),utf8_decode($fila['edades']),utf8_decode($fila['color']),utf8_decode($fila['formato']),utf8_decode($fila['link']),utf8_decode($fila['disponible']),));
}
$pdf->Output(utf8_decode(base_titulo_12.base_titulo_1), "I");
exit();
?>