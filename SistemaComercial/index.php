<?php
$sHTML = ' 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gideões Sistema de Gerenciamento</title>

<meta name="title" content="Gideões Sistema de Gerenciamento" />
<meta name="description" content="Gideões Sistema de Gerenciamento" />
<meta name="keywords" content="Gideões Sistema de Gerenciamento" />

<meta name="author" content="AUTOR DO SITE" />   
<meta name="url" content="URL DO SITE" />
   
<meta name="language" content="pt-br" /> 
<meta name="robots" content="NOINDEX,NOFOLLOW" /> 

<link rel="icon" type="image/png" href="ico/chave.png" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="css/geral.css" />
</head>
<body>
<div id="login">
	<img src="images/login-logo.png" alt="Pro Notícias - Área administrativa | Login" title="Pro Notícias - Área administrativa | Login" width="301"/>
	<div style="display:none">
	<span class="ms ok">Login efetuado com sucesso!</span>
        <span class="ms no">Erro</span>
        <span class="ms al">Alerta</span>
        <span class="ms in">Informação</span>
    </div>';

    $sHTML2 ='</div>
        </body>
        </html>';

    //$sRemember = isset($_GET['remember']) ? $_GET['remember'] : false;
    
    $sRemember = false;
    if(!$sRemember){
        $sHTML_LOGIN = '<form name="login" action="valida.php" method="POST">
                    <label>
                        <span>E-mail:</span>
                        <input type="text" class="radius" name="usuario" />
                    </label>
                    <label>
                        <span>Senha:</span>
                        <input type="password" class="radius" name="senha" />
                    </label>
                    <input type="submit" value="Logar-se" name="sendLogin" class="btn" />
                </form>';
    } else {
        $sHTML_LOGIN = '<form name="recover" action="" method="post">
                <span class="ms in">Informe seu e-mail para que possamos enviar seus dados de acesso!</span>
                <label>
                    <span>E-mail:</span>
                    <input type="text" class="radius" name="email" />
                </label>
                <input type="submit" value="Recuperar dados" name="sendRecover" class="btn" />
                <a href="index.php" class="link" title="Voltar">Voltar!</a>            
            </form>';
    }
    
    echo $sHTML.$sHTML_LOGIN.$sHTML2;
	