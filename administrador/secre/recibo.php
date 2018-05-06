<?php
session_start();

require_once('../lib/query.lib.php');
?>
<?php
	$id = $_GET['id'];
	 $query = new query;
	 
	$resultado = $query->getRowsArray('orden.IDORDEN, paciente.NOMBRE,paciente.APELLIDO,orden.FECHAENTREGA,orden.DESCRIPCIONORDEN,orden.TOTAL' ,'paciente,orden','WHERE orden.IDPACIENTE= paciente.IDPACIENTE AND orden.IDORDEN='.$id);

	$idorden;
	$nombre;
	$apellido;
	$fecha;
	$descripcion;
	$total;
	foreach ( $resultado as $fila ){
               $idorden = $fila['IDORDEN'];
	       $nombre = $fila ['NOMBRE'];
	       $apellido = $fila['APELLIDO'];
	       $fecha = $fila['FECHAENTREGA'];
	       $descripcion= $fila ['DESCRIPCIONORDEN'];
	       $total = $fila['TOTAL'];
        }
	

echo "
<table border='1' style='width: 650px;'>
	<tr>
		<td>
		<div style='float: left;'>
			<img src='logo.png'/>
			<strong>LABORATORIO HEMOLAB / RECIBO</strong>
		</div>
		<div style='float: right; top: 0px;'>
			IDORDEN: ///".$idorden."////
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div>
			<br>
			<strong>NOMBRE:</strong>
			".$nombre." ".$apellido."
			<br>
		</div>	
		</td>
	</tr>
	<tr>
		<td>
		<div style='float: left;'>
			<br>
			<strong>DESCRIPCION </strong>
			".$descripcion."
			<br>
		</div>
		<div style='float: right; top: 0px;'>
			<br>
			<strong>TOTAL</strong>
			".$total."Bs.
			<br>
		</div>	
		</td>
	</tr>
	<tr>
		<td>
		<div style='float: left;'>
			<br><BR>
			
			............................................<br/>
			PACIENTE
		</div>
		<div style='float: right; '>
			<br><BR>
			
			............................................<br/>
			SECRETARIA
		</div>	
		</td>
	</tr>
</table>";

?>