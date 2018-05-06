<?php
	if (!isset($_GET['id']) )
		header('Location:index.php');
		
	$idorden = $_GET['id'];
	//"SELECT idrango, nombre, nombrecategoria FROM rango, categoria WHERE categoria.idcategoria = rango.idcategoria AND CATEGORIA.IDCATEGORIA IN ( SELECT IDCATEGORIA FROM RESULTADO WHERE IDORDEN = ".$idorden." ) ORDER BY categoria.nombrecategoria"
    $query = new query;
    
    $form = new Zebra_Form('formrango');
	   //$count++;
	   $rangos= $query->getRowsArray("idrango, nombre, nombrecategoria", "rango, categoria"," WHERE categoria.idcategoria = rango.idcategoria AND categoria.idcategoria IN ( SELECT idcategoria FROM resultado WHERE idorden = ".$idorden." ) ORDER BY categoria.nombrecategoria");   
	
	 $array;
        foreach($rangos as $key){
            $array[$key['idrango']] = $key['nombrecategoria']." - ".$key['nombre'];
        }
		
		$resultado_categoria= $query->getRowsArray("idresultado, idcategoria", "resultado", " WHERE idorden = ".$idorden);
		$arrayresultado_categoria;
        foreach($resultado_categoria as $key){
            $arrayresultado_categoria[$key['idcategoria']] = $key['idresultado'];
        }
		//print_r($arrayresultado_categoria);
		
		$rango_categoria= $query->getRowsArray("idrango, categoria.idcategoria as idcategoria", "rango, categoria"," WHERE categoria.idcategoria = rango.idcategoria AND categoria.idcategoria IN ( SELECT idcategoria FROM resultado WHERE idorden = ".$idorden." ) ORDER BY categoria.nombrecategoria");
		$arrayrango_categoria;
        foreach($rango_categoria as $key){
            $arrayrango_categoria[$key['idrango']] = $key['idcategoria'];
        }
		//print_r($arrayrango_categoria);

        $form->add('label', 'nombre_rango', 'idrango', 'Rango Nominal Para:');
        $obj = $form->add('select', 'idrango', '');
        $obj->add_options($array);
        $obj->set_rule(array( 'required' => array('error', 'El Rango es un campo requerido!') ));
                
		// Resultado
	    $form->add('label', 'label_resultado', 'resultado', 'Resultado');
		$obj = $form->add('text', 'resultado', '', array('autocomplete' => 'off', 'placeholder' => 'Resultado de Analisis'));
		    // set rules
		    $obj->set_rule(array(
			'required'  =>  array('error', 'E; Resultado es requiredo!')
		    ));

		//Descripcion/Observacion      
	 	$form->add('label', 'label_descripcion', 'descripcion', 'Descripcion/Observacion:');
	       $obj = $form->add('textarea', 'descripcion', '', array('placeholder' => 'Descripcion/Observacion de Analisis'));
      
        // "submit"
         $form->add('submit', 'btnsubmit', 'Agregar');
        
        
        if ($form->validate()) {
			print_r($_POST);
            $idrango = $_POST['idrango'];
            $resultado = $_POST['resultado'];
			$descripcion = $_POST['descripcion'];
			echo "ANALISIS-----<br>";
			$categoria = $arrayrango_categoria[$idrango];
			$fila = $arrayresultado_categoria[$categoria];
			$categoria;
			$fila;
			
            $query->dbUpdate(array('idrango'=>$idrango,'resultado'=>$resultado,'descripcion'=>$descripcion),'resultado','WHERE idresultado = '.$fila);
			
			echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>El Resultado Se Registro Satisfactoriamente.',  showCloseButton: true }); }); </script>";
			
			$form->reset();
        } 
		
        $form->render('*horizontal');
?>

<?php
    $query = new query;
    
    $form = new Zebra_Form('formListo');
	   
        $array = array(1 => 'Si', 0=>'No');
		
		//print_r($arrayrango_categoria);

        $form->add('label', 'nombre_rango', 'ok', 'Se Termino el Analisis?:');
        $obj = $form->add('select', 'ok', '');
        $obj->add_options($array);
        $obj->set_rule(array( 'required' => array('error', 'El Rango es un campo requerido!') ));
                
        // "submit"
         $form->add('submit', 'btnsubmit', 'Guardar');
        
        
        if ($form->validate()) {
			print_r($_POST);
            $ok = $_POST['ok'];
            
			if ( $ok == 1 ){
			
				$query->dbUpdate(array('estado'=>1 ),'orden','WHERE idorden = '.$idorden);
				
				echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>El Analisis Fue Entregado A Secretaria.',  showCloseButton: true }); }); </script>";
				
			}
			$form->reset();
        } 
		
        $form->render('*horizontal');
?>