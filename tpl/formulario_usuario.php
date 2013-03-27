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

       
 <h3 class="titulo">USUARIO</h3>
 <?php
       $form = new Zebra_Form('formusuario');
	   $form->add('label', 'nombre_usuario', 'nombreusuario', 'Nombre usuario:');
	      $obj = $form->add('text', 'nombreusuario', '', array('placeholder' => 'Nombre del Usuario'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array('','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,100,'error','El valor debe estar entre 3 y 100 caracteres'),
	 ));
    //	CI del Usuario
       $form->add('label', 'ci_usuario', 'ciusuario', 'CI usuario:');
	     $obj = $form->add('text', 'ciusuario', '', array('placeholder' => 'Carnet de Identidad'));
	     // set rules
	      $obj->set_rule(array(
		   'digits' => array('1,8','error','Por Favor Solamente digitos'),
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(1,8,'error','El valor debe estar entre 1 y 8 digitos'),
	 ));
     //telefono del usuario      
       $form->add('label', 'telefono_usuario', 'telefonousuario', 'Telefono Usuario:');
	     $obj = $form->add('text', 'telefonousuario', '', array('placeholder' => 'Telefono del Usuario'));
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(1,8,'error','El valor debe estar entre 1 y 8digitos'),
	 ));
     //	Login Usuario      
       $form->add('label', 'login_usuario', 'login', 'Login Usuario:');
	     $obj = $form->add('text', 'login', '', array('placeholder' => 'Login Usuario'));
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(1,5,'error','El valor debe estar entre 1 y 5 digitos'),
	 ));
     //	password Usuario     
       $form->add('label', 'label_password', 'password', 'Password');
	     $obj = $form->add('password', 'password', '', array('autocomplete' => 'off'));
	       $obj->set_rule(array(
		   'required'  => array('error', 'Password is requiredo!'),
		   'length'    => array(6, 10, 'error', 'The password must have between 6 and 10 characters!'),
    ));
      // tipo Usuario    
       $form->add('label', 'tipo_usuario', 'tipousuario', 'Tipo Usuario:');
	     $obj = $form->add('text', 'tipousuario', '', array('placeholder' => 'Tipo Usuario'));
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
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