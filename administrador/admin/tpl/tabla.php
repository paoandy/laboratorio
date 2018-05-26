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

<div class="table-responsive table--no-card m-b-30">
    <table class="table table-borderless table-striped table-earning">
        <thead>
            <tr>
                <?php
                    foreach ( $titulos as $titulo ){
                        echo "<th>".$titulo."</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($filas as $fila){
                    echo "<tr>";
                        $id = null;
                        foreach ($fila as $celda){
                            if ( $id == null ) $id = $celda;
                            echo "<td>".$celda."</td>";
                        }
                        echo "<td class='celda'>";
                            echo "<a href='#?".$id."'><i class='fas fa-edit fa-2x'></i></a>";
                            echo "<a href='tpl/delete.php?id=".$id."&accion=".$accion."'><i class='fas fa-trash fa-2x' onclick='return confirm(\"Esta Seguro Que Desea Eliminar El Registro?\");'></i></a>";
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
