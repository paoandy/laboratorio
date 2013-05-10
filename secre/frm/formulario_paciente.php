 <fieldset>
<legend>Paciente</legend> 
   <?php
   $query = new query;
	 $form = new Zebra_Form('formPaciente');
	     $form->add('label', 'nombre_paciente', 'nombre', 'Nombre Paciente:');
		$obj = $form->add('text', 'nombre', '', array('placeholder' => 'Nombre del Paciente'));
	       // set rules
		  $obj->set_rule(array(
		      'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		      'required' => array('error', 'este campo es requerido!'),
		      'length'     =>  array(3,100,'error','El valor debe estar entre 3 y 60 caracteres'),
	   ));
      //	edad del paciente
	 $form->add('label', 'edad_paciente', 'edad', 'Edad Paciente:');
	       $obj = $form->add('text', 'edad', '', array('placeholder' => 'Edad del Paciente'));
	       // set rules
		$obj->set_rule(array(
		     'digits' => array('1,3,','error','Por Favor Solamente digitos'),
		     'required' => array('error', 'este campo es requerido!'),
		     'length'     =>  array(1,3,'error','El valor debe estar entre 1 y 3 digitos'),
	   ));
       //	sexo del paciente      
	 $form->add('label', 'sexo_paciente', 'sexo', 'Sexo Paciente:');
	       $obj = $form->add('text', 'sexo', '', array('placeholder' => 'Sexo del Paciente'));
	       // set rules
		$obj->set_rule(array(
		     'required' => array('error', 'este campo es requerido!'),
		     'length'     =>  array(1,3,'error','El valor debe estar entre 1 y 3 digitos'),
	   ));
	//telefono del paciente      
	 $form->add('label', 'telefono_paciente', 'telefono', 'telefono Paciente:');
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
               $edad = $_POST['edad'];
	       $sexo = $_POST['sexo'];
	       $telefono = $_POST['telefono'];
	       $descripcion = $_POST['descripcion'];
	       
                $query->dbInsert(array('nombre'=>$nombre,'edad'=>$edad,'sexo'=>$sexo,'telefono'=>$telefono,'descripcion'=>$descripcion),'paciente');
	  } 
	  // generate output using a custom template
	  $form->render('*horizontal');
  ?>
</fieldset>
