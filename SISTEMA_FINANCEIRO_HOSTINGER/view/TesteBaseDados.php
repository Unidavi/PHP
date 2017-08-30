<?php
require_once 'sql.php';
require_once 'Mensagem.php';
class teste{
    
    /**  @var ModelUsuario */
    protected $Model;
    
    private static $CamposFromTabela = Array();

    public function adicionaCampo($sModulo, $sNomeTabela, $sNomeCampoTabela, $sNomeCampoModelo, $bisChave = false) {        
        $aArrayCampo = array('Modulo'          => $sModulo, 
                             'NomeTabela'      => $sNomeTabela, 
                             'NomeCampoTabela' => $sNomeCampoTabela, 
                             'NomeCampoModelo' => $sNomeCampoModelo, 
                             'CampoChave'      => $bisChave); 
        $this->setCamposFromTabela($aArrayCampo);
    }
    
    public function setListaFromPersistencia() {
        $this->adicionaCampo('GLW', 'tbusuario','cd_usuario'      ,'Codigo'            ,true);
        $this->adicionaCampo('GLW', 'tbusuario','ds_login'        ,'Login'             );
        $this->adicionaCampo('GLW', 'tbusuario','ds_senha'        ,'Senha'             );
        $this->adicionaCampo('GLW', 'tbusuario','cd_grupo_usuario','GrupoUsuarioCodigo');
        $this->adicionaCampo('GLW', 'tbusuario','dt_alt'          ,'dataAlteracao'     );
        $this->adicionaCampo('GLW', 'tbusuario','hr_alt'          ,'horaAlteracao'     );
        $this->adicionaCampo('GLW', 'tbusuario','dt_cad'          ,'dataCadastro'      );
        $this->adicionaCampo('GLW', 'tbusuario','hr_cad'          ,'horaCadastro'      );
        $this->adicionaCampo('GLW', 'tbusuario','cd_filial'       ,'CodigoFilial'      );
        $this->adicionaCampo('GLW', 'tbusuario','fg_ativo'        ,'Situacao'          );
    }
    
    public function montaSQL($sTipoSQL = SQL::INSERE) {
        $this->setListaFromPersistencia();
        switch ($sTipoSQL) {
            case SQL::INSERE:
                $this->insere_sql();
                break;
            case SQL::EXCLUI:
                $this->exclui_sql();
                break;          
            default:
                $this->altera_sql();
                break;
        }
    }
    
    private function altera_sql() {
        $aArrayInsereSQL = $this->getCamposFromTabela();
        
        if(is_array($aArrayInsereSQL)){
            $sSQL = '';
            $iVerificaLinha = 1;        
            $iTamanho = $this->calculaTamanhoArray($aArrayInsereSQL);

            foreach ($aArrayInsereSQL as $value) {
                if($iVerificaLinha == 1){
                    $sSQL .= 'INSERT INTO '.strtoupper($value['NomeTabela']).'(';
                }

                if($iVerificaLinha == $iTamanho){
                    $sSQL .= strtoupper($value['NomeCampoTabela']).')VALUES(';
                }else{
                    $sSQL .= strtoupper($value['NomeCampoTabela']).',';
                }            
                $iVerificaLinha++;
            }
            $this->resetArrayCamposFromTabela();

            return $sSQL;
        }else{
            Mensagem::mensagemAlerta(Mensagem::MONTA_CAMPOS_ARRAY);
        }
    }
    
    private function insere_sql() {
        $aArrayInsereSQL = $this->getCamposFromTabela();
        
        if(is_array($aArrayInsereSQL)){
            $sSQL = '';
            $sValoresModelSQL = '';
            $iVerificaLinha = 1;        
            $iTamanho = $this->calculaTamanhoArray($aArrayInsereSQL);

            foreach ($aArrayInsereSQL as $value) {
                if($iVerificaLinha == 1){
                    $sSQL .= 'INSERT INTO '.strtoupper($value['NomeTabela']).'(';
                    $sValoresModelSQL.='($this->Model->get'.$value['NomeCampoModelo'].'(),';
                    echo 'Campo do Modelo:',$sValoresModelSQL;
                    echo '<br><br><br><br><br>';
                }

                if($iVerificaLinha == $iTamanho){
                    $sSQL .= strtoupper($value['NomeCampoTabela']).')VALUES(';
                    $sValoresModelSQL.='($this->Model->get'.$value['NomeCampoModelo'].'());';
                    echo 'Campo do Modelo:',$sValoresModelSQL;
                    echo '<br><br><br><br><br>';
                }else{
                    $sSQL .= strtoupper($value['NomeCampoTabela']).',';
                    $sValoresModelSQL.='($this->Model->get'.$value['NomeCampoModelo'].'(),';
                    echo 'Campo do Modelo:',$sValoresModelSQL;
                    echo '<br><br><br><br><br>';
                }            
                $iVerificaLinha++;
            }
            $this->resetArrayCamposFromTabela();
            //Concatena o SQL dos campos com o SQL dos valores
            $sSQL = $sSQL.$sValoresModelSQL;
            echo '<br><br><br><br>SQL montado:<br><br>',$sSQL;
            return $sSQL;
        }else{
            Mensagem::mensagemAlerta(Mensagem::MONTA_CAMPOS_ARRAY);
        }
    }
    
    private function exclui_sql() {
        $aArrayInsereSQL = $this->getCamposFromTabela();
        
        if(is_array($aArrayInsereSQL)){
            $sSQL = '';
            $iVerificaLinha = 1;        
            $iTamanho = $this->calculaTamanhoArray($aArrayInsereSQL);

            foreach ($aArrayInsereSQL as $value) {
                if($iVerificaLinha == 1){
                    $sSQL .= 'INSERT INTO '.strtoupper($value['NomeTabela']).'(';
                }

                if($iVerificaLinha == $iTamanho){
                    $sSQL .= strtoupper($value['NomeCampoTabela']).')VALUES(';
                }else{
                    $sSQL .= strtoupper($value['NomeCampoTabela']).',';
                }            
                $iVerificaLinha++;
            }
            $this->resetArrayCamposFromTabela();

            return $sSQL;
        }else{
            Mensagem::mensagemAlerta(Mensagem::MONTA_CAMPOS_ARRAY);
        }
    }
    
    public static function getCamposFromTabela() {
        return self::$CamposFromTabela;
    }
    
    public static function setCamposFromTabela($aArrayCampo) {
        array_push(self::$CamposFromTabela,$aArrayCampo);
    }

    /**
     * Calcula o tamanho de um array
    */
    public function calculaTamanhoArray($aArray) {
       $iTamanhoArray = 0;
       foreach ($aArray as $key => $value) {
           $iTamanhoArray++;
       }
       return $iTamanhoArray;
   }
   
    /**
     * Reseta o array
    */
    public function resetArrayCamposFromTabela() {
       self::$CamposFromTabela = null;
       $this->altera_sql();
    }
   
}
/**
 * @var teste $classeTeste
 */
            $classeTeste = new teste();
            //$classeTeste->testando();
            //$classeTeste->setListaFromPersistencia();
            $classeTeste->montaSQL();














