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

require_once('../lib/query.lib.php');
?>
<?php
	$id = $_GET['id'];
	 $query = new query;
	 $query2 = new query;
	 
	$resultado = $query->getRowsArray('orden.IDORDEN, paciente.NOMBRE,paciente.APELLIDO,paciente.SEXO,orden.FECHAPEDIDO,medico.NOMBRE AS MEDICO' ,'paciente,orden,medico','WHERE orden.IDPACIENTE= paciente.IDPACIENTE AND orden.IDMEDICO= medico.IDMEDICO AND orden.IDORDEN='.$id);
	$resultado2 = $query2->getRowsArray('NOMBRESECCION,NOMBRECATEGORIA,MAXIMO,MINIMO,UNIDAD,RESULTADO','seccion,categoria,resultado,rango','WHERE seccion.IDSECCION= categoria.IDSECCION AND resultado.IDCATEGORIA = categoria.IDCATEGORIA AND resultado.IDRANGO = rango.IDRANGO');
	
	//print_r($resultado2);
	
	$idorden;
	$nombre;
	$apellido;
	$medico;
	$fecha;
	$sexo;
	foreach ( $resultado as $fila ){
               $idorden = $fila['IDORDEN'];
	       $nombre = $fila ['NOMBRE'];
	       $apellido = $fila['APELLIDO'];
	       $medico = $fila['MEDICO'];
	       $fecha = $fila['FECHAPEDIDO'];
	       $sexo = $fila['SEXO'];
        }
	

echo "
<table border='1' style='width: 650px;'>
	<tr>
		<td>
		<div style='float: left;'>
			<img src='logo.png'/>
			<strong>LABORATORIO HEMOLAB </strong>
		</div>
		<div style='float: right; top: 0px;'>
			IDORDEN: ///".$idorden."////
		</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style='float: left;'>
				<br>
				<strong>NOMBRE PACIENTE:</strong>
				".$nombre." ".$apellido."
				<br>
			</div>
			<div style='float: right;'>
				<br>
				<strong>NOMBRE MEDICO:</strong>
				".$medico."
				<br>
			</div>
		</td>
	</tr>
	<tr>
		<td>
		<div style='float: left;'>
			<br>
			<strong>FECHA PEDIDO ORDEN </strong>
			".$fecha."
			<br>
		</div>
		<div style='float: right; top: 0px;'>
			<br>
			<strong>SEXO</strong>
			[".$sexo."]
			<br>
		</div>	
		</td>
	</tr>";

	$r;
	$seccion = '';
	$categoria;
	$maximo;
	$minimo;
	$unidad;
	echo "<tr><td><center><strong>RESULTADOS</strong></center><br>";
	foreach ( $resultado2 as $fila ){
		
		if ($seccion != $fila['NOMBRESECCION'])
		{
			echo "<br>--<br><strong>".$fila['NOMBRESECCION']."</strong><br>--<br>";
			$seccion = $fila['NOMBRESECCION'];
		}
		
		echo "<br>";
		echo $fila['NOMBRECATEGORIA']."<br>";
		
		echo "<center> <strong>[ ".$fila['RESULTADO']." ";
		echo "".$fila['UNIDAD']." ]</strong> - ";
		echo " ( ".$fila['MAXIMO']." a ";
		echo $fila['MINIMO']." ".$fila['UNIDAD'].") - </center>";
        }
	echo "</td></tr>";
echo "</table>";

?>