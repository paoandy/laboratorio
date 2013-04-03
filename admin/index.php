<?php require_once('lib/includeLibs.php'); ?>
<?php

    if (!isset($_SESSION['tipousuario']))
        header("Location:../index.php");

    if ( $_SESSION['tipousuario']!=0 )
        header("Location:../index.php?msj='Usted No Tiene Privilegios Para Ver Este Sitio'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'lib/includeHead.php'?>
</head>
<body>
    <div id="page">
        <header>
            <section>
                <span><img src="../images/laboratorio.png"/>HEMOLAB</span>
            </section>
            <nav>
                [menu]
            </nav>
        </header>
        <section id="main">
            <section id="contenido">
                <section>
                    <?php include 'frm/formulario_analisis.php';?>
                </section>
            </section>
            <section id="opciones">
                <nav>
                    <ul>
                        <li><a href="../logout.php">Desconectarse</a></li>
                    </ul>
                </nav>
            </section>
        </section>
        <footer>
            Laboratorio de Analisis Clinico HEMOLAB
            
        </footer>
    </div>
</body>
</html>