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

       
 <h3 class="titulo">INSUMOS</h3>
 <?php
       $form = new Zebra_Form('formcategoria');
	   $form->add('label', 'nombre_categoria', 'nombrecategoria', 'Nombre categoria:');
	      $obj = $form->add('text', 'nombrecategoria', '', array('placeholder' => 'Nombre de la Categoria'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array('','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,20,'error','El valor debe estar entre 3 y 20 caracteres'),
	 ));
       // "descripcion"
	$form->add('label', 'label_message', 'message', 'Descripcion:');
	     $obj = $form->add('textarea', 'message');
	       $obj->set_rule(array(
		   'length'    => array(0, 140, 'error', 'Maximum length is 140 characters!'),
	 ));
      $obj = $form->add('hidden', 'idcategoria', '');
      
      $obj = $form->add('hidden', 'idsseccion', '');
      
    // "submit"
     $form->add('submit', 'btnsubmit', 'Agregar');
    // if the form is valid
    if ($form->validate()) {
    // show result
    } 
        // generate output using a custom template
        $form->render('*horizontal');
?>
</body>
</html>