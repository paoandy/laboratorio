<?php
require_once('lib/includeLibs.php');
require_once('class/index.class.php');

$class = new index;
 if(isset ($_GET['action'] ))
	$action = $_GET['action'];
else $action =""; 
switch($action) {
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
    case "administrador":
	header("Location:administrador.php");
	break;
     case "secretaria":
	header("Location:secretaria.php");
	break;
     case "tecnico":
	header("Location:tecnico.php");
	break;
    case "error":
	echo "<script>alert('Error al hacer login');</script>";
	//header("Location:index.php");
	break;
}
echo $class->Display();
?>