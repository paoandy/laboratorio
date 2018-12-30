<?php require_once('../lib/autoload.php'); ?>
<?php

    if (!isset($_SESSION['tipousuario']))
        header("Location:../index.php");

    if ( $_SESSION['tipousuario'] != 1 )
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
    <?php 
      // Solo para index
      if ( isset( $_GET['msj']) ) {
        echo "<script> $(document).ready(function() { Messenger().post({ message: ".$_GET['msj'].", type: 'error', showCloseButton: true }); }); </script>";
      }
    ?>
    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <?php include 'tpl/header.php';?>
      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="container">
          <div class="row">
          <?php 
            if ( isset( $_GET['msj']) ) {
              echo "<script> $(document).ready(function() { Messenger().post({ message: ".$_GET['msj'].", type: 'error', showCloseButton: true }); }); </script>";
            }
          ?>
          <?php
            $accion = $_GET['accion'];
            include 'tpl/tabla.php';
          ?>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="copyright">
                <?php include 'tpl/footer.php';?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
    </div>
  </div>

  <?php include '../lib/includeFooter.php'?>
</body>
</html>
