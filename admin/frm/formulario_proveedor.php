
<?php
    $query = new query;
    
       $form = new Zebra_Form('formmedico');
	   $form->add('label', 'nombre_proveedor', 'nombre', 'Nombre:');
	      $obj = $form->add('text', 'nombre', '', array('placeholder' => 'Nombre del Proveedor'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,20,'error','El valor debe estar entre 3 y 20 caracteres'),
	 ));
	
	//direccion
         $form->add('label', 'direccion_proveedor', 'direccion', 'Direccion:');
	      $obj = $form->add('text', 'direccion', '', array('placeholder' => 'Direccion del Proveedor'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(10,50,'error','El valor debe estar entre 10 y 50 caracteres'),
	 ));   
	    $form->add('label', 'label_email', 'email', 'Email');
		$obj = $form->add('text', 'email', '', array('autocomplete' => 'off','placeholder' => 'email@dominio.com'));
		    // set rules
		    $obj->set_rule(array(
			'required'  =>  array('error', 'Email es requiredo!'),
			'email'     =>  array('error', 'el email no es valido!'),
		
		    ));

	//telefono      
	 $form->add('label', 'telefono_proveedor', 'telefono', 'telefono:');
	       $obj = $form->add('text', 'telefono', '', array('placeholder' => 'Telefono del Proveedor'));
	       // set rules
		$obj->set_rule(array(
		     'required' => array('error', 'este campo es requerido!'),
		     'length'     =>  array(7,7,'error','El valor debe estar tener 7 digitos'),
	   ));
	// "descripcion"
	$form->add('label', 'label_message', 'descripcion', 'Descripcion:');
	     $obj = $form->add('textarea', 'descripcion');
	       $obj->set_rule(array(
		   'length'    => array(0, 140, 'error', 'Maximum length is 140 characters!'),
	 ));
        
        $obj = $form->add('hidden', 'idproveedor', $query->siguiente('idproveedor','proveedor'));
      
        // "submit"
         $form->add('submit', 'btnsubmit', 'Agregar');
        
        
        if ($form->validate()) {
            $idproveedor = $_POST['idproveedor'];
            $nombre = $_POST['nombre'];
	    $direccion = $_POST['direccion'];
	    $email = $_POST['email'];
	    $telefono = $_POST['telefono'];
	    $descripcion = $_POST['descripcion'];

            $query->dbInsert(array('nombre'=>$nombre,'direccion'=>$direccion,'email'=>$email,'telefono'=>$telefono,'descripcion'=>$descripcion),'proveedor');
        
		echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>El Proveedor Se Registro Satisfactoriamente.',  showCloseButton: true }); }); </script>";
		
		$form->reset();
	} 
        $form->render('*horizontal');
?>
