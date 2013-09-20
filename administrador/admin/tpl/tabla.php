<?php
    $titulos = array();
    $filas = array();

    $query = new query;

    switch($accion){
        case 'analisis':
            $titulos = array('ID', 'Nombre', 'Operaciones');
            $filas = $query->getRowsArray('*','seccion');
            break;
        case 'categoria':
            $titulos = array('ID','Nombre','Costo','Descripcion', 'Operaciones');
            $filas = $query->getRowsArray('IDCATEGORIA,NOMBRECATEGORIA,COSTO,DESCRIPCIONCATEGORIA','categoria');
            break;
        case 'paciente':
            $titulos = array('ID', 'Nombre', 'Edad', 'Telefono', 'Operaciones' );
            $filas = $query->getRowsArray('IDPACIENTE, NOMBRE, EDAD, TELEFONO','paciente');
            break;
		case 'medico':
            $titulos = array('ID', 'Nombre', 'Edad', 'Telefono', 'Operaciones' );
            $filas = $query->getRowsArray('IDMEDICO, NOMBRE, EMAIL, TELEFONO','medico');
            break;
        case 'usuarios':
            $titulos = array('ID', 'Nombre','Apellido','DNI','Telefono','Email','Login', 'Operaciones');
            $filas = $query->getRowsArray('IDUSUARIO, NOMBRE,APELLIDO,CI,TELEFONO,EMAIL,LOGIN','usuario');
            break;
        case 'proveedor':
            $titulos = array('ID', 'Nombre','Direccion','Email','Telefono','Descripcion', 'Operaciones');
            $filas = $query->getRowsArray('IDPROVEEDOR, NOMBRE,DIRECCION,EMAIL,TELEFONO,DESCRIPCION','proveedor');
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
            echo "<a href='#?".$id."'><img src='../images/edit.png'/></a>".
				  "<a href='tpl/delete.php?id=".$id."&accion=".$accion."'><img src='../images/delete.png'/ onclick='return confirm(\"Esta Seguro Que Desea Eliminar El Registro?\");'></a>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</div>
