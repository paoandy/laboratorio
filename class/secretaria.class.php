<?php
class secretaria
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
    
	function salir(){
		session_destroy();
		echo"<script>window.location.href='index.php'</script>";
	}
	function menuPrincipal(){
		$template = new template;
		$template -> SetTemplate("tpl/menu_princ.html");
		return $template -> Display();
	}
		function menuSecretaria(){
		$template = new template;
		$template -> SetTemplate("tpl/menu_secr.html");
		return $template -> Display();
	}

	function Display()
	{
		$template = new template;// template permite contruir la interfaz de usuario
		$template->SetTemplate('tpl/administrador.html'); //sets the template for this function
		//$var = "contenido de la variable";
		$template ->SetParameter("titulo","SLC Secretaria");
		$template->SetParameter("menu",$this->menuPrincipal());
		$template->SetParameter("menusidebar",$this->menuSecretaria());
		$template->SetParameter("contenido","bla alsbndlasl;d");
		
		return $template->Display();
	}
}
?>