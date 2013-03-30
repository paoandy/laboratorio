<fieldset>
    <legend>Seccion de Analisis</legend>    

    <?php
        $query = new query;
        
        // instantiate a Zebra_Form object
           $form = new Zebra_Form('formSeccion');
           
           $obj = $form->add('text', 'nombreseccion', '', array('placeholder' => 'Seccion de Analisis'));
           
           // set rules
           $obj->set_rule(array(
                  'alphabet' => array(' ','error','Por Favor Solamente Letras'),
                  'required'  =>  array('error', 'Este Campo Es Requerido!'),
                  'length'     =>  array(3,60,'error','El valor debe estar entre 3 y 60 caracteres'),
           
           ));
           
           $obj = $form->add('hidden', 'idsseccion', $query->siguiente('idseccion','seccion') );
           
           // "submit"
           $form->add('submit', 'btnsubmit', 'Agregar');
           
           // validate the form
           if ($form->validate()) {
                $idseccion = $_POST['idseccion'];
                $nombre = $_POST['nombreseccion'];
                
                $query->dbInsert(array('idseccion'=>$idseccion,'nombreseccion'=>$nombre), 'seccion');
           }
           
           // auto generate output, labels above form elements
           $form->render();
    
    ?>
 </fieldset>

<fieldset>
    <legend>Categoria de Seccion</legend>
    <?php
        include 'frm/formulario_categoria.php';
    ?>
</fieldset>