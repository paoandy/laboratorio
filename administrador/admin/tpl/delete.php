<?php
session_start();

require_once('../../lib/query.lib.php');
?>
<?php
	$id = $_GET['id'];
	$accion = $_GET['accion'];
	$consulta = new query;
	switch($accion){
		case 'medico':
			$consulta->dbDelete('MEDICO','WHERE IDMEDICO='.$id);
			header("Location:../lista.php?accion=medico&msj='Registro Eliminado'");
			break;
		case 'paciente':
			$consulta->dbDelete('PACIENTE','WHERE IDPACIENTE='.$id);
			header("Location:../lista.php?accion=paciente&msj='Registro Eliminado'");
			break;
		case 'proveedor':
			$consulta->dbDelete('PROVEEDOR','WHERE IDPROVEEDOR='.$id);
			header("Location:../lista.php?accion=proveedor&msj='Registro Eliminado'");
			break;
		case 'usuarios':
			$consulta->dbDelete('USUARIO','WHERE IDUSUARIO='.$id);
			header("Location:../lista.php?accion=usuarios&msj='Registro Eliminado'");
			break;
    }
    
?>
