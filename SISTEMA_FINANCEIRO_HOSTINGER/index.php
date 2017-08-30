<?php
require_once('core/funcoes.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Sistema Comercial em PHP</title>
        <meta charset="windows-1252" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CSS -->
        <link rel="stylesheet" href="core/assets/css/main.css" />
        <link rel="stylesheet" href="core/assets/css/Estilo.css" />

        <!-- Scripts -->
        <script src="core/assets/js/jquery.min.js"></script>
        <script src="core/assets/js/jquery.scrolly.min.js"></script>
        <script src="core/assets/js/jquery.dropotron.min.js"></script>
        <script src="core/assets/js/jquery.scrollex.min.js"></script>
        <script src="core/assets/js/skel.min.js"></script>
        <script src="core/assets/js/util.js"></script>
        <script src="core/assets/js/main.js"></script>
        <script src="core/assets/js/comportamento.js"></script>
    </head>
    <body>
        <div id="page-wrapper">
            <?php
            new Redirecionador();
            ?>
        </div>
    </body>
</html>
