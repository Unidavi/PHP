<?php
require('connBanco.php');

function cadastro($tabela, array $datas) {
    $fields = implode(", ", array_keys($datas));
    $values = "'" . implode("', '", array_values($datas)) . "'";

    $sqlInsert = "INSERT INTO {$tabela} ($fields) VALUES ($values)";
    $sqlInsertExe = mysql_query($sqlInsert);
}
