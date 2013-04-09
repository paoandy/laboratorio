 <fieldset>
<legend>Paciente</legend> 
   <?php
   $query = new query;
	 $form = new Zebra_Form('formPaciente');
	     $form->add('label', 'nombre_paciente', 'nombrepaciente', 'Nombre Paciente:');
		$obj = $form->add('text', 'nombrepaciente', '', array('placeholder' => 'Nombre del Paciente'));
	       // set rules
		  $obj->set_rule(array(
		      'alphabet' => array(' ','error','Por Favor Solamente Letras'),
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
	  $form->add('label', 'label_message', 'descripcionpaciente', 'Descripcion:');
	       $obj = $form->add('textarea', 'descripcionpaciente');
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
               $nombrepaciente = $_POST['nombrepaciente'];
               $edadpaciente = $_POST['edadpaciente'];
	       $sexopaciente = $_POST['sexopaciente'];
	       $telefonopaciente = $_POST['telefonopaciente'];
	       $descripcionpaciente = $_POST['descripcionpaciente'];
	       
                $query->dbInsert(array('idpaciente'=>$idpaciente,'nombrepaciente'=>$nombrepaciente,'edadpaciente'=>$edadpaciente,'sexopaciente'=>$sexopaciente,'telefonopaciente'=>$telefonopaciente,'descripcionpaciente'=>$descripcionpaciente),'paciente');
	  } 
	  // generate output using a custom template
	  $form->render('*horizontal');
  ?>
</fieldset>
