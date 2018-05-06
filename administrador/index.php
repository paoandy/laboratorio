<?php
    require_once('lib/includeLibs.php');
    
    $error = false;
    print_r($_POST);
    print_r($_SESSION);

    if (!(isset($_POST['login']) && isset($_POST['password']))) {
        if (!isset($_SESSION['tipousuario'])) {
            header("Location:../index.php");
            $error = true;
        } else {
            redireccionarUsuario();
        }
    }

    if (!$error) {
        $error = false;
        
        //Preguntar Si Iniciamos Session
        if(isset($_POST['login']) && isset($_POST['password'])){
            $sesion = new login;
            $id = $sesion->validate($_POST['login'],$_POST['password']);

            if ($id){
                $sesion->loginUser($id);

                redireccionarUsuario();
            }else{
                $error = true;
                $mensaje = 'Error Al Iniciar Sesion,<br><br> No Existe Su Usuario.';
            }
        }
    }

	function redireccionarUsuario($parametros=''){
		$tipo = $_SESSION['tipousuario'];

        switch($tipo){
             case 0:
			 	header("Location:admin/index.php".$parametros);
                break;
			case 1:
                header("Location:secre/index.php".$parametros);
                break;
			case 2:
                header("Location:tecnico/index.php".$parametros);
                break;
			default:
                header("Location:../index.php");
		}
	}
?>
