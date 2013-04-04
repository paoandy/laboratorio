<?php
    $querymedico = new query;
    
    $id = $query->siguiente('idpaciente','paciente');
    
    if ($id == 0 ){
        echo "<center><h1>Usted No Puede Insertar Un Medico Sin Antes Tener Al Menos Un Paciente</h1></center>";
    } else {
       $form = new Zebra_Form('formmedico');
	   $form->add('label', 'nombre_medico', 'nombremedico', 'Nombre medico:');
	      $obj = $form->add('text', 'nombremedico', '', array('placeholder' => 'Nombre del Medico'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,20,'error','El valor debe estar entre 3 y 20 caracteres'),
	 ));
                
       // "descripcion"
	$form->add('label', 'label_message', 'descripcionmedico', 'Descripcion:');
	     $obj = $form->add('textarea', 'descripcionmedico');
	       $obj->set_rule(array(
		   'length'    => array(0, 140, 'error', 'Maximum length is 140 characters!'),
	 ));
        
        $obj = $form->add('hidden', 'idmedico', $query->siguiente('idmedico','medico'));
        
       $pacientes = $query->getRows('idpaciente, nombrepaciente','paciente');
        
        $array;
        foreach($pacientes as $key){
            $array[$key['idpaciente']] = $key['nombrepaciente'];
        }

        $form->add('label', 'nombre_paciente', 'idpaciente', 'Paciente:');
        $obj = $form->add('select', 'idpaciente', '');
        $obj->add_options($array);
        $obj->set_rule(array( 'required' => array('error', 'Paciente es un campo requerido!') ));
      
        // "submit"
         $form->add('submit', 'btnsubmit', 'Agregar');
        
        
        if ($form->validate()) {
            $idmedico = $_POST['idmedico'];
            $idpaciente = $_POST['idpaciente'];
            $nombremedico = $_POST['nombremedico'];
            $descripcionmedico = $_POST['descripcionmedico'];
            
            $query->dbInsert(array('idmedico'=>$idmedico,'idpaciente'=>$idpaciente,'nombremedico'=>$nombremedico,'descripcionmedico'=>$descripcionmedico), 'medico');
        } 
        $form->render('*horizontal');
    }
?>
