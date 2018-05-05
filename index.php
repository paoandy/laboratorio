<?php require_once('administrador/lib/includeLibs.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>SLCHL</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style/estilo.css" type="text/css"/>
    
    <link rel="stylesheet" href="scripts/messenger/css/messenger.css">
    <link rel="stylesheet" href="scripts/messenger/css/messenger-theme-future.css">
    
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="scripts/messenger/js/messenger.min.js"></script>
    
    <script type="text/javascript" src="scripts/select2/select2.min.js"></script>
    <script type="text/javascript" src="scripts/select2/select2_locale_es.js"></script>
    <link rel="stylesheet" href="scripts/select2/select2.css"/>
    
    
    <link rel="shortcut icon" href="administador/favicon.ico" />
</head>
<body>
    <div id="backgroundFix"></div>
    <section class="login" id="pedido">
        <section>
            <span><img src="administrador/images/logo.png"><br>HEMOLAB</span>
            <span><br>Hacer Pedido</span>
        </section>
    </section>
    
    <section id="contenido" style="display:none;">
    	<section>
			<?php include('formulario_registrar_orden.php'); ?>
		</section>
	</section>
    
    <script>
		$(document).ready(function(e) {
            $('#pedido').click( function () {
				$(this).fadeOut();
				$('#contenido').slideDown(1000);
			});
        });
	</script>
</body>
</html>
