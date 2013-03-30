<?php
class insumos
{
	function nuevo(){
			$template= new template;
			$template ->SetTemplate("tpl/formulario_insumos.html");
			$template ->SetParameter("Titulo","Registrar Insumos");
			$template -> SetParameter('nombre','');
			$template -> SetParameter('fecha','');
			$template -> SetParameter('cantidad','');
			$template -> SetParameter('descripcion','');
			$template -> SetParameter('costo','');
			$template -> SetParameter('accion','guardarNuevo');
			return $template -> Display();
		}
                
	function editar(){
		$query = new query;
		$template = new template;
		$template -> SetTemplate("tpl/formulario_insumos.html");
		$template -> SetParameter("Titulo","Modificar Insumos");
		$insumo = $query->getRow("*","detalle_insumo","where iddetalle = ".$_GET['id']);
		$template -> SetParameter('nombre',$insumo['nombredetalle']);
		$template -> SetParameter('fecha',$insumo['fechadetalle']);
		$template -> SetParameter('cantidad',$insumo['cantidaddetalle']);
		$template -> SetParameter('descripcion',$insumo['descripciondetalle']);
		$template -> SetParameter('costo',$insumo['costodetalle']);
		$template -> SetParameter('accion','guardarEditar&id='.$_GET['id']);
		return $template->Display();
	}
		function guardarNuevo(){
			$query= new query;
			$arreglo["nombredetalle"]=$_POST['nombre_insumo'];
			$arreglo["fechadetalle"]=$_POST['fecha_compra'];
			$arreglo["cantidaddetalle"]=$_POST['cantidad_insumo'];
			$arreglo["descripciondetalle"]=$_POST['descripcion_insumo'];
			$arreglo["costodetalle"]=$_POST['costo_insumo'];
			if($query->dbInsert($arreglo,"detalle_insumo")){
				echo"<script>alert('Insumos Registrados Correctamente');</script>";
			}else{
				echo"<script>alert('Error al Registrar los Datos');</script>";
			}
			echo"<script>window.location.href='insumos.php'</script>";
		}
				function guardarEditar(){
		$query = new query;
			$arreglo["nombredetalle"]=$_POST['nombre_insumo'];
			$arreglo["fechadetalle"]=$_POST['fecha_compra'];
			$arreglo["cantidaddetalle"]=$_POST['cantidad_insumo'];
			$arreglo["descripciondetalle"]=$_POST['descripcion_insumo'];
			$arreglo["costodetalle"]=$_POST['costo_insumo'];
			if($query->dbUpdate($arreglo,"detalle_insumo","where iddetalle=".$_GET['id'])){
			echo "<script>alert('Datos modificados correctamente');</script>";
		}else{
			echo "<script>alert('Error al modificar los datos');</script>";
		}
		echo "<script>window.location.href='insumos.php'</script>";
	}
	function eliminar(){
		$query = new query;
		if($query->dbDelete("detalle_insumo","where iddetalle=".$_GET['id'])){
			echo "<script>alert('Datos eliminados correctamente');</script>";
		}else{
			echo "<script>alert('Error al eliminar los datos');</script>";
		}
		echo "<script>window.location.href='insumos.php'</script>";
	}
	function Listainsumos() {
		$template= new template;
		$query=new query;
		$template ->SetTemplate("tpl/lista_insumos.html");
		$template ->SetParameter("Titulo","Lista de Insumos");
		$tabla="";
		$insumos= $query-> getRows("*","detalle_insumo");
		if(count($insumos)>0){
			$tabla .="<table border='l'>
					<tr>
						<td class='cb_tbl'>Nombre Insumo</td>	
						<td class='cb_tbl'>Fecha Compra Insumo</td>
						<td class='cb_tbl'>Cantidad Insumo</td>
						<td class='cb_tbl'>Descripcion Insumo</td>
						<td class='cb_tbl'>Costo Insumo</td>
						<td class='cb_tbl'>Editar</td>
						<td class='cb_tbl'>Eliminar</td>
					</tr>";
			foreach($insumos as $key => $valor){
				$tabla .= '<tr>
						<td>'.$valor['nombredetalle'].'</td>
						<td>'.$valor['fechadetalle'].'</td>
						<td>'.$valor['cantidaddetalle'].'</td>
						<td>'.$valor['descripciondetalle'].'</td>
						<td>'.$valor['costodetalle'].'</td>
							<td><a href="#" onclick="ajax(\'cont_ajax\',\'insumos.php?action=editar&id='.$valor['iddetalle'].'\',\'\'); return false;"><img src="images/edit.png" /></a></td>
							<td><a onclick="return confirm(\'Estas seguro de eliminar los datos?\');" href="insumos.php?action=eliminar&id='.$valor['iddetalle'].'"><img src="images/delet.png" /></a></td>
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
		function menuAdmin(){
		$template= new template;
		$template ->SetTemplate("tpl/menu_admin.html");
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
			if($_SESSION['tipousuario']==0){//ministrador
				$template ->SetParameter("menu_sidebar",$this-> menuAdmin());
				$template ->SetParameter("contenido",$this-> Listainsumos());
				}
			elseif($_SESSION['tipo']==1){
			$template ->SetParameter("menu_sidebar",$this->menuSecr());
			$template ->SetParameter("contenido","no tiene permisos para este módulo");
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