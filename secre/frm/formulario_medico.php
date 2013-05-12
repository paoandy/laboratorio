<?php
    $querymedico = new query;
    
       $form = new Zebra_Form('formmedico');
	   $form->add('label', 'nombre_medico', 'nombre', 'Nombre medico:');
	      $obj = $form->add('text', 'nombre', '', array('placeholder' => 'Nombre del Medico'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,20,'error','El valor debe estar entre 3 y 20 caracteres'),
	 ));
                
	    $form->add('label', 'label_email', 'email', 'Email');
		$obj = $form->add('text', 'email', '', array('autocomplete' => 'off', 'placeholder' => 'email@dominio.com'));
		    // set rules
		    $obj->set_rule(array(
			'required'  =>  array('error', 'Email es requiredo!'),
			'email'     =>  array('error', 'el email no es valido!'),
		
		    ));

	//telefono medico      
	 $form->add('label', 'telefono_medico', 'telefono', 'telefono Medico:');
	       $obj = $form->add('text', 'telefono', '', array('placeholder' => 'Telefono del Medico'));
	       // set rules
		$obj->set_rule(array(
		     'required' => array('error', 'este campo es requerido!'),
		     'length'     =>  array(7,7,'error','El valor debe estar tener 7 digitos'),
	   ));
        
        $obj = $form->add('hidden', 'idmedico', $querymedico->siguiente('idmedico','medico'));
      
        // "submit"
         $form->add('submit', 'btnsubmit', 'Agregar');
        
        
        if ($form->validate()) {
            $idmedico = $_POST['idmedico'];
            $nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$telefono = $_POST['telefono'];

            $querymedico->dbInsert(array('nombre'=>$nombre,'email'=>$email,'telefono'=>$telefono),'medico');
			
			echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>El Medico Se Registro Satisfactoriamente.',  showCloseButton: true }); }); </script>";
			
			$form->reset();
        } 
		
        $form->render('*horizontal');
?>
