<?php
    
	//vars
	$subject = "Pedido de Orden de Laboratorio";
	$to = 'diegolanda@msn.com';
	
	
	
	//data
	$msg = "Saludos,\n\nAcabamos de recibir un pedido a nombre del Doctor: ".$_POST['NOMBREMEDICO']." (".$_POST['EMAILMEDICO'].").\nEl detalle a continuacion:\n";
	$msg .= "\n\n\n ******** Detalle de Orden ********\n\n";
	$msg .= " - Paciente: ".$_POST['NOMBREPACIENTE']."\n - Telefono: ".$_POST['TELEFONOPACIENTE']."\n\n";
	$msg .= " - Medico: ".$_POST['NOMBREMEDICO']."\n - Telefono: ".$_POST['TELEFONOMEDICO']."\n";
	
	$titulo = "!@#"; // Contenido BASURA
	$secciones = $_POST['SECCION'];
	$nombres = $_POST['NOMBRE'];
	$costos = $_POST['COSTO'];
	for($i=0; $i < count($secciones); $i++){
		if ( $titulo != $secciones[$i] ) {
			$msg .= "\n\n* ".$secciones[$i];
			$titulo = $secciones[$i];	
		}
		$msg .= "\n++ ".$nombres[$i]." : ".$costos[$i]."Bs.";
	}
	$msg .= "\n\n\n***********************************\n";
	$msg .= "***********************************\n\n";
	
	$msg .= "\n\nEl laboratorio se pondra en contacto con el paciente para confirmar el pedido y la fecha de recepcion.";
	$msg .= "\nLo saludamos y agradacemos su confianza en nuestro laboratorio.\n\n";
	$msg .= "Saludos Cordiales.\n\n\n";
	
	$msg .= "\n\n***ACUERDO DE CONFIDENCIALIDAD: Este mensaje cuenta con informacion privada o confidencial y esta destinado unicamente al recipiente del mensaje";
	$msg .= "\nSi usted recibio este mensaje por equivocacion, por favor elimine inmediamente este mensaje y comunique con nosotros este mensaje.";
	//$msg .= "Nombre de Usuario: "  .$_POST['EMNOMBREUSUARIO']    ."<br>\n";
	//$msg .= "Email: "  .$_POST['EMEMAIL']    ."<br>\n";
	//$msg .= "Servicio: "  .$_POST['ID_CATEGORIAS']    ."<br>\n";
	//$msg .= "Registro: "  . "Registro de Negocio"   ."<br>\n";
	//$msg .= "ID de Registro: 1) Gratuito, 2) Mi PyME <br>\n";
	
	
	
	//send for each mail

   	//$m = mail($mail, $subject, $msg, $headers);
	$m = mail($to, $subject, $msg);
	mail("paolaandreahe@gmail.com", $subject, $msg);
	//$m = mail("diegolanda@msn.com", "Subject", "Email Content");
	
	if ($m)
		echo "EMAIL ENVIADO Post: ".unserialize(stripslashes($_POST['SECCION']))." Original:".$_POST['SECCION'];

?>
