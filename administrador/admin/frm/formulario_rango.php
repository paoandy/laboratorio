<?php
    $queryrango = new query;

    $id = $query->siguiente('idcategoria','categoria');

    if ($id == 0 ){
    echo "<center><h1>Usted No Puede Insertar Un  Rango Sin Antes Tener Al Menos Una Subcategoria </h1></center>";
    } else {

       $form = new Zebra_Form('frmrango');

       $form->add('label', 'etiqueta_rango', 'etiqueta', 'Etiqueta:');
	      $obj = $form->add('text', 'etiqueta', '', array('placeholder' => 'Etiqueta del rango'));
	     // set rules
		$obj->set_rule(array(
		    'required' => array('error', 'este campo es requerido!'),
		    'length'   =>  array(1,50,'error','El valor debe estar entre 1 y 60 caracteres'),
	 ));

        $form->add('label', 'descripcion_rango', 'descripcion', 'Descripcion:');
	      $obj = $form->add('textarea', 'descripcion', '', array('placeholder' => 'Etiqueta del rango'));
	     // set rules
		$obj->set_rule(array(
		    'length'   =>  array(0,140,'error','El valor debe estar entre 0 y 140 caracteres')
	 ));

	$form->add('label', 'rango_minimo', 'minimo', 'Valor Minimo:');
	      $obj = $form->add('text', 'minimo', '', array('placeholder' => 'Valor Minimo'));
	     // set rules
		//$obj->set_rule(array( 'required' => array('error', 'este campo es requerido!') ));

        $form->add('label', 'rango_maximo', 'maximo', 'Valor Maximo:');
	      $obj = $form->add('text', 'maximo', '', array('placeholder' => 'Valor Maximo'));
	     // set rules
		//$obj->set_rule(array( 'required' => array('error', 'este campo es requerido!')));


	$form->add('label', 'unidad_rango', 'unidad', 'Unidades:');
	      $obj = $form->add('text', 'unidad', '', array('placeholder' => 'Unidad del rango'));
	     // set rules
		$obj->set_rule(array(
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(1,5,'error','El valor debe estar entre 1 y 5caracteres'),
	 ));


        $obj = $form->add('hidden', 'idrango', $query->siguiente('idrango','rango'));


        $categorias= $query->getRowsArray('idcategoria, nombrecategoria','categoria');

        $array;
        foreach($categorias as $key){
            $array[$key['idcategoria']] = $key['nombrecategoria'];
        }

        $form->add('label', 'nombre_categoria', 'idcategoria', 'Categoria:');
        $obj = $form->add('select', 'idcategoria', '');
        $obj->add_options($array);
        $obj->set_rule(array( 'required' => array('error', 'Categoria  es un campo requerido!') ));

        // "submit"
         $form->add('submit', 'btnsubmit', 'Agregar');


        if ($form->validate()) {
            $idrango = $_POST['idrango'];
            $idcategoria= $_POST['idcategoria'];
            $minimo = $_POST['minimo'];
            $maximo= $_POST['maximo'];
            $descripcion= $_POST['descripcion'];
            $etiqueta = $_POST['etiqueta'];
	    $unidad= $_POST['unidad'];

            if ( !isset($minimo) ){
                $minimo = 'NULL';
            }

            if ( !isset($maximo) ){
                $maximo = 'NULL';
            }

            $query->dbInsert(array('idcategoria'=>$idcategoria, 'nombre'=>$etiqueta ,'descripcion'=>$descripcion,'minimo'=>$minimo,'maximo'=>$maximo,'unidad'=>$unidad), 'rango');

	    echo "<script> $(document).ready(function() { Messenger().post({ message:'Se Agrego El Rango Para: ".$etiqueta."' ,  showCloseButton: true }); }); </script>";
	   
	   $form->reset();
        }
        $form->render('*horizontal');
    }
?>
