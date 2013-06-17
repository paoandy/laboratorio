<?php
    $query = new query;

    $pacientes = $query->getRowsArray('idpaciente, nombre','paciente');
    //print_r($pacientes);
    $medicos = $query->getRowsArray('*', 'medico');
    $secciones = $query->getRowsArray('*', 'seccion');

    //$secciones = $query->getRowsArray('*','seccion, categoria', 'WHERE seccion.idseccion = categoria.idseccion ORDER BY seccion.nombreseccion, categoria.nombrecategoria');
    $secciones = $query->getRowsArray('*','seccion', 'ORDER BY seccion.nombreseccion');

    //print_r($_POST);
	
	if ( isset($_POST['idpaciente']) ){
		$idusuario = $_POST['idusuario'];
		$idpaciente = $_POST['idpaciente'];
		$idmedico = $_POST['idmedico'];
		$descripcion = $_POST['desscripcion'];
		$material = $_POST['material'];
		$fechaorden = date('Y-m-d');
		$total = $_POST['total'];
		$saldo = $_POST['total'];
		
		$query->dbInsert(array('iduasuario'=>$idusuario, 'idpaciente'=>$idpaciente, 'idmedico'=>$idmedico, 'descripcionorden'=>$descripcion, 'material'=>$material, 'fechapedido'=>$fechaorden, 'estado'=>'0',
								'total'=>$total, 'saldo'=>$saldo),'orden');
		
		//OJO revisar
		$idorden = $query->getRow('*','orden', 'ORDER BY idorden DESC');
		$idorden = $idorden['idorden'];
		
		$realizar = $_POST['realizar'];
		foreach($realizar as $codigo){
			$codigo;
			$costo = $_POST['costo'][$codigo];
			$query->dbInsert(array('idorden'=>$idorden, 'idcategoria'=>$codigo, 'costo'=>$costo ),'resultado');
		}
		
		echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Orden...<br><br>La Orden Fue Registrada Satisfactoriamente.',  showCloseButton: true }); }); </script>";
	}
