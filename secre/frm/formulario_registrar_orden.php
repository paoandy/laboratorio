<?php
    $query = new query;

    $pacientes = $query->getRowsArray('IDPACIENTE, NOMBRE', 'PACIENTE');
    print_r($pacientes);
    $medicos = $query->getRowsArray('*', 'MEDICO');
    $secciones = $query->getRowsArray('*', 'SECCION');

    $seccion = $query->getRowsArray('*','seccion, categoria', 'WHERE seccion.idseccion = categoria.idseccion ORDER BY seccion.nombreseccion, categoria.nombrecategoria');

    //print_r($_POST);
?>
<form action="registrarorden.php" method="post">
    <fieldset>
        <fieldset style="margin:20px; padding:20px;">
            <legend>Datos Paciente</legend>
            Paciente: <select name="IDPACIENTE"><?php crearLista($pacientes, 'IDPACIENTE', 'NOMBRE'); ?></select>
            Medico: <select name="IDMEDICO"><?php crearLista($medicos, 'IDMEDICO', 'NOMBRE'); ?></select>
            <input type="hidden" name="IDUSUARIO" value="<?php echo $_SESSION['idusuario'];?>" />
        </fieldset>
        <fieldset style="margin:20px; padding:20px; text-align: left; background: linear-gradient( 180deg, rgb(245,245,245) 25%, rgb(225,225,225), rgb(245,245,245) 75% ); border-radius:10px;">
            <legend>Datos Generales</legend>
            Registrado Por: <?php echo $_SESSION['login']; ?><br/>
            Fecha: <?php echo date('d/m/Y'); ?><br/>
            Descripcion:<br/><textarea name="DESCRIPCION" type="text" placeholder="Descripcion/Otros/Observaciones"></textarea>

            <fieldset style="margin:20px; padding:20px;">
            <legend>Analisis</legend>
            <?php

                foreach($secciones as $seccion){
                    echo "<fieldset style='float:left; width:auto; text-align:left; padding:20px; margin:10px;'>";
                    echo "<legend>".$seccion['NOMBRESECCION']."</legend>";
                    $categorias = $query->getRowsArray('*', 'CATEGORIA','WHERE IDSECCION='.$seccion['IDSECCION']);

                    echo "<ul style='list-style:none;'>";

                    foreach($categorias as $categoria){
                        echo "<li><input type='checkbox' name='categoria[]' value='".$categoria['IDCATEGORIA']."'/>".$categoria['NOMBRECATEGORIA']."</li>";
                    }
                    echo "</ul>";
                    echo "</fieldset>";
                }
            ?>
        </fieldset>
        </fieldset>
        <input type="submit" value="Registrar Orden"/>
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
