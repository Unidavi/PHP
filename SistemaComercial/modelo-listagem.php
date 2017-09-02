<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Marques Igrejas - Sistema de Gerenciamento de Igrejas</title>

<meta name="title" content="Marques Igrejas - Sistema de Gerenciamento de Igrejas" />
<meta name="description" content="Área restrita aos administradores do site PRÓ NOTÍCIAS" />
<meta name="keywords" content="Login, Recuperar Senha, Pró Notícias" />

<meta name="author" content="Marques Junior" />   
<meta name="url" content="http://www.marquesjunior.com" />
   
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

<link href="js/uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/uploadify/swfobject.js"></script>
<script type="text/javascript" src="js/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#file_upload').uploadify({
    'uploader'  : 'js/uploadify/uploadify.swf',
    'script'    : 'js/uploadify/uploadify.php',
    'cancelImg' : 'js/uploadify/cancel.png',
    'folder'    : '../uploads',
    'multi'     : true,
	'auto'		: false,
    'fileExt'     : '*.jpg;*.gif;*.png',
    'buttonText'  : 'Selecione quantas imagens quiser (jpg, png e gif)',
    'width'       : 560,
	'height'       : 35,
    'scriptData'  : {'postId':'155'},
	'onAllComplete' : function(event,data) {
       location.reload(true);
    }
  });
});
</script>

</head>
<body>

<div id="painel">
	<div id="header">
    	<img src="images/plogo.png" alt="Site Admin" title="Site Admin" />
        
        	<div class="coom">
                <a href="index2.php" title="painel home" class="btnalt">painel home</a>
                <a href="" title="configurações" class="btnalt">configurações</a>
                <a href="#" title="deslogar" class="btnalt">deslogar</a>
        	</div><!-- /comm -->
    </div><!-- /header -->
    <?php include_once('includes/menu.php');?>
    <div id="content">
    	<div class="pg">
        	<span style="display:none">
                <span class="ms ok">ok</span>
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </span>
            <div class="bloco list" style="display:block">
            	<div class="titulo">Artigos:
                
                	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="id" class="radius" size="30" value="Titulo:" 
                            onclick="if(this.value=='Titulo:')this.value=''" 
                            onblur="if(this.value=='')this.value='Titulo:'"
                            />
                        </label>
                        <input type="submit" value="filtrar resultados" name="sendFiltro" class="btn" />
                    </form>
                
                </div><!-- /titulo -->
                                             
                <table width="1000" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>titulo:</td>
                    <td align="center">data:</td>
                    <td align="center">categoria:</td>
                    <td align="center">visitas:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                  <?php for($i=0;$i<10;$i++):?>
                  <tr>
                    <td><a href="#" target="_blank">Com luvas de boxe, Gracyanne Barbosa...</a></td>
                    <td align="center">16/03/2012 15:15</td>
                    <td align="center"><a href="#">notícias</a></td>
                    <td align="center">1587</td>
                    <td align="center"><a href="#" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="#" title="editar"><img src="ico/no.png" alt="editar" title="excluir" /></a></td>
                    <td align="center"><a href="#" title="publicar"><img src="ico/alert.png" alt="publicar" title="publicar" /></a></td>
                  </tr>
                  <?php endfor;?>
                </table>
                <div class="paginator">
                	<a href="#">primeira</a>
                    <span class="selected">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a>
                    <a href="#">última</a>
                </div><!-- /paginator -->
            </div><!-- /bloco list -->     
            
        </div><!-- pg -->
    </div><!-- /content -->
    
<div style="clear:both"></div> 
<div id="footer">Marques Igrejas - Sistema de Gerencimento de Igrejas e Congregações - &copy; Copyright <?php echo date('Y');?></div>   
</div><!-- //painel -->



</body>
</html>