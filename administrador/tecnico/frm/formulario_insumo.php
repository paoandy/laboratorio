<?php
    	$query = new query;


       $form = new Zebra_Form('frminsumo');

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
		
		
		$ordenes = $query->getRowsArray("idproveedor, nombre",'proveedor');

        $array = array();

        if ( is_array( $ordenes) )
            foreach($ordenes as $key){
                $array[$key['idproveedor']] = $key['nombre'];
            }

        $form->add('label', 'nombre_proveedor', 'idproveedor', 'Proveedor:');
        $obj = $form->add('select', 'idproveedor', '');
        $obj->add_options($array);
        $obj->set_rule(array( 'required' => array('error', 'Proveedor es un campo requerido!') ));
		
		
	  	$form->add('label', 'nombre_insumo', 'nombreinsumo', 'Nombre de Insumo:');
	      $obj = $form->add('text', 'nombreinsumo', '', array('placeholder' => 'Nombre de Insumo'));
			 // set rules
			$obj->set_rule(array(
				'alphabet' => array(' ','error','Por Favor Solamente Letras'),
				'required' => array('error', 'este campo es requerido!'),
				'length'     =>  array(3,40,'error','El valor debe estar entre 3 y 20 caracteres'),
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
            $idproveedor = $_POST['idproveedor'];
            $nombre = $_POST['nombreinsumo'];
            $descripcion = $_POST['descripcion'];

            $query->dbInsert(array('idorden'=>$idorden,'idproveedor'=>$idproveedor,'nombre'=>$nombre, 'fecha'=>date('Y-m-d h:i:s'), 'descripcion'=>$descripcion), 'insumo');

            echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>Se agrego el insumo satisfactoriamente',  showCloseButton: true }); }); </script>";
	    
	    	$form->reset();
        }


        $form->render('*horizontal');
?>
