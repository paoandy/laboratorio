<?php
require_once('lib/includeLibs.php');
require_once('class/insumos.class.php');

$class = new insumos;
 if(isset ($_GET['action'] ))
	$accion = $_GET['action'];
else $accion =""; 
switch($accion) {
   case "nuevo" :
        echo $class->nuevo();
        exit(); /*solo ajax*/
    break;
	case "editar" :
        echo $class->editar();
        exit(); /*solo ajax*/
    break;
	case "eliminar" :
		echo $class->eliminar();
		 exit(); /*solo ajax*/
	break;
	case "guardarNuevo" :
		echo $class->guardarNuevo();
	break;	
	case "guardarEditar" :
		echo $class->guardarEditar();
	break;
	case "guardarNuevo" :
		echo $class->guardarNuevo();
	break;	
	case "logear" :
        echo $class->logear(); /*debe existir en el class */
    break;
	case "salir" :
        echo $class->salir();
    break;
}
echo $class->Display();
?>