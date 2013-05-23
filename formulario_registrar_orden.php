<?php
    $query = new query;

    $secciones = $query->getRowsArray('*', 'SECCION');

    //$secciones = $query->getRowsArray('*','seccion, categoria', 'WHERE seccion.idseccion = categoria.idseccion ORDER BY seccion.nombreseccion, categoria.nombrecategoria');
    $secciones = $query->getRowsArray('*','seccion', 'ORDER BY seccion.nombreseccion');
?>
<form action="registrarorden.php" method="post">
    <fieldset style="box-shadow:inset 0px 0px 10px rgb(225,225,225);">
    	<center><h1 style="padding:20px;">Registrar Orden</h1></center>
        <fieldset style="margin:20px; padding:20px;">
            <legend>Datos Paciente</legend>
            Paciente: <input type="text" id="selectPaciente" style="width:250px;" />
            Telefono Paciente: <input type="text" id="selectPaciente" style="width:250px;" />
            <br/><br/>
            Medico: <input type="text" id="selectMedico" style="width:250px;" />
            Telefono Medico: <input type="text" id="selectMedico" style="width:250px;" /><br/>
            Email Medico: <input type="text" id="selectMedico" style="width:250px;" />
            <input type="hidden" name="IDUSUARIO" value="<?php echo $_SESSION['idusuario'];?>" />
        </fieldset>
        <fieldset style="margin:20px; padding:20px; text-align: left; background: linear-gradient( 180deg, rgb(245,245,245) 25%, rgb(225,225,225), rgb(245,245,245) 75% ); border-radius:10px;">
            <legend>Datos Generales</legend>
            <strong>Fecha: </strong><?php echo date('d/m/Y'); ?><br/>
            <strong>Descripcion:</strong><br/><textarea name="DESCRIPCION" style="width:100%;" placeholder="Descripcion/Otros/Observaciones"></textarea>

            <fieldset style="margin:20px; padding:20px;">
            <legend>Analisis Disponibles</legend>
            <?php
                    foreach ($secciones as $seccion) {
                        echo "<div class='servicio'>";
                        echo "<h1>+ ".$seccion['NOMBRESECCION']."</h1>";
                        echo "<ul>";
                            $subcategorias = $query->getRowsArray('*','CATEGORIA','WHERE IDSECCION ='.$seccion['IDSECCION']);
                            foreach($subcategorias as $subcategoria){
                                echo "<li><input class='check' type='checkbox' name='realizar[".$subcategoria['IDCATEGORIA']."]' value='".$subcategoria['IDCATEGORIA']."' data-codigo='".$subcategoria['IDCATEGORIA']."' data-costo='".$subcategoria['COSTO']."' data-nombre='".$subcategoria['NOMBRECATEGORIA']."'/><span>".$subcategoria['NOMBRECATEGORIA']." : </span><span>".$subcategoria['COSTO']."Bs.</span></li>";
                            }
                        echo "</ul>";
                        echo "</div>";
                    }
            ?>
        </fieldset>
            <script>
                            $(document).ready(function(){
								$('#total').val(0);
                                
								$(".check").each(function() {
                                    $(this).change(function( event ){
                                        var id = $(this).attr('data-codigo');
                                        if ($(this).is(':checked')){
                                            $('.check[data-codigo='+id+']').attr('data-pedido', true);
                                            var total = parseFloat( $("#total").val() ) + parseFloat( $('.check[data-codigo='+id+']').attr('data-costo') );
                                            $('#total').val(total);
                                        } else {
											$('.check[data-codigo='+id+']').removeAttr('data-pedido');
                                            var total = parseFloat( $("#total").val() ) - parseFloat( $('.check[data-codigo='+id+']').attr('data-costo') );
                                            $('#total').val(total);
                                        }
										$('#costoTotal').val(total);
                                        event.stopPropagation();
                                    });
                                    //$(this).attr("src", $(this).attr("data-original"));
                                    //$(this).removeAttr("data-original");
                                });
							});
                        </script>
                        <center>
                        	<input style="text-align: right;" id="costoTotal" type="hidden" name="total" id="total" value="0"/>
                            Total:<input style="text-align: right;" id="total" type="text" value="0" disabled/>Bs.
                        </center>
        </fieldset>
        	<center><input type="button" id="Registrar" value="Registrar Orden" style="margin:20px;"/></center>
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
	$(document).ready(function() {
		//$("#selectPaciente").select2(); $("#selectMedico").select2(); 
		$("#Registrar").click( function() {
			$('#contenido').fadeOut();
			$('#pedido').slideDown(1000);
			Messenger().post({ message: 'Pedido Realizado...<br><br>El Pedido Fue Registrado Satisfactoriamente.',  showCloseButton: true });
		});
	});
</script>