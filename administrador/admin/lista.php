<?php require_once('lib/includeLibs.php'); ?>
<?php

    if (!isset($_SESSION['tipousuario']))
        header("Location:../index.php");

    if ( $_SESSION['tipousuario'] != 0 )
        header("Location:../index.php?msj='Usted No Tiene Privilegios Para Ver Este Sitio'");

    if ( !isset($_GET['accion']) )
        header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'lib/includeHead.php'?>
</head>
<body>
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
					<?php 
                        if ( isset( $_GET['msj']) ) {
                            echo "<script> $(document).ready(function() { Messenger().post({ message: ".$_GET['msj'].", type: 'error', showCloseButton: true }); }); </script>";
                        }
                    ?>
                    <?php
                        $accion = $_GET['accion'];
                        include 'tpl/tabla.php';
                    ?>
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
