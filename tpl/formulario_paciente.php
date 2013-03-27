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
       
 <h3 class="titulo">Paciente</h3>
 <?php
       $form = new Zebra_Form('formPaciente');
	   $form->add('label', 'nombre_paciente', 'nombrepaciente', 'Nombre Paciente:');
	      $obj = $form->add('text', 'nombrepaciente', '', array('placeholder' => 'Nombre del Paciente'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array('','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,100,'error','El valor debe estar entre 3 y 60 caracteres'),
	 ));
    //	edad del paciente
       $form->add('label', 'edad_paciente', 'edadpaciente', 'Edad Paciente:');
	     $obj = $form->add('text', 'edadpaciente', '', array('placeholder' => 'Edad del Paciente'));
	     // set rules
	      $obj->set_rule(array(
		   'digits' => array('1,3,','error','Por Favor Solamente digitos'),
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(1,3,'error','El valor debe estar entre 1 y 3 digitos'),
	 ));
     //	sexo del paciente      
       $form->add('label', 'sexo_paciente', 'sexopaciente', 'Sexo Paciente:');
	     $obj = $form->add('text', 'sexopaciente', '', array('placeholder' => 'Sexo del Paciente'));
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(1,3,'error','El valor debe estar entre 1 y 3 digitos'),
	 ));
      //telefono del paciente      
       $form->add('label', 'telefono_paciente', 'telefonopaciente', 'telefono Paciente:');
	     $obj = $form->add('text', 'telefonopaciente', '', array('placeholder' => 'Telefono del Paciente'));
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(1,8,'error','El valor debe estar entre 1 y 8digitos'),
	 ));
      // "descripcion"
	$form->add('label', 'label_message', 'message', 'Descripcion:');
	     $obj = $form->add('textarea', 'message');
	       $obj->set_rule(array(
		   'required'  => array('error', 'este campo es requerido!'),
		   'length'    => array(0, 140, 'error', 'Maximum length is 140 characters!'),
	 ));
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