<?php

class Mensagem{
    //Mensagens de SQL
    const MONTA_CAMPOS_ARRAY = 'Array est� vazio e n�o foi poss�vel montar o SQL!';
    const FUNCAO_NAO_ENCONTRADA = 'A fun��o chamada n�o existe!';
    
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

