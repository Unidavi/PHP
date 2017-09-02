<?php

require('dadosSis.php');
$dados = mysqli_connect(HOST, USER, PASS, BASE) or die(mysql_error());
$banco = mysqli_select_db(BASE) or die(mysql_error());

