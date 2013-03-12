<?php
class proveedor
{
		function nuevo(){
			$template= new template;
			$template ->SetTemplate("tpl/formulario_proveedor.html");
			$template ->SetParameter("Titulo","Registrar Proveedor");
			$template -> SetParameter('nombre','');
			$template -> SetParameter('direccion','');
			$template -> SetParameter('telefono','');
			$template -> SetParameter('descripcion','');
			$template -> SetParameter('accion','guardarNuevo');
			return $template -> Display();
		}
			function editar(){
		$query = new query;
		$template = new template;
		$template -> SetTemplate("tpl/formulario_proveedor.html");
		$template -> SetParameter("Titulo","Modificar Proveedor");
		$usuario = $query->getRow("*","proveedor","where idproveedor = ".$_GET['id']);
		$template -> SetParameter('nombre',$usuario['nombreproveedor']);
		$template -> SetParameter('direccion',$usuario['direccionproveedor']);
		$template -> SetParameter('telefono',$usuario['telefonoproveedor']);
		$template -> SetParameter('descripcion',$usuario['descripcionproveedor']);
		$template -> SetParameter('accion','guardarEditar&id='.$_GET['id']);
		return $template->Display();
	}
		function guardarNuevo(){
			$query= new query;
			$arreglo["nombreproveedor"]=$_POST['nombre_proveedor'];
			$arreglo["direccionproveedor"]=$_POST['direccion_proveedor'];
			$arreglo["telefonoproveedor"]=$_POST['telefono_proveedor'];
			$arreglo["descripcionproveedor"]=$_POST['descripcion_proveedor'];
			if($query->dbInsert($arreglo,"proveedor")){
				echo"<script>alert('Datos Registrados Correctamente');</script>";
			}else{
				echo"<script>alert('Error al Registrar los Datos');</script>";
			}
			echo"<script>window.location.href='proveedor.php'</script>";
		}
		function guardarEditar(){
		$query = new query;
			$arreglo["nombreproveedor"]=$_POST['nombre_proveedor'];
			$arreglo["direccionproveedor"]=$_POST['direccion_proveedor'];
			$arreglo["telefonoproveedor"]=$_POST['telefono_proveedor'];
			$arreglo["descripcionproveedor"]=$_POST['descripcion_proveedor'];
		 if($query->dbUpdate($arreglo,"proveedor","where idproveedor=".$_GET['id'])){
			echo "<script>alert('Datos modificados correctamente');</script>";
		}else{
			echo "<script>alert('Error al modificar los datos');</script>";
		}
		echo "<script>window.location.href='proveedor.php'</script>";
	}
	function eliminar(){
		$query = new query;
		if($query->dbDelete("proveedor","where idproveedor=".$_GET['id'])){
			echo "<script>alert('Datos eliminados correctamente');</script>";
		}else{
			echo "<script>alert('Error al eliminar los datos');</script>";
		}
		echo "<script>window.location.href='proveedor.php'</script>";
	}
		function Listaproveedor() {
		$template= new template;
		$query=new query;
		$template ->SetTemplate("tpl/lista_proveedor.html");
		$template ->SetParameter("Titulo","Lista de Proveedores");
		$tabla="";
		$proveedores= $query-> getRows("*","proveedor");
		if(count($proveedores)>0){
			$tabla .="<table border='l'>
					<tr>
						<td class='cb_tbl'>Nombre Proveedor</td>
						<td class='cb_tbl'>Direccion Proveedor</td>
						<td class='cb_tbl'>Telefono Proveedor</td>
						<td class='cb_tbl'>Descripcion Proveedor</td>
						<td class='cb_tbl'>Editar</td>
						<td class='cb_tbl'>Eliminar</td>
					</tr>";
			foreach($proveedores as $key => $valor){
			$tabla .= '<tr>
							<td>'.$valor['nombreproveedor'].'</td>
							<td>'.$valor['direccionproveedor'].'</td>
							<td>'.$valor['telefonoproveedor'].'</td>
							<td>'.$valor['descripcionproveedor'].'</td>
							<td><a href="#" onclick="ajax(\'cont_ajax\',\'proveedor.php?action=editar&id='.$valor['idproveedor'].'\',\'\'); return false;"><img src="images/edit.png" /></a></td>
							<td><a onclick="return confirm(\'Estas seguro de eliminar los datos?\');" href="proveedor.php?action=eliminar&id='.$valor['idproveedor'].'"><img src="images/delet.png" /></a></td>
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
			if($_SESSION['tipousuario']==0){//administrador
				$template ->SetParameter("menu_sidebar",$this-> menuAdmin());
				$template ->SetParameter("contenido",$this-> Listaproveedor());
				}
			elseif($_SESSION['tipousuario']==1){ //secretaria
			$template ->SetParameter("menu_sidebar",$this->menuSecr());
			$template ->SetParameter("contenido","UD. no tiene privilegios  a este módulo");
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