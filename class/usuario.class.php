<?php
class usuario
{
		function nuevo(){
			$template= new template;
			$template ->SetTemplate("tpl/formulario_usuario.html");
			$template ->SetParameter("Titulo","Registrar Usuario");
			$template -> SetParameter('nombre','');
			$template -> SetParameter('ci','');
			$template -> SetParameter('telefono','');
			$template -> SetParameter('login','');
			$template -> SetParameter('password','');
			$template -> SetParameter('tipo','');
			$template -> SetParameter('accion','guardarNuevo');
			return $template -> Display();
		}
		function editar(){
		$query = new query;
		$template = new template;
		$template -> SetTemplate("tpl/formulario_usuario.html");
		$template -> SetParameter("Titulo","Modificar Usuario");
		$usuario = $query->getRow("*","usuario","where idusuario = ".$_GET['id']);
		$template -> SetParameter('nombre',$usuario['nombreusuario']);
		$template -> SetParameter('ci',$usuario['ciusuario']);
		$template -> SetParameter('telefono',$usuario['telefonousuario']);
		$template -> SetParameter('login',$usuario['login']);
		$template -> SetParameter('password',$usuario['password']);
		$template -> SetParameter('tipo',$usuario['tipousuario']);
		$template -> SetParameter('accion','guardarEditar&id='.$_GET['id']);
		return $template->Display();
	}
		function guardarNuevo(){
			$query= new query;
			$arreglo["nombreusuario"]=$_POST['nombre_usuario'];
			$arreglo["ciusuario"]=$_POST['ci_usuario'];
			$arreglo["telefonousuario"]=$_POST['telefono_usuario'];
			$arreglo["login"]=$_POST['login_usuario'];
			$arreglo["password"]=$_POST['password_usuario'];
			$arreglo["tipousuario"]=$_POST['tipo_usuario'];
			
			if($query->dbInsert($arreglo,"usuario")){
				echo"<script>alert('Usuario Registrados Correctamente');</script>";
			}else{
				echo"<script>alert('Error al Registrar los Datos');</script>";
			}
			echo"<script>window.location.href='usuario.php'</script>";
		}
			function guardarEditar(){
		$query = new query;
			$arreglo["nombreusuario"]=$_POST['nombre_usuario'];
			$arreglo["ciusuario"]=$_POST['ci_usuario'];
			$arreglo["telefonousuario"]=$_POST['telefono_usuario'];
			$arreglo["login"]=$_POST['login_usuario'];
			$arreglo["password"]=$_POST['password_usuario'];
			$arreglo["tipousuario"]=$_POST['tipo_usuario'];
		 if($query->dbUpdate($arreglo,"usuario","where idusuario=".$_GET['id'])){
			echo "<script>alert('Datos modificados correctamente');</script>";
		}else{
			echo "<script>alert('Error al modificar los datos');</script>";
		}
		echo "<script>window.location.href='usuario.php'</script>";
	}
	function eliminar(){
		$query = new query;
		if($query->dbDelete("usuario","where idusuario=".$_GET['id'])){
			echo "<script>alert('Datos eliminados correctamente');</script>";
		}else{
			echo "<script>alert('Error al eliminar los datos');</script>";
		}
		echo "<script>window.location.href='usuario.php'</script>";
	}
		function Listausuario() {
		$template= new template;
		$query=new query;
		$template ->SetTemplate("tpl/lista_usuario.html");
		$template ->SetParameter("Titulo","Lista de Usuarios");
		$tabla="";
		$usuarios= $query-> getRows("*","usuario");
		if(count($usuarios)>0){
			$tabla .="<table border='l'>
					<tr>
						<td class='cb_tbl'>Nombre Usuario</td>
						<td class='cb_tbl'>CI Usuario</td>
						<td class='cb_tbl'>Telefono Usuario</td>
						<td class='cb_tbl'>Login Usuario</td>
						<td class='cb_tbl'>Tipo Usuario</td>
						<td class='cb_tbl'>Editar</td>
						<td class='cb_tbl'>Eliminar</td>
					</tr>";
			foreach($usuarios as $key => $valor){
				$tabla .= '<tr>
							<td>'.$valor['nombreusuario'].'</td>
							<td>'.$valor['ciusuario'].'</td>
							<td>'.$valor['telefonousuario'].'</td>
							<td>'.$valor['login'].'</td>
							<td>'.$valor['tipousuario'].'</td>
							<td><a href="#" onclick="ajax(\'cont_ajax\',\'usuario.php?action=editar&id='.$valor['idusuario'].'\',\'\'); return false;"><img src="images/edit.png" /></a></td>
							<td><a onclick="return confirm(\'Estas seguro de eliminar los datos?\');" href="usuario.php?action=eliminar&id='.$valor['idusuario'].'"><img src="images/delet.png" /></a></td>
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
				$template ->SetParameter("contenido",$this-> Listausuario());
				}
			elseif($_SESSION['tipo']==1){ //secretaria
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