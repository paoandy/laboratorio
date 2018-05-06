<?php
session_start();

require('../../lib/fpdf/fpdf.php');
require('../../lib/query.lib.php');

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	// Logo
	$this->Image('logo.png',10,8,20);
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(80);
	// T�tulo
	$this->Cell(60,20,'Analisis Disponibles En Laboratorio - '.date('d/m/y h:i:s'),0,0,'C');
	// Salto de l�nea
	$this->Ln(20);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

//Consulta BD

$query = new query;
$resultado = $query->getRows('*','seccion, categoria', 'WHERE seccion.idseccion = categoria.idseccion ORDER BY seccion.nombreseccion, categoria.nombrecategoria');

$seccion = "";
while($temp = mysqli_fetch_assoc($resultado)){
    $siguienteSeccion = $temp['NOMBRESECCION'];
    if ( $siguienteSeccion != $seccion ){
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10,10,$siguienteSeccion,0,1);
        $seccion = $siguienteSeccion;
    }
    $pdf->SetFont('Times','',12);
    $pdf->Cell(10,10," + ".$temp['NOMBRECATEGORIA'].".- ".$temp['DESCRIPCIONCATEGORIA'],0,1);
}

//for($i=1;$i<=40;$i++)
//	$pdf->Cell(20,10,'Imprimiendo l�nea n�mero '.$i,0,1);



$pdf->Output();
?>
