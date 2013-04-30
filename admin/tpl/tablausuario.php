<?php
    $titulos = array();
    $filas = array();

    $query = new query;

    switch($accion){
        case 'usuarios':
            $titulos = array('ID', 'NOMBRE','APELLIDO','DNI','TELEFONO','LOGIN');
            $filas = $query->getRowsArray('IDUSUARIO, NOMBRE,APELLIDO,CI,TELEFONO,LOGIN','USUARIO');
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
