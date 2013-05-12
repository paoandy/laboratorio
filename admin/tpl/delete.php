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
    }
?>
