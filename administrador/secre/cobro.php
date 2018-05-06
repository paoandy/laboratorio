<?php require_once('../lib/autoload.php'); ?>
<?php

    if (!isset($_SESSION['tipousuario']))
        header("Location:../index.php");

    if ( $_SESSION['tipousuario']!=1 )
        header("Location:../index.php?msj='Usted No Tiene Privilegios Para Ver Este Sitio'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include '../lib/includeHead.php'?>
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
                    <?php include 'frm/formulario_cobro.php';?>
                </section>
            </section>
            <section id="opciones">
                <nav>
                    <ul>
                        <li><a href="../logout.php">Desconectarse</a></li>
                        <li><a href="#">Registrar</a>
                        <ul>
                        <li><a href="paciente.php">Paciente </a></li>
                        <li><a href="">Entrega Resultados</a></li>
                        </ul>
                        <li><a href="#">Ver Reservas</a></li> 
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
