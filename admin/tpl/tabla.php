<?php
    $titulos = array();
    $filas = array();

    $query = new query;

    switch($accion){
        case 'analisis':
            $titulos = array('ID', 'Nombre', 'Operaciones');
            $filas = $query->getRowsArray('*','SECCION');
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
            echo "<a href='#?".$id."'><img src='../images/edit.png'/></a><a href='#?".$id."'><img src='../images/delete.png'/></a>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</div>
