<script>
    var seccion = "#formularioSeccion";
    var categoria = "#formularioCategoria";
    var rango = "#formularioRango";
    var frmSeccion = true;
    var frmCategoria = false;
    var frmRango = false;
    var retardo = 250;
    $(document).ready(function(){
        $(categoria).fadeOut(100);
        $(rango).fadeOut(100);

        $('#leyendaSeccion').click(function(){
            if ( frmSeccion ){
                $(seccion).fadeOut(retardo);
                frmSeccion = false;
            } else {
                $(seccion).fadeIn(retardo);
                frmSeccion = true;
            }
        });

        $('#leyendaCategoria').click(function(){
            if ( frmCategoria ){
                $(categoria).fadeOut(retardo);
                frmCategoria = false;
            } else {
                $(categoria).fadeIn(retardo);
                frmCategoria = true;
            }
        });

        $('#leyendaRango').click(function(){
            if ( frmRango ){
                $(rango).fadeOut(retardo);
                frmRango = false;
            } else {
                $(rango).fadeIn(retardo);
                frmRango = true;
            }
        });
    });
</script>
<fieldset>
    <legend id="leyendaSeccion"><strong>Seccion de Analisis</strong></legend>
        <div id="formularioSeccion">
            <?php
                $query = new query;

                // instantiate a Zebra_Form object
                   $form = new Zebra_Form('frmSeccion');

                $form->add('label', 'label_message', 'nombreseccion', 'Nombre Seccion:');
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
                        $nombreseccion = $_POST['nombreseccion'];

                        $query->dbInsert(array('idseccion'=>$idseccion,'nombreseccion'=>$nombreseccion), 'seccion');

                        echo "<script>alert('Se Agrego La Seccion de Analisis');</script>";
                   }

                   // auto generate output, labels above form elements
                   $form->render('*horizontal');

            ?>
        </div>
</fieldset>

<fieldset>
    <legend id="leyendaCategoria"><strong>Categoria de Seccion</strong></legend>
    <div id="formularioCategoria">
        <?php include 'frm/formulario_categoria.php'; ?>
    </div>
</fieldset>

<fieldset>
    <legend id="leyendaRango"><strong>Rangos</strong></legend>
    <div id="formularioRango">
        <?php include 'frm/formulario_rango.php'; ?>
    </div>
</fieldset>
