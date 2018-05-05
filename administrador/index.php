<?php
    require_once('lib/includeLibs.php');
	
	$error = false;
	
	if ( isset( $_GET['msj']) ) {
		$mensaje = $_GET['msj'];
		redireccionarUsuario('?msj='.$mensaje);
	}
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
				$error = true;
            	$mensaje = "Ocurrio Un Error al iniciar Sesion, Usted no tiene un tipo de usuario asignado.";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SLCHL</title>
    <link rel="stylesheet" href="style/estilo.css" type="text/css"/>
    <link rel="stylesheet" href="lib/zebra/public/css/zebra_form.css">
    
    <link rel="stylesheet" href="scripts/messenger/css/messenger.css">
    <link rel="stylesheet" href="scripts/messenger/css/messenger-theme-future.css">
    
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="lib/zebra/public/javascript/zebra_form.js"></script>
    <script src="scripts/messenger/js/messenger.min.js"></script>
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
	<?php 
	if ($error){
		echo "<script> $(document).ready(function() { Messenger().post({ message: '".$mensaje."', type: 'error', showCloseButton: true }); }); </script>";
	}
	?>
    <div id="backgroundFix"></div>
    <section class="login">
        <section>
            <span><img src="images/logo.png">HEMOLAB</span>
            <form name="sesion" action="index.php" method="post">
                <input type="text" name='login' placeholder='Nombre de Usuario'/>
                <input type='password' name='password' placeholder='Password'/>
                <input type='submit' value="Ingresar"/>
            </form>
        </section>
    </section>
</body>
</html>
