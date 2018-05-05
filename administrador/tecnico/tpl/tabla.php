<?php
    $titulos = array();
    $filas = array();

    $query = new query;
	
	$especial = false;
	$opciones = false;
	
	$columna = -1;

    switch($accion){
        case 'paciente':
            $titulos = array('ID', 'Nombre', 'Edad', 'Telefono' );
            $filas = $query->getRowsArray('IDPACIENTE, NOMBRE, EDAD, TELEFONO','paciente');
            break;
		case 'medico':
            $titulos = array('ID', 'Nombre', 'Email', 'Telefono' );
            $filas = $query->getRowsArray('IDMEDICO, NOMBRE, EMAIL, TELEFONO','medico');
            break;
		case 'orden':
            $titulos = array('ID', 'Fecha', 'Estado', 'Descripcion', 'Material');
            $filas = $query->getRowsArray('IDORDEN, FECHAPEDIDO, ESTADO, DESCRIPCIONORDEN, MATERIAL','orden','ORDER BY ESTADO ASC');
			$especial = true;
			$columna = 2;
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
			$aux = 0;
            echo "<div class='fila'>";
            $id = null;
            foreach ($fila as $celda){
				if ( $especial == true && $aux == $columna){
					if ( $id == null ) $id = $celda;
					echo "<div class='celda'>".formatear($celda)."</div>";
				}
				else {
					if ( $id == null ) $id = $celda;
					echo "<div class='celda'>".$celda."</div>";
				}
			
				$aux++;
            }
            echo "</div>";
        }
		
		function formatear($celda){
			switch($celda){
				case 0:
					return "<img src='../images/registrado.png'/> Registrado";
					break;
				case 1:
					return "<img src='../images/terminado.png'/> Terminado";
					break;
				case 2:
					return "<img src='../images/despachado.png'/> Despachado";
					break;	
			}
		}
    ?>
</div>
