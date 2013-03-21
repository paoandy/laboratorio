<?php
class index
{
    function showContent()
	{
		$template = new template;
		$template->SetTemplate('tpl/index_content.html');
        $varMoreContent = 'Sample to Ajax popup!!! <br />';
        $varMoreContent .= 'click <a href="#" onclick="ajax(\'popup\',\'index.php?action=viewPopUp\',\'\'); return false;">here</a>';
        $template->SetParameter('moreContent',$varMoreContent);
		return $template->Display();
	}
    
    function viewPopUp()
    {
        $viewer = "<div>I'm a ajax popup <br /> click <a href=\"#\" onclick=\"closeajax('popup'); return false;\" >HERE</a> to close</div>";
        return "<div>".$viewer."</div>";
    }
    
	function logear()
	{
		$login = $_POST['login'];
		$pass = $_POST['password'];
		$libLogin =new login;
		$idusuario = $libLogin -> validate($login,$pass);
		if($idusuario == false){
			$_SESSION=0;
			echo"<script>window.location.href='index.php?action=error'</script>";
			//header("Location:");
		} else{
		    // Tipo de Usuario
		    // 0 -> Administrador
		    // 1 -> Secretaria
		    // 2 -> Tecnico
		    $libLogin -> loginUser($idusuario);
		    
		    switch($_SESSION['tipousuario']){
			case 0:
			    header("Location:index.php?action=administrador");
			    break;
			case 1:
			    header("Location:index.php?action=secretaria");
			    break;
			case 2:
			    header("Location:index.php?action=tecnico");
			    break;
		    }
		}
	}
	function salir(){
		session_destroy();
		echo"<script>window.location.href='index.php'</script>";
	}
	function formLogin(){
		$template= new template;
		$template ->SetTemplate("tpl/form_login.html");
		return $template -> Display();	
	}
	function menuPrincipal(){
		$template = new template;
		$template -> SetTemplate("tpl/menu_princ.html");
		return $template -> Display();
	}
	

	function Display()
	{
		$template = new template;// template permite contruir la interfaz de usuario
	    
		//if (isset($_SESSION['logged']))
		    $template->SetTemplate('tpl/index.html'); //sets the template for this function
		
		$var = "contenido de la variable";
		//$template ->SetParameter("contenido",$this ->showContent());
		$template->SetParameter("menu",$this->menuPrincipal());
		$template ->SetParameter("titulo","SLCHLB");
		//echo $_SESSION['logged'];
		if(!isset($_SESSION['logged']))
			$_SESSION['logged']=0;
		if($_SESSION ['logged']==1){
			$template ->SetParameter("login_form","<h5>USUARIO:".$_SESSION['nombreusuario']."</h5>");
			if($_SESSION['tipousuario']==0)//administrador
				$template->SetTemplate('tpl/administrador.html');
			else
			if($_SESSION['tipousuario']==1)//secretaria
				$template->SetTemplate('tpl/secretaria.html');
			elseif($_SESSION['tipousuario']==2)//tecnico
				$template->SetTemplate('tpl/tecnico.html');	
		}
		elseif($_SESSION['logged']==0){	
			$template ->SetParameter("login_form",$this ->formLogin());
			$template ->SetParameter("menu_sidebar","");
		}
		 return $template->Display();
	}
}
?>