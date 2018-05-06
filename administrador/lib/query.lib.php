<?php
  class query {
    var $_cfg;

    function _error($DB_LINK) {
      if (!$DB_LINK) {
        die("Connection failed: " . mysqli_connect_error());
      }

      if (!$DB_LINK) {
        echo mysqli_connect_errno() . PHP_EOL;
        echo "PHP Version: ". phpversion();
        exit;
      }
    }
    
    function makequery($sql) {
			$_cfg['host'] = '127.0.0.1';
			$_cfg['user'] = 'root';
			$_cfg['pass'] = 'diegolanda';
			$_cfg['db'] = 'laboratorio';

      $DB_LINK = mysqli_connect($_cfg['host'],$_cfg['user'],$_cfg['pass'], $_cfg['db']);

      $this->_error($DB_LINK);

      $result = $DB_LINK->query($sql);

      if(!$result)
      {
        echo '<center>';
        echo '<div style="border: 1px solid #0253b8; font: 12px verdana; width: 700px; margin: 0 auto; color: #0253b8; background-color: #EFEFEF; clear: both;">';
        echo "<div style=\"border-bottom: 1px solid #0253b8; padding: 10px;\" align=\"left\"><strong>Error:</strong><br>".mysqli_error($DB_LINK)."</div>";
        echo "<div style=\"background-color: #EAEAEA; padding: 10px;\" align=\"left\">{$sql}</div>";
        echo '</div>';
        echo '</center>';			
        exit();
      }
      
      $DB_LINK->close();

      return $result;
    }
    
    function makemulti($sql) {
      $_cfg['host'] = '127.0.0.1';
			$_cfg['user'] = 'root';
			$_cfg['pass'] = 'diegolanda';
			$_cfg['db'] = 'laboratorio';

      $DB_LINK = mysqli_connect($_cfg['host'],$_cfg['user'],$_cfg['pass'], $_cfg['db']);

      $this->_error($DB_LINK);

      $result = $DB_LINK->multi_query($sql);

      if(!$result)
      {
        echo '<center>';
        echo '<div style="border: 1px solid #0253b8; font: 12px verdana; width: 700px; margin: 0 auto; color: #0253b8; background-color: #EFEFEF; clear: both;">';
        echo "<div style=\"border-bottom: 1px solid #0253b8; padding: 10px;\" align=\"left\"><strong>Error:</strong><br>".mysqli_error($DB_LINK)."</div>";
        echo "<div style=\"background-color: #EAEAEA; padding: 10px;\" align=\"left\">{$sql}</div>";
        echo '</div>';
        echo '</center>';			
        exit();
      }

      return $DB_LINK;
    }

    function makeTransaction($sql) {
      $_cfg['host'] = '127.0.0.1';
			$_cfg['user'] = 'root';
			$_cfg['pass'] = 'diegolanda';
			$_cfg['db'] = 'laboratorio';

      $DB_LINK = mysqli_connect($_cfg['host'],$_cfg['user'],$_cfg['pass'], $_cfg['db']);

      $this->_error($DB_LINK);
      
      $DB_LINK->autocommit(FALSE);

      $i = 0;
      $bandera = true;
      do{
        if(!$DB_LINK->query($sql[$i])) {
          $bandera = false;
          break;
        }
        $i++;
      }while(next($sql) != false);

      if (!$bandera) {
        $DB_LINK->rollback();
        $DB_LINK->close();

        return false;
      }

      $DB_LINK->commit();
      $DB_LINK->close();

      return true;
		}
		
		function siguiente($columna,$tabla){
			$sql = "SELECT COUNT('".$columna."') AS TOTAL FROM ".$tabla;
			$resultado = $this->makequery($sql);
			
			if ($row = mysqli_fetch_assoc($resultado) ){
				return $row['TOTAL'];
			} else {
				return 0;
			}
		}

		function getRowsArray($type, $sql, $sql_sub = '') {
			//recibe los valores a ser seleccionados, la tabla y las condiciones, retorna un array bidimensional con los resultados obtenidos
			$sql2 = 'SELECT '.$type.' FROM '.$sql.' '.$sql_sub;
			$row = array();
			$query = $this->makequery($sql2);

			while($temp = mysqli_fetch_assoc($query))
				$row[] = $temp;
			return $row;
		}
	
		function getRows($type, $sql, $sql_sub = '') {
			//recibe los valores a ser seleccionados, la tabla y las condiciones, retorna un array bidimensional con los resultados obtenidos
			$sql2 = 'SELECT '.$type.' FROM '.$sql.' '.$sql_sub;
			$row = array();
			$query = $this->makequery($sql2);
			
			return $query;
		}
	
		function getRow($type, $sql, $sql_sub = '') {
			// recibe los valores a ser seleccionados, la tabla y las condiciones, retorna un array unidimensional con el primer resultado obtenido
			$sql2 = 'SELECT '.$type.' FROM '.$sql.' '.$sql_sub;
			$query = $this->makequery($sql2);
			$row = mysqli_fetch_assoc($query);
			return $row;
		}
	
		function dbInsert($insert,$table) {
			//recibe un array con los valores a ser insertados y el nombre de la tabla, retorna el indice de insercion.
			$cnt = count($insert);
			$sql = "INSERT INTO ".$table." (";
			$i = 0;
			foreach($insert as $key => $value)
			{
				$i++;
				$sql .= ($cnt != $i) ? "`$key`," : "`$key`) VALUES (";
			}
			$i = 0;
			foreach($insert as $key=>$value)
			{
				$i++;
				if($value == "NOW()")
					$val2 = "NOW()";
				else
					$val2 = "'{$value}'";
				$sql .= ($cnt != $i) ? "'{$value}', " : "$val2)";
			}
			$this->makequery($sql);
			return intval(mysqli_insert_id());
		}
	
		function dbUpdate($update,$table,$sql_sub = '') {
			//recibe un array con los valores a ser actualizados, el nombre de la tabla y las condiciones
			$cnt = count($update);
			$sql = "UPDATE ".$table." SET ";
			$i = 0;
			foreach($update as $key => $value)
			{
				$i++;
				if($value == "NOW()")
					$val2 = "NOW()";
				else
					$val2 = "'{$value}'";
				$sql .= ($cnt != $i) ? "`$key` = '$value', " : "`$key` = $val2 ";
			}
			$sql .= $sql_sub;
			$this->makequery($sql);
			return true;
		}
	
		function dbDelete($table,$sql_sub) {
			//recibe el nombre de la tabla y las condiciones
			$sql = "DELETE FROM ".$table." ".$sql_sub;
			$this->makequery($sql);
			return true;
		}
  }
?>
