<?php
	$consulta = new query;
	$ordenes = $consulta->getRowsArray('*', 'ORDEN', 'WHERE ESTADO = 0');
	$terminadas = $consulta->getRowsArray('*', 'ORDEN', 'WHERE ESTADO = 1');
	//print_r($ordenes);
	
	function crearListaOrden($array, $id, $contenido){
		$result = "";
		foreach($array as $elemento){
				$result.="<option value='".$elemento[$id]."'>".$elemento[$contenido]."</option>";
		}
		return $result;
	}
?>
<ul id="appleNav">
    <li><a href="index.php" title="Inicio"><img src="../images/logo.png" alt="HEMOLAB" /></a></li>
    <li><a href="lista.php?accion=orden" title="Pacientes">Ordenes Pendientes</a></li>
    <li><a href="lista.php?accion=paciente" title="Analisis">Lista Pacientes</a></li>
    <li><a href="lista.php?accion=medico" title="Ordenes">Lista Medicos</a></li>
    <li>
    <form>
        <select id="select2orden" style="width:90%;">
        	<optgroup label="Ordenes Registradas">
        		<?php echo crearListaOrden($ordenes, 'IDORDEN', 'FECHAPEDIDO');?>
            </optgroup>
            <optgroup label="Ordenes Terminadas">
        		<?php echo crearListaOrden($terminadas, 'IDORDEN', 'FECHAPEDIDO');?>
            </optgroup>

        </select>
    </form>
    </li>
</ul>
<style>
	.select2-choice span{
		display: table;
		color: rgb(0,0,0);
		text-shadow: none;
		margin:0px;
		padding:0px;
	}
	.select2-choice span img{
		display: table-cell;
		display: none;	
	}
</style>
<script>
	$(document).ready(function() {
		var estado = -1;
		function format(state) {
			if (!state.id) {
				estado++;
				if (estado >=2){
					estado = 0;	
				}
				return state.text; // optgroup
			}
			if (estado == 0)
				return "<img width='16px' height='16px' src='../images/registrado.png'/>" + state.text;
			if (estado == 1)
				return "<img width='16px' height='16px' src='../images/terminado.png'/>" + state.text;
		}
		function formatTitulo(state) {
			return "Ordenes";
		}
		$("#select2orden").select2({
			placeholder: "Ordenes Registrados",
			formatResult: format,
			formatSelection: formatTitulo,
			escapeMarkup: function(m) { return m; }
		});
	});
	
	//$(document).ready(function() { $("#select2orden").select2(); });
</script>
