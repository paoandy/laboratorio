<!DOCTYPE html>

<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SLCHL</title>
<link rel="stylesheet" href="style/default.css" type="text/css"/>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="lib/zebra/public/javascript/zebra_form.js"></script>
<script type="text/javascript" src="scripts/ajax.js"></script>
</head>
<body>
<div id="page">
		<div id="header">
    	<div id="logo">
			<img src="images/logo1.jpg" id="img_logo" />
		</div>
    </div>
	<div id="menu">
		<ul id="main_nav">
			[menu]
		</div>
    <div id="content">
		<div id="side_bar">
			[login_form]
			<ul id="main_sidebar">
			[menusidebar]	
			</ul>
        </div>
        <div id="main_content">
			<? include 'tpl/formulario_analisis.php';?> 
        </div>
    </div>
    <div id="footer">
    </div>
</div>
</body>
</html>
