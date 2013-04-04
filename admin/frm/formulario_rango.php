<?php
    $queryrango = new query;
    
    $id = $query->siguiente('idcategoria','categoria_analisis');
    
    if ($id == 0 ){
    echo "<center><h1>Usted No Puede Insertar Un  Rango Sin Antes Tener Al Menos Una Subcategoria </h1></center>";
    } else {
       $form = new Zebra_Form('formrango');
	   $form->add('label', 'rango_minimo', 'minimo', 'Valor Minimo:');
	      $obj = $form->add('text', 'minimo', '', array('placeholder' => 'Valor Minimo'));
	     // set rules
		$obj->set_rule(array(
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(1,7,'error','El valor debe estar entre 1 y 7 caracteres'),
	 ));
	$form->add('label', 'rango_maximo', 'maximo', 'Valor Maximo:');
	      $obj = $form->add('text', 'maximo', '', array('placeholder' => 'Valor Maximo'));
	     // set rules
		$obj->set_rule(array(
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(1,7,'error','El valor debe estar entre 1 y 7 caracteres'),
	 ));
	$form->add('label', 'sexo_paciente', 'sexo', 'Sexo del Paciente:');
	      $obj = $form->add('text', 'sexo', '', array('placeholder' => 'Sexo del paciente'));
	     // set rules
		$obj->set_rule(array(
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(1,7,'error','El valor debe estar entre 1 y 7 caracteres'),
	 ));
	$form->add('label', 'unidad_rango', 'unidad', 'Unidades:');
	      $obj = $form->add('text', 'unidad', '', array('placeholder' => 'Unidad del rango'));
	     // set rules
		$obj->set_rule(array(
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(1,5,'error','El valor debe estar entre 1 y 5caracteres'),
	 ));
                
        
        $obj = $form->add('hidden', 'idrango', $query->siguiente('idrango','rango'));
        
        
        $categorias= $query->getRows('idcategoria, nombrecategoria','categoria_analisis');
        
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
            $sexo= $_POST['sexo'];
	    $unidad= $_POST['unidad'];
	    
            $query->dbInsert(array('idrango'=>$idrango,'idcategoria'=>$idcategoria,'minimo'=>$minimo,'maximo'=>$maximo,'sexo'=>$sexo,'unidad'=>$unidad), 'rango');
        } 
        $form->render('*horizontal');
    }
?>
