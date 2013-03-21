<?php
require_once('lib/includeLibs.php');
require_once('class/tecnico.class.php');

$class = new tecnico;
 if(isset ($_GET['action'] ))
	$accion = $_GET['action'];
else $accion =""; 
switch($accion) {
    case "viewPopUp" :
        echo $class->viewPopUp();
        exit(); /*solo ajax*/
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
