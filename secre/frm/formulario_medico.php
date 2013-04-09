<fieldset>
<legend>Paciente</legend> 
<?php
    $querymedico = new query;
    
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
        
        $obj = $form->add('hidden', 'idmedico', $querymedico->siguiente('idmedico','medico'));
      
        // "submit"
         $form->add('submit', 'btnsubmit', 'Agregar');
        
        
        if ($form->validate()) {
            $idmedico = $_POST['idmedico'];
            $nombremedico = $_POST['nombremedico'];
            $descripcionmedico = $_POST['descripcionmedico'];
            
            $query->dbInsert(array('idmedico'=>$idmedico,'nombremedico'=>$nombremedico,'descripcionmedico'=>$descripcionmedico), 'medico');
        } 
        $form->render('*horizontal');
?>
</fieldset>