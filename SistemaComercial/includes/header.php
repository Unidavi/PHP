<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LinuxStok ERP</title>

<meta name="title" content="LinuxStok ERP" />
<meta name="description" content="" />
<meta name="keywords" content="" />

<meta name="author" content="COmunidade LinuxStok ERP" />   
<meta name="url" content="#" />
   
<meta name="language" content="pt-br" /> 
<meta name="robots" content="NOINDEX,NOFOLLOW" /> 
<link rel="icon" type="image/png" href="ico/chave.png" />
<link rel="stylesheet" type="text/css" href="css/painel.css" />
<link rel="stylesheet" type="text/css" href="css/geral.css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">



<script type="text/javascript" src="../js/jquery.js"></script>

<!-- TinyMCE -->
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="js/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "specific_textareas",
        editor_selector : "editor",
		language : "pt",
		theme : "advanced",
		elements : 'abshosturls',
		relative_urls : false,
		remove_script_host : false,
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",


		// Theme options
theme_advanced_buttons1 :"fullscreen,removeformat,cleanup,|,pastetext,pasteword,|,bold,italic,underline,strikethrough,|,forecolor,backcolor,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,anchor,image",
		theme_advanced_buttons2 : "undo,redo,|,formatselect,fontsizeselect,|,outdent,indent,ltr,rtl,blockquote,sub,sup,hr,|,preview,print,code,|,insertdate,inserttime",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "center",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		file_browser_callback : "tinyBrowser",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->



</head>
<body>
<?php
    include_once("seguranca.php");
    protegePagina();

    require('funcoes/dadosSis.php');
    $link = mysqli_connect(HOST, USER, PASS, BASE);
    //$PegaUsuarioSession = $_SESSION['usuarioLogin'];
    $PegaUsuario = 'admin';   
    $SelecionaUsuario = mysqli_query($link, "SELECT * FROM usuarios WHERE usuario = '$PegaUsuario'");
    while($ResultadoUsuario = mysqli_fetch_array($SelecionaUsuario)){
            $IdUsuario 		= $ResultadoUsuario['id'];
            $NomeUsuario 	= $ResultadoUsuario['nome'];
            $LoginUsuario 	= $ResultadoUsuario['usuario'];
            $SenhaUsuario 	= $ResultadoUsuario['senha'];
            $NivelUsuario   = $ResultadoUsuario['nivel'];
    }
    $GerarNumero = rand(9,999999999999999999);
    $DataHoje	 = date('Y-m-d');	
?>
<div id="painel">
	<div id="header">
    	<img src="images/login-logo.png" alt="Site Admin" title="Site Admin" width="300"/>
        
        	<div class="coom">
                <a href="index2.php" title="painel home" class="btnalt">painel home</a>
                <a href="MudarSenha.php" title="configurações" class="btnalt">configurações</a>
                <a href="sair.php" title="deslogar" class="btnalt">deslogar</a>
        	</div><!-- /comm -->
    </div><!-- /header -->
