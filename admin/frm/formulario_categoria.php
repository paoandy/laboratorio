<?php
    $querycategoria = new query;

    $id = $query->siguiente('idseccion','seccion');

    if ($id == 0 ){
        echo "<center><h1>Usted No Puede Insertar Una Subcategoria Sin Antes Tener Al Menos Una Categoria</h1></center>";
    } else {
       $form = new Zebra_Form('formcategoria');
	   $form->add('label', 'nombre_categoria', 'nombrecategoria', 'Nombre categoria:');
	      $obj = $form->add('text', 'nombrecategoria', '', array('placeholder' => 'Nombre de la Categoria'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array(' ','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,20,'error','El valor debe estar entre 3 y 20 caracteres'),
	 ));

       // "descripcion"
	$form->add('label', 'label_message', 'descripcion', 'Descripcion:');
	     $obj = $form->add('textarea', 'descripcion');
	       $obj->set_rule(array(
		   'length'    => array(0, 140, 'error', 'Maximum length is 140 characters!'),
	 ));

        $obj = $form->add('hidden', 'idcategoria', $query->siguiente('idcategoria','categoria_analisis'));


        $secciones = $query->getRows('idseccion, nombreseccion','seccion');

        $array;
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
            $descripcioncategoria = $_POST['descripcion'];

            $query->dbInsert(array('idcategoria'=>$idcategoria,'idseccion'=>$idseccion,'nombrecategoria'=>$nombrecategoria,'descripcioncategoria'=>$descripcioncategoria), 'categoria_analisis');
        }


        $form->render('*horizontal');
    }
?>
