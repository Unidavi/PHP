<?php

class Mensagem{
    //Mensagens de SQL
    const MONTA_CAMPOS_ARRAY = 'Array está vazio e não foi possível montar o SQL!';
    
    /**
     * Mensagem de alerta na cor amarelo
     * @param type $sMensagem
     */
    public static function mensagemAlerta($sMensagem){
        echo $sMensagem;
    }
}

