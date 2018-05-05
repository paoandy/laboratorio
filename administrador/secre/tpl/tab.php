<?php
    $titulos = array();
    $filas = array();
    $resultado = false;

    $query = new query;

    switch($accion){
      
	case 'cobro':
            $titulos = array('ID', 'Nombre Paciente','Orden','Recibo');
            $filas = $query->getRowsArray('IDCOBRO, CONCAT(paciente.NOMBRE,\' \',paciente.APELLIDO) AS NOMBRE, FECHAPEDIDO','cobro,orden,paciente','WHERE cobro.IDCOBRO = orden.IDORDEN AND orden.IDPACIENTE = paciente.IDPACIENTE');
            break;
	case 'resultado':
	    $resultado = true;
	    $titulos = array('ID', 'Nombre Paciente','Resultado');
            $filas = $query->getRowsArray('IDORDEN,CONCAT(paciente.NOMBRE,\' \',paciente.APELLIDO) AS NOMBRE','orden,paciente','WHERE orden.IDPACIENTE = paciente.IDPACIENTE AND ESTADO = 1');
            break;
    }
    //print_r($filas);
?>
<div class="tabla">
    <div class="fila">
        <?php
            foreach ( $titulos as $titulo ){
                echo "<div class='celda titulo'>".$titulo."</div>";
            }
        ?>
    </div>
    <?php
         foreach ($filas as $fila){
            echo "<div class='fila'>";
            $id = null;
            foreach ($fila as $celda){
                if ( $id == null ) $id = $celda;
                echo "<div class='celda'>".$celda."</div>";
            }
            echo "<div class='celda'>";
	    if ($resultado)
		echo "<a href='resultado.php?id=".$id."' target='_blank'><img src='../images/pdf.png'/></a>";
	    else
		echo "<a href='recibo.php?id=".$id."' target='_blank'><img src='../images/pdf.png'/></a>";
            echo "</div>";
	    echo "</div>";
        }
    ?>
</div>