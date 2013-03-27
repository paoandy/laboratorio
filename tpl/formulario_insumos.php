<?php include '../lib/zebra/Zebra_Form.php'; ?>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SLCHL</title>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="../lib/zebra/public/css/zebra_form.css">
<script src="../lib/zebra/public/javascript/zebra_form.js"></script>
</head>
<body>

       
 <h3 class="titulo">INSUMOS</h3>
 <?php
       $form = new Zebra_Form('forminsumos');
	   $form->add('label', 'nombre_insumo', 'nombredetalle', 'Nombre Insumo:');
	      $obj = $form->add('text', 'nombredetalle', '', array('placeholder' => 'Nombre del Insumo'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array('','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,20,'error','El valor debe estar entre 3 y 20 caracteres'),
	 ));
      // "fecha"
		$form->add('label', 'fecha_compra', 'date', 'Fecha Compra');
		$date = $form->add('date', 'date');
		$date->set_rule(array(
		    'required'      =>  array('error', 'Date is required!'),
		    'date'          =>  array('error', 'Date is invalid!'),
		));
	    
      //cantidad de insumos     
	      $form->add('label', 'cantidad_insumo', 'cantidaddetalle', 'Cantidad de Insumos:');
			 $obj = $form->add('text', 'cantidaddetalle', '', array('placeholder' => 'Cantidad de Insumos'));
			 // set rules
			  $obj->set_rule(array(
			       'required' => array('error', 'este campo es requerido!'),
		     ));
      // Costo insumo    
       $form->add('label', 'costo_insumo', 'costodetalle', 'Costo Insumo:');
	     $obj = $form->add('text', 'costodetalle', '', array('placeholder' => 'Costo Insumo'));
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
	 ));
    // "submit"
     $form->add('submit', 'btnsubmit', 'Agregar');
    // if the form is valid
    if ($form->validate()) {
    // show result
    } 
        // generate output using a custom template
        $form->render('*horizontal');
?>
</body>
</html>