<?php
    $titulos = array();
    $filas = array();

    $query = new query;

    switch($accion){
        case 'paciente':
            $titulos = array('ID', 'Nombre','Apellido', 'Edad', 'Telefono' );
            $filas = $query->getRowsArray('idpaciente, nombre, apellido, edad, telefono','paciente');
            break;
	case 'medico':
            $titulos = array('ID', 'Nombre', 'Email', 'Telefono' );
            $filas = $query->getRowsArray('idmedico, nombre, email, telefono','medico');
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
            echo "</div>";
        }
    ?>
</div>
