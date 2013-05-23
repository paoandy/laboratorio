<?php require_once('lib/includeLibs.php'); ?>
<?php

    if (!isset($_SESSION['tipousuario']))
        header("Location:../index.php");

    if ( $_SESSION['tipousuario']!=1 )
        header("Location:../index.php?msj='Usted No Tiene Privilegios Para Ver Este Sitio'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'lib/includeHead.php'?>
</head>
<body>
	<?php 
		if ( isset( $_GET['msj']) ) {
			echo "<script> $(document).ready(function() { Messenger().post({ message: ".$_GET['msj'].", type: 'error', showCloseButton: true }); }); </script>";
		}
	?>
    <div id="backgroundFix"></div>
    <div id="page">
        <header>
            <section>
                <center>
                    <span>
                        <img src="../images/logo.png"/>HEMOLAB
                    </span>
                </center>
                <nav>
                    <?php include 'tpl/menu.php';?>
                </nav>
            </section>
        </header>
        <section id="main">
            <section id="contenido">
                <section>
                    Bienvenido Secretaria, <br>Puede utilizar el sitio para registrar pacientes, medicos y orden de examenes.
                    <img src="../images/logo.png" style="position:absolute;top:30%;left:30%; width:40%; height:40%; opacity:0.5;"/>
                </section>
            </section>
            <section id="opciones">
                <?php include 'tpl/opciones.php';?>
            </section>
        </section>
        <footer>
            <?php include 'tpl/footer.php';?>
        </footer>
    </div>
</body>
</html>