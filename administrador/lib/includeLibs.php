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
/*
	$database="kudoside_laboratorio";
	$mysql_user = "kudoside_paola";
	$mysql_password = "pao.andy123"; 
	$mysql_host = "50.28.39.88";
	$mysql_table_prefix = "";
	
    $con = mysql_connect($mysql_host,$mysql_user,$mysql_password);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($database);
die();*/
mysql_connect($_cfg['host'],$_cfg['user'],$_cfg['pass']) or die(mysql_error());
mysql_select_db($_cfg['db']) or die(mysql_error());

require_once('email.lib.php');
require_once('login.lib.php');
require_once('paging.lib.php');
require_once('query.lib.php');
require_once('template.lib.php');
require_once('time.lib.php');
require_once('upload.lib.php');
require_once('navigation.lib.php');
?>