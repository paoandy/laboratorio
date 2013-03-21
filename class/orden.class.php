<?php
class orden
{
		function nuevo(){
			$template= new template;
			$template ->SetTemplate("tpl/orden_analisis.html");
			$template ->SetParameter("Titulo","Registrar Orden");
			$template -> SetParameter('fecha','');
			$template -> SetParameter('material','');
			$template -> SetParameter('descripcion','');
			$template -> SetParameter('accion','guardarNuevo');
			return $template -> Display();
		}
			function editar(){
		$query = new query;
		$template = new template;
		$template -> SetTemplate("tpl/orden_analisis.html");
		$template -> SetParameter("Titulo","Modificar Orden");
		$ordenanalisis = $query->getRow("*","orden_analisis","where idorden = ".$_GET['id']);
		$template -> SetParameter('fecha',$ordenanalisis['fechaorden']);
		$template -> SetParameter('material',$ordenanalisis['material']);
		$template -> SetParameter('material',$ordenanalisis['descripcionorden']);
		$template -> SetParameter('accion','guardarEditar&id='.$_GET['id']);
		return $template->Display();
	}
		function guardarNuevo(){
			$query= new query;
			$arreglo["fechaorden"]=$_POST['fecha_orden'];
			$arreglo["material"]=$_POST['material'];
			$arreglo["descripcionorden"]=$_POST['descripcion_orden'];
			if($query->dbInsert($arreglo,"orden_analisis")){
				echo"<script>alert('Datos Registrados Correctamente');</script>";
			}else{
				echo"<script>alert('Error al Registrar los Datos');</script>";
			}
			echo"<script>window.location.href='orden.php'</script>";
		}
		function guardarEditar(){
		$query = new query;
			$arreglo["fechaorden"]=$_POST['fecha_orden'];
			$arreglo["material"]=$_POST['material'];
			$arreglo["descripcionorden"]=$_POST['descripcion_orden'];
			if($query->dbUpdate($arreglo,"orden_analisis","where idorden=".$_GET['id'])){
			echo "<script>alert('Datos modificados correctamente');</script>";
		}else{
			echo "<script>alert('Error al modificar los datos');</script>";
		}
		echo "<script>window.location.href='orden.php'</script>";
	}
	function eliminar(){
		$query = new query;
		if($query->dbDelete("orden_analisis","where idorden=".$_GET['id'])){
			echo "<script>alert('Datos eliminados correctamente');</script>";
		}else{
			echo "<script>alert('Error al eliminar los datos');</script>";
		}
		echo "<script>window.location.href='orden.php'</script>";
	}
		function Listaorden() {
		$template= new template;
		$query=new query;
		$template ->SetTemplate("tpl/lista_orden.html");
		$template ->SetParameter("Titulo","Lista de Ordenes");
		$tabla="";
		$ordenes= $query-> getRows("*","orden_analisis");
		if(count($ordenes)>0){
			$tabla .="<table border='l'>
					<tr>
						<td class='cb_tbl'>Fecha de Orden</td>
						<td class='cb_tbl'>Material</td>
						<td class='cb_tbl'>Descripcion de Orden</td>
						<td class='cb_tbl'>Editar</td>
						<td class='cb_tbl'>Eliminar</td>
					</tr>";
			foreach($ordenes as $key => $valor){
			$tabla .= '<tr>
							<td>'.$valor['fechaorden'].'</td>
							<td>'.$valor['material'].'</td>
							<td>'.$valor['descripcionorden'].'</td>
							<td><a href="#" onclick="ajax(\'cont_ajax\',\'orden.php?action=editar&id='.$valor['idorden'].'\',\'\'); return false;"><img src="images/edit.png" /></a></td>
							<td><a onclick="return confirm(\'Estas seguro de eliminar los datos?\');" href="orden.php?action=eliminar&id='.$valor['idorden'].'"><img src="images/delet.png" /></a></td>
						</tr>';
			}
			$tabla .="</table>";
		}else{
			$tabla="no existe datos Registrados";
		}
		$template ->SetParameter("Tabla",$tabla);
		return $template -> Display();
	}
	    function formLogin(){
		$template= new template;
		$template ->SetTemplate("tpl/form_login.html");
		return $template -> Display();
		
	}
		function menuSecr(){
		$template= new template;
		$template ->SetTemplate("tpl/menu_secr.html");
		return $template -> Display();
		
	}
	function Display()
	{
		$template = new template;// template permite contruir la interfaz de usuario
		$template->SetTemplate('tpl/index.html'); //sets the template for this function
		$var = "contenido de la variable";
		$template ->SetParameter("titulo","REGISTROS");
		IF(!isset($_SESSION['logged']))
			$_SESSION['logged']=0;
		if($_SESSION ['logged']==1){
		$template ->SetParameter("login_form","<h4>USUARIO:".$_SESSION['nombreusuario']."</h4>");
			if($_SESSION['tipousuario']==1){ //secretaria
			$template ->SetParameter("menu_sidebar",$this->menuSecr());
			$template ->SetParameter("contenido",$this-> Listaorden());
			}
		}
		elseif($_SESSION['logged']==0){	
			$template ->SetParameter("login_form",$this ->formLogin());
			$template ->SetParameter("menu_sidebar","");
			$template ->SetParameter("contenido","inicie session para entrar a este modulo");
		}	
		return $template->Display();
	}
}
?>