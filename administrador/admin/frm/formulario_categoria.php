<?php
    $querycategoria = new query;

    $id = $query->siguiente('idseccion','seccion');

    if ($id == 0 ){
        echo "<center><h1>Usted No Puede Insertar Una Subcategoria Sin Antes Tener Al Menos Una Categoria</h1></center>";
    } else {

       $form = new Zebra_Form('frmcategoria');
	   $form->add('label', 'nombre_categoria', 'nombrecategoria', 'Nombre:');
	      $obj = $form->add('text', 'nombrecategoria', '', array('placeholder' => 'Nombre de la Categoria'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,40,'error','El valor debe estar entre 3 y 20 caracteres'),
	 ));
	    $form->add('label', 'costo_categoria', 'costo', 'Costo:');
	      $obj = $form->add('text', 'costo', '', array('placeholder' => 'Costo Analisis'));
	     // set rules
		$obj->set_rule(array(
		    'required' => array('error', 'este campo es requerido!'),
	 ));
       // "descripcion"
	$form->add('label', 'label_message', 'descripcion', 'Descripcion:');
	     $obj = $form->add('textarea', 'descripcion');
	       $obj->set_rule(array(
		   'length'    => array(0, 140, 'error', 'Maximum length is 140 characters!'),
	 ));

        $obj = $form->add('hidden', 'idcategoria', $query->siguiente('idcategoria','categoria'));


        $secciones = $query->getRowsArray('idseccion, nombreseccion','seccion');

        $array = array();

        if ( is_array( $secciones) )
            foreach($secciones as $key){
                $array[$key['idseccion']] = $key['nombreseccion'];
            }

        $form->add('label', 'nombre_seccion', 'idseccion', 'Seccion:');
        $obj = $form->add('select', 'idseccion', '');
        $obj->add_options($array);
        $obj->set_rule(array( 'required' => array('error', 'Seccion es un campo requerido!') ));

        // "submit"
         $form->add('submit', 'btnsubmit', 'Agregar');


        if ($form->validate()) {
            $idcategoria = $_POST['idcategoria'];
            $idseccion = $_POST['idseccion'];
            $nombrecategoria = $_POST['nombrecategoria'];
	    $costo = $_POST['costo'];
            $descripcioncategoria = $_POST['descripcion'];

            $query->dbInsert(array('idseccion'=>$idseccion,'nombrecategoria'=>$nombrecategoria,'costo'=>$costo,'descripcioncategoria'=>$descripcioncategoria), 'categoria');

            echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>Se agrego la categoria satisfactoriamente',  showCloseButton: true }); }); </script>";
	    
	    $form->reset();
        }


        $form->render('*horizontal');
    }
?>
