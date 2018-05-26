<?php require_once('../lib/autoload.php'); ?>
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
    <?php include '../lib/includeHead.php'?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php include 'tpl/menu.php';?>

        <div class="page-container">
            <?php include 'tpl/header.php';?>
            <div class="main-content">
                <div class="container">
                    <?php
                        $accion = $_GET['accion'];
                        include 'tpl/tabla.php';
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <?php include 'tpl/footer.php';?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../lib/includeFooter.php'?>
</body>
</html>
