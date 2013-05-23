<?php
session_start();

if(isset($_SERVER['HTTPS']))
	$protocol = 'https';
else
	$protocol = 'http';
switch($_SERVER['HTTP_HOST'])
{
	case 'localhost':
		$_cfg['host'] = '127.0.0.1';
		$_cfg['user'] = 'root';
		$_cfg['pass'] = '';
		$_cfg['db'] = 'laboratorio';
		break;
	default:
		ini_set("session.cache_expire","180");
		ini_set("session.gc_maxlifetime","3600");
		$_cfg['host'] = '10.0.0.9';
		$_cfg['user'] = 'root';
		$_cfg['pass'] = '';
		$_cfg['db'] = 'laboratorio';
		break;
}

mysql_connect($_cfg['host'],$_cfg['user'],$_cfg['pass']) or die(mysql_error());
mysql_select_db($_cfg['db']) or die(mysql_error());

require('../../lib/fpdf/fpdf.php');
require('../../lib/query.lib.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
	$this->Image('logo.png',10,8,20);
	// Arial bold 15
	$this->SetFont('Arial','B',12);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Cell(60,20,'Analisis Disponibles En Laboratorio - '.date('d/m/y h:i:s'),0,0,'C');
	// Salto de línea
	$this->Ln(20);
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

//Consulta BD

$query = new query;
$resultado = $query->getRows('*','seccion, categoria', 'WHERE seccion.idseccion = categoria.idseccion ORDER BY seccion.nombreseccion, categoria.nombrecategoria');

$seccion = "";
while($temp = mysql_fetch_assoc($resultado)){
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
//	$pdf->Cell(20,10,'Imprimiendo línea número '.$i,0,1);



$pdf->Output();
?>
