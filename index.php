<?php
    require_once('lib/includeLibs.php');

    //Preguntar Si Iniciamos Session

    if(isset($_POST['login']) && isset($_POST['password'])){
        $sesion = new login;
        $id = $sesion->validate($_POST['login'],$_POST['password']);

        if ($id){
            $sesion->loginUser($id);

            $tipo = $_SESSION['tipousuario'];

            switch($tipo){
                case 0:
                    header("Location:admin/");
                    break;
		 case 1:
                    header("Location:secre/");
                    break;
		case 2:
                    header("Location:tecnico/");
                    break;
                default:
                    echo "<span class='error'>Ocurrio Un Error al iniciar Sesion, Usted no tiene un tipo de usuario asignado</span>";
            }
        }else{
            echo "<span class='error'>Error Al Iniciar Sesion, No Existe Su Usuario</span>";
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
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="lib/zebra/public/javascript/zebra_form.js"></script>
    <script type="text/javascript" src="scripts/ajax.js"></script>
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
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
