<?php

class Mensagem{
    //Mensagens de SQL
    const MONTA_CAMPOS_ARRAY = 'Array está vazio e não foi possível montar o SQL!';
    const FUNCAO_NAO_ENCONTRADA = 'A função chamada não existe!';
    
    /**
     * Mensagem de alerta na cor amarelo
     * @param type $sMensagem
     */
    public static function mensagemAlerta($sMensagem){
        echo $sMensagem;
    }
    
     /**
     * Mensagem de erro na cor vermelho
     * @param type $sMensagem
     */
    public static function mensagemErro($sMensagem){
        echo $sMensagem;
    }
    
     /**
     * Mensagem de Ok na cor verde->Usar funcao em PHP para setar o Estilo
     * @param type $sMensagem
     */
    public static function mensagemOk($sMensagem){        
        echo $sMensagem;
    }
}

