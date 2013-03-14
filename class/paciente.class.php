<?php
class paciente
{
		function nuevo(){
			$template= new template;
			$template ->SetTemplate("tpl/formulario_paciente.html");
			$template ->SetParameter("Titulo","Registrar Paciente");
			$template -> SetParameter('nombre','');
			$template -> SetParameter('edad','');
			$template -> SetParameter('sexo','');
			$template -> SetParameter('telefono','');
			$template -> SetParameter('descripcion','');
			$template -> SetParameter('accion','guardarNuevo');
			return $template -> Display();
		}
			function editar(){
		$query = new query;
		$template = new template;
		$template -> SetTemplate("tpl/formulario_paciente.html");
		$template -> SetParameter("Titulo","Modificar Paciente");
		$usuario = $query->getRow("*","paciente","where idpaciente = ".$_GET['id']);
		$template -> SetParameter('nombre',$usuario['nombrepaciente']);
		$template -> SetParameter('edad',$usuario['edadpaciente']);
		$template -> SetParameter('sexo',$usuario['sexopaciente']);
		$template -> SetParameter('telefono',$usuario['telefonopaciente']);
		$template -> SetParameter('descripcion',$usuario['descripcionpaciente']);
		$template -> SetParameter('accion','guardarEditar&id='.$_GET['id']);
		return $template->Display();
	}
		function guardarNuevo(){
			$query= new query;
			$arreglo["nombrepaciente"]=$_POST['nombre_paciente'];
			$arreglo["edadpaciente"]=$_POST['edad_paciente'];
			$arreglo["sexopaciente"]=$_POST['sexo_paciente'];
			$arreglo["telefonopaciente"]=$_POST['telefono_paciente'];
			$arreglo["descripcionpaciente"]=$_POST['descripcion_paciente'];
			if($query->dbInsert($arreglo,"paciente")){
				echo"<script>alert('Datos Registrados Correctamente');</script>";
			}else{
				echo"<script>alert('Error al Registrar los Datos');</script>";
			}
			echo"<script>window.location.href='paciente.php'</script>";
		}
		function guardarEditar(){
		$query = new query;
			$arreglo["nombrepaciente"]=$_POST['nombre_paciente'];
			$arreglo["edadpaciente"]=$_POST['edad_paciente'];
			$arreglo["sexopaciente"]=$_POST['sexo_paciente'];
			$arreglo["telefonopaciente"]=$_POST['telefono_paciente'];
			$arreglo["descripcionpaciente"]=$_POST['descripcion_paciente'];
			if($query->dbUpdate($arreglo,"paciente","where idpaciente=".$_GET['id'])){
			echo "<script>alert('Datos modificados correctamente');</script>";
		}else{
			echo "<script>alert('Error al modificar los datos');</script>";
		}
		echo "<script>window.location.href='paciente.php'</script>";
	}
	function eliminar(){
		$query = new query;
		if($query->dbDelete("paciente","where idpaciente=".$_GET['id'])){
			echo "<script>alert('Datos eliminados correctamente');</script>";
		}else{
			echo "<script>alert('Error al eliminar los datos');</script>";
		}
		echo "<script>window.location.href='paciente.php'</script>";
	}
		function Listapaciente() {
		$template= new template;
		$query=new query;
		$template ->SetTemplate("tpl/lista_paciente.html");
		$template ->SetParameter("Titulo","Lista de Pacientes");
		$tabla="";
		$pacientes= $query-> getRows("*","paciente");
		if(count($pacientes)>0){
			$tabla .="<table border='l'>
					<tr>
						<td class='cb_tbl'>Nombre Paciente</td>
						<td class='cb_tbl'>Edad Paciente</td>
						<td class='cb_tbl'>Sexo Paciente</td>
						<td class='cb_tbl'>Telefono Paciente</td>
						<td class='cb_tbl'>Descripcion Paciente</td>
						<td class='cb_tbl'>Editar</td>
						<td class='cb_tbl'>Eliminar</td>
					</tr>";
			foreach($pacientes as $key => $valor){
			$tabla .= '<tr>
							<td>'.$valor['nombrepaciente'].'</td>
							<td>'.$valor['edadpaciente'].'</td>
							<td>'.$valor['sexopaciente'].'</td>
							<td>'.$valor['telefonopaciente'].'</td>
							<td>'.$valor['descripcionpaciente'].'</td>
							<td><a href="#" onclick="ajax(\'cont_ajax\',\'paciente.php?action=editar&id='.$valor['idpaciente'].'\',\'\'); return false;"><img src="images/edit.png" /></a></td>
							<td><a onclick="return confirm(\'Estas seguro de eliminar los datos?\');" href="paciente.php?action=eliminar&id='.$valor['idpaciente'].'"><img src="images/delet.png" /></a></td>
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
			$template ->SetParameter("contenido",$this-> Listapaciente());
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