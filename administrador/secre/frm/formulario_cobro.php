<?php
    	$query = new query;


       $form = new Zebra_Form('frmcobro');

        $ordenes = $query->getRowsArray("idorden, CONCAT(idorden, ') ' ,fechapedido, ' - ' ,descripcionorden) as nombre",'orden');

        $array = array();

        if ( is_array( $ordenes) )
            foreach($ordenes as $key){
                $array[$key['idorden']] = $key['nombre'];
            }

        $form->add('label', 'nombre_seccion', 'idorden', 'Orden :');
        $obj = $form->add('select', 'idorden', '');
        $obj->add_options($array);
        $obj->set_rule(array( 'required' => array('error', 'Orden es un campo requerido!') ));
		
		
	  	$form->add('label', 'nombre_insumo', 'cantidad', 'Cobro de Analisis:');
	      $obj = $form->add('text', 'cantidad', '', array('placeholder' => 'Monto A Cobrar'));
			 // set rules
			$obj->set_rule(array(
				'numeric' => array(' ','error','Por Favor Solamente numeros'),
				'required' => array('error', 'este campo es requerido!'),
		 ));
	
		   // "descripcion"
		$form->add('label', 'label_message', 'descripcion', 'Descripcion:');
			 $obj = $form->add('textarea', 'descripcion');
			   $obj->set_rule(array(
			   'length'    => array(0, 140, 'error', 'Maximum length is 140 characters!'),
		 ));
		

        // "submit"
         $form->add('submit', 'btnsubmit', 'Agregar');


        if ($form->validate()) {
            $idorden = $_POST['idorden'];
            $cantidad = $_POST['cantidad'];
            $descripcion = $_POST['descripcion'];

            $query->dbInsert(array('idorden'=>$idorden,'cantidad'=>$cantidad, 'fecha'=>date('Y-m-d h:i:s'), 'descripcion'=>$descripcion), 'cobro');

            echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>Se registro un cobro satisfactoriamente',  showCloseButton: true }); }); </script>";
	    
	    	$form->reset();
        }


        $form->render('*horizontal');
?>
