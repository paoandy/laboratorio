<?php
   $query = new query;
	 $form = new Zebra_Form('formPaciente');
	     $form->add('label', 'nombre_paciente', 'nombre', 'Nombre:');
		$obj = $form->add('text', 'nombre', '', array('placeholder' => 'Nombre del Paciente'));
	       // set rules
		  $obj->set_rule(array(
		      'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		      'required' => array('error', 'este campo es requerido!'),
		      'length'     =>  array(3,20,'error','El valor debe estar entre 3 y 20 caracteres'),
	   ));
	     $form->add('label', 'apellido_paciente', 'apellido', 'Apellido:');
		$obj = $form->add('text', 'apellido', '', array('placeholder' => 'Apellido del Paciente'));
	       // set rules
		  $obj->set_rule(array(
		      'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		      'required' => array('error', 'este campo es requerido!'),
		      'length'     =>  array(3,15,'error','El valor debe estar entre 3 y 15 caracteres'),
	   ));
      //	edad del paciente
	 $form->add('label', 'edad_paciente', 'edad', 'Edad:');
	       $obj = $form->add('text', 'edad', '', array('placeholder' => 'Edad del Paciente'));
	       // set rules
		$obj->set_rule(array(
		     'digits' => array('1,3,','error','Por Favor Solamente digitos'),
		     'required' => array('error', 'este campo es requerido!'),
		     'length'     =>  array(1,3,'error','El valor debe estar entre 1 y 3 digitos'),
	   ));
       //	sexo del paciente      
	 $form->add('label', 'sexo_paciente', 'sexo', 'Sexo:');
	       $obj = $form->add('select', 'sexo', '');
		   $obj->add_options( array('F'=>'Femenino', 'M'=>'Masculino') );
	       // set rules
		$obj->set_rule(array(
		     'required' => array('error', 'este campo es requerido!'),
		     'length'     =>  array(1,3,'error','El valor debe estar entre 1 y 3 digitos'),
	   ));
	//telefono del paciente      
	 $form->add('label', 'telefono_paciente', 'telefono', 'telefono:');
	       $obj = $form->add('text', 'telefono', '', array('placeholder' => 'Telefono del Paciente'));
	       // set rules
		$obj->set_rule(array(
		     'required' => array('error', 'este campo es requerido!'),
		     'length'     =>  array(1,8,'error','El valor debe estar entre 1 y 8digitos'),
	   ));
	// "descripcion"
	  $form->add('label', 'label_message', 'descripcion', 'Descripcion:');
	       $obj = $form->add('textarea', 'descripcion');
		 $obj->set_rule(array(
		     'length'    => array(0, 140, 'error', 'Maximum length is 140 characters!'),
	   ));
		 
	  $obj = $form->add('hidden', 'idpaciente', $query->siguiente('idpaciente','paciente') );
	  // "submit"
	   $form->add('submit', 'btnsubmit', 'Agregar');
	  // if the form is valid
	  if ($form->validate()) {
	  // show result
	       $idpaciente = $_POST['idpaciente'];
           $nombre = $_POST['nombre'];
	   $apellido = $_POST['apellido'];
           $edad = $_POST['edad'];
	       $sexo = $_POST['sexo'];
	       $telefono = $_POST['telefono'];
	       $descripcion = $_POST['descripcion'];
	       
			$query->dbInsert(array('nombre'=>$nombre,'apellido'=>$apellido,'edad'=>$edad,'sexo'=>$sexo,'telefono'=>$telefono,'descripcion'=>$descripcion),'paciente');
			
			echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>El Paciente Se Registro Satisfactoriamente.',  showCloseButton: true }); }); </script>";
			
			$form->reset();
	  } 
	  // generate output using a custom template
	  $form->render('*horizontal');
?>