?>
<form action="registrarorden.php" method="post">
    <fieldset style="box-shadow:inset 0px 0px 10px rgb(225,225,225);">
    	<center><h1 style="padding:20px;">Registrar Orden</h1></center>
        <fieldset style="margin:20px; padding:20px;">
            <legend>Datos Paciente</legend>
            Paciente: <select id="selectPaciente" style="width:250px;" name="idpaciente"><?php crearLista($pacientes, 'idpaciente', 'nombre'); ?></select>
            Medico: <select id="selectMedico" style="width:250px;" name="idmedico"><?php crearLista($medicos, 'idmedico', 'nombre'); ?></select>
            <input type="hidden" name="idusuario" value="<?php echo $_SESSION['idusuario'];?>" />
        </fieldset>
        <fieldset style="margin:20px; padding:20px; text-align: left; background: linear-gradient( 180deg, rgb(245,245,245) 25%, rgb(225,225,225), rgb(245,245,245) 75% ); border-radius:10px;">
            <legend>Datos Generales</legend>
            <strong>Registrado Por:</strong> <?php echo $_SESSION['login']; ?><br/>
            <strong>Fecha: </strong><?php echo date('d/m/Y'); ?><br/>
            <strong>Descripcion:</strong><br/><textarea name="DESCRIPCION" style="width:100%;" placeholder="Descripcion/Otros/Observaciones"></textarea>
            <strong>Material:</strong><br/><textarea name="MATERIAL" style="width:100%;" placeholder="Material Para Trabajar"></textarea>

            <fieldset style="margin:20px; padding:20px;">
            <legend>Analisis Disponibles</legend>
            <?php
                    foreach ($secciones as $seccion) {
                        echo "<div class='servicio'>";
                        echo "<h1>+ ".$seccion['NOMBRESECCION']."</h1>";
                        echo "<ul>";
                             $subcategorias = $query->getRowsArray('*','categoria','WHERE idseccion ='.$seccion['IDSECCION']);
                            foreach($subcategorias as $subcategoria){
                                echo "<li><input class='check' type='checkbox' name='realizar[".$subcategoria['idcategoria']."]' value='".$subcategoria['idcategoria']."' data-codigo='".$subcategoria['idcategoria']."'/><span>".$subcategoria['nombrecategoria']." : </span>".                                   "<input class='costo' type='text' name='costo[".$subcategoria['idcategoria']."]' value='".$subcategoria['costo']."' data-codigo='".$subcategoria['idcategoria']."' disabled/><span>Bs.</span></li>";
                            }
                        echo "</ul>";
                        echo "</div>";
                    }
            ?>
        </fieldset>
            <script>
                            $(document).ready(function(){
                                $(".check").each(function() {
                                    $(this).change(function( event ){
                                        var id = $(this).attr('data-codigo');
                                        if ($(this).is(':checked')){
                                            $('.costo[data-codigo='+id+']').removeAttr('disabled');
                                            var total = parseFloat( $("#total").val() ) + parseFloat( $('.costo[data-codigo='+id+']').val() );
                                            $('#total').val(total);
                                        } else {
                                            $('.costo[data-codigo='+id+']').attr('disabled', true);
                                            var total = parseFloat( $("#total").val() ) - parseFloat( $('.costo[data-codigo='+id+']').val() );
                                            $('#total').val(total);
                                        }
										$('#costoTotal').val(total);
                                        event.stopPropagation();
                                    });
                                    //$(this).attr("src", $(this).attr("data-original"));
                                    //$(this).removeAttr("data-original");
                                });

                                //TODO: When trying to to add and modify values using keydown, keyup values
                                // and pressing rapidly keys there is no sync between keydown and keyup event
                                // this situation appears to be under control, but it is not fully tested
                                // Recheck if issues when adding, Alternative case would be to place a
                                // 'Calcular' button to calculate when press all enable text-inputs and sum
                                // This module needs to be rechecked to validate all scenarios
                                $(".costo").each(function() {

                                    $(this).blur(function(){
                                        if ( !$(this).val() )
                                            $(this).val(0);
                                    });

                                    var prevValue;

                                    var processing = false; // TODO: Check this variable funcionality

                                    $(this).keydown(function(event){
                                        if (processing){
                                            event.preventDefault();
                                            return;
                                        }

                                        if(event.shiftKey)
                                            event.preventDefault();
                                        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 190) {
                                         // Allow all decimal numbers from 0 to 9 with dot(.)
                                        } else {
                                            if (event.keyCode < 95) {
                                                if (event.keyCode < 48 || event.keyCode > 57) {
                                                    event.preventDefault();
                                                }
                                            } else {
                                                if (event.keyCode < 96 || event.keyCode > 105) {
                                                    event.preventDefault();
                                                }
                                            }
                                        }

                                        if (!processing){
                                            prevValue = parseFloat( $(this).val() ? $(this).val() : 0 );
                                            processing = true;
                                        }
                                    });

                                    $(this).keyup(function(event){
                                        if (!processing){
                                            event.preventDefault();
                                            return;
                                        }

                                        var costo = parseFloat( $(this).val() ? $(this).val() : 0 );
                                        //console.log("Total: " + parseFloat( $("#total").val() ) + " Sin Parser:" + $("#total").val() + " costo: " + costo + " previous:" + prevValue );
                                        var total = parseFloat( $("#total").val() ) + costo - prevValue;

                                        $('#total').val(total);
										$('#costoTotal').val(total);

                                        processing = false;
                                    });
                                });
                            });
                        </script>
                        <center>
                        	<input style="text-align: right;" id="costoTotal" type="hidden" name="total" id="total" value="0"/>
                            Total:<input style="text-align: right;" id="total" type="text" value="0" disabled/>Bs.
                        </center>
        </fieldset>
        <input type="submit" value="Registrar Orden" style="margin:20px;"/>
    </fieldset>
</form>
<?php
    function crearLista($valores,$index,$value){
        $resultado = "";
        foreach( $valores as $key)
            $resultado .= "<option value='".$key[$index]."'>".$key[$value]."</option>";

        echo $resultado;
    }
?>
<script>
	$(document).ready(function() { $("#selectPaciente").select2(); $("#selectMedico").select2(); });
</script>