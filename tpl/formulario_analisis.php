<?php include '../lib/zebra/Zebra_Form.php'; ?>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SLCHL</title>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="../lib/zebra/public/css/zebra_form.css">
<script src="../lib/zebra/public/javascript/zebra_form.js"></script>
</head>
<body>
       
 <h3 class="titulo">Analisis</h3>
 
 <?php
       // instantiate a Zebra_Form object
       $form = new Zebra_Form('formSeccion');
       
       $obj = $form->add('text', 'nombreseccion', '', array('placeholder' => 'Seccion de Analisis'));
       
       // set rules
       $obj->set_rule(array(
	      'alphabet' => array('','error','Por Favor Solamente Letras'),
	      'required'  =>  array('error', 'Este Campo Es Requerido!'),
	      'length'     =>  array(3,60,'error','El valor debe estar entre 3 y 60 caracteres'),
       
       ));
       
       $obj = $form->add('hidden', 'idsseccion', '');
       
       // "submit"
       $form->add('submit', 'btnsubmit', 'Agregar');
       
       // validate the form
       if ($form->validate()) {
	   // do stuff here
	      echo "Formulario Agregado";
       }
       
       // auto generate output, labels above form elements
       $form->render();

?>
</body>
</html>