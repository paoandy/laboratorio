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
		$_cfg['host'] = '50.28.39.88';
		$_cfg['user'] = 'kudoside_paola';
		$_cfg['pass'] = 'pao.andy123';
		$_cfg['db'] = 'kudoside_laboratorio';
		break;
}

mysql_connect($_cfg['host'],$_cfg['user'],$_cfg['pass']) or die(mysql_error());
mysql_select_db($_cfg['db']) or die(mysql_error());

require_once('../lib/login.lib.php');
require_once('../lib/paging.lib.php');
require_once('../lib/query.lib.php');
include('../lib/zebra/Zebra_Form.php');
?>