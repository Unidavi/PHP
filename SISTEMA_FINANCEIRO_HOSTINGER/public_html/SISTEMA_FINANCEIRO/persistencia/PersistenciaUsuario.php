<?php
require_once 'sql.php';
require_once 'Mensagem.php';
class PersistenciaUsuario extends PersistenciaPadrao{
    
    /**  @var ModelUsuario */
    protected $Model;
    
    private $nomeClasse;
    
    private static $CamposFromTabela = Array();
    
    function getNomeClasse() {
        return $this->nomeClasse;
    }

    function setNomeClasse($nomeClasse) {
        $this->nomeClasse = $nomeClasse;
    }

    public function adicionaCampo($sModulo,$sNomeClasse, $sNomeTabela, $sNomeCampoTabela, $sNomeCampoModelo, $bisChave = false) {        
        $aArrayCampo = array('Modulo'      => $sModulo, 
                             'Classe'      => $sNomeClasse, 
                             'Tabela'      => $sNomeTabela, 
                             'CampoTabela' => $sNomeCampoTabela, 
                             'CampoModelo' => $sNomeCampoModelo, 
                             'CampoChave'  => $bisChave); 
        $this->setCamposFromTabela($aArrayCampo);
    }
    
    public function setListaFromPersistencia() {
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','cd_usuario'      ,'Codigo'            ,true);
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','ds_login'        ,'Login'             );
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','ds_senha'        ,'Senha'             );
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','cd_grupo_usuario','GrupoUsuarioCodigo');
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','dt_alt'          ,'dataAlteracao'     );
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','hr_alt'          ,'horaAlteracao'     );
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','dt_cad'          ,'dataCadastro'      );
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','hr_cad'          ,'horaCadastro'      );
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','cd_filial'       ,'CodigoFilial'      );
        $this->adicionaCampo('GLW','Usuario', 'tbusuario','fg_ativo'        ,'Situacao'          );
    }
    
    public function montaSQL($sTipoSQL = SQL::INSERE) {
        $this->setListaFromPersistencia();
        switch ($sTipoSQL) {
            case SQL::INSERE:
                //$this->insere($this->getSqlForInsert());
                        //Teste geo
        
        $this->getNomeMetodoCampoModel('Codigo');
        //programacao normal
        
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
    }
    
    public function testeGeo(){
        $sSql = 'select * from cadastro.tbpessoa1';
        try{
            $this->getQuery()->setSql($sSql);
        } catch (SQLException $ex) {
            echo 'Erro ao executar SQL:<br>',$ex.getMessage();
        }        
    }
    private function getSqlForInsert() {
        $aArrayCamposFromTabela = $this->getCamposFromTabela();
        
        if(is_array($aArrayCamposFromTabela)){
            $sSQL = '';
            $sValoresModelSQL = '';
            $iVerificaLinha = 1;        
            $iTamanho = count($aArrayCamposFromTabela);

            foreach ($aArrayCamposFromTabela as $value) {
                //Monta o SQL
                if($iVerificaLinha == 1){
                    $sSQL .= 'INSERT INTO '.strtoupper($value['Tabela']).'(';
                }                    
                if($iVerificaLinha == $iTamanho){
                    $sSQL .= strtoupper($value['CampoTabela']).')VALUES(';
                }else{
                    $sSQL .= strtoupper($value['CampoTabela']).',';
                }
                $sNomeFuncao = 'get'.$value['CampoModelo'].'';
                $sNomeFuncaoTeste = $this->getNomeMetodoCampoModel($value['CampoModelo']);
                $sValorCampo = $this->getValorCampo($sNomeFuncao);

                $sValoresModelSQL .= $sValorCampo.',';
                //Seta o nome da classe para ser mostrada caso não ache o método na Classe
                $this->setNomeClasse($value['Classe']);                   
                
                $iVerificaLinha++;
                echo '<br>Funcão: ',$sNomeFuncao, ' - Retorno-> ',$sValorCampo;
            }
            
            $this->resetArrayCamposFromTabela();
            //Concatena o SQL dos campos com o SQL dos valores
            $sSQL = $sSQL.$sValoresModelSQL;
            echo '<br><br><br><br>SQL montado:<br><br>',$sSQL;
            return $sSQL;
        }else{
            Mensagem::mensagemAlerta(Mensagem::MONTA_CAMPOS_ARRAY);
        }
        return $sSQL;
    }
    
    public function migracaoTeste(){
        $sSQL = 'SELECT * FROM CADASTRO.TBPESSOAS';   
        $aUsuariosBanco = $this->getQuery()->selectAll($sSQL);        
        $iLastError = pg_last_error($this->getQuery()->getConexao(). $sSQL);
        echo $iLastError;
    }

    public function getNomeMetodoCampoModel($sNomeFuncao) {
        //teste geo
        
        $this->Model->getGrupoUsuario()->getPessoa()->setCodigo(25);
        
        $sNomeFuncao = 'GrupoUsuario.Pessoa.Codigo';
        $iTamanho = strlen($sNomeFuncao);
        $iContador = 0;
        $sNovoNomeMetodoConcatenado = 'get';        
        //Teste classe
        $sClasseToCallMethod = $this->Model;
        $bTemClasse = false;
        for ($i = 1;$i <= $iTamanho;$i++){                        
            $sLetra = substr($sNomeFuncao,$iContador,$i - $iContador);
            //Programacao da Classe
            //Se tem ponto quer dizer classe
            if($sLetra == '.'){
                $sNovoNomeMetodoConcatenado.='()->get';
                $bTemClasse = true;
                $sClasseToCallMethod = 7;
            } else {
                $sNovoNomeMetodoConcatenado .= $sLetra;
            }            
            if($i == $iTamanho){
                $sNovoNomeMetodoConcatenado = $sNovoNomeMetodoConcatenado;
            }
            echo 'Letra:',$sLetra,' na posição:',$i,'<br>';            
            $iContador++;            
            //Programacao Classe
//            if($bTemClasse){                
//                if($sLetra != '.'){
//                    //enquanto a letra é diferente de ponto,segue montando o nome da classe
//                    $sClasseToCallMethod .= $sLetra;
//                } else {
//                    //se for igual á ponto,deve alterar o nome da classe
//                    //pois a classe já é outra                    
//                    //o ponto nao monta
//                    if($sLetra == '.'){
//                        //nao monta o nome
//                    }
//                    
//                }                
//                $bTemClasse = false;
//            }
        }
        
        //Testes do método
        echo 'Nome Metodo Formado:',$sNovoNomeMetodoConcatenado;
        echo '<br>Valor retornado do método:',$this->callMethod($this->Model, $sNovoNomeMetodoConcatenado);
        
        
        $iValor = $this->callMethod($this->Model, $sNovoNomeMetodoConcatenado);
        echo 'Testes Classe Valor: ',$iValor;
        //return $sNomeFuncao;
        return;
    }
    public function getValorCampo($sNomeFuncao) {
        switch ($sNomeFuncao) {
            case 'getdataAlteracao':
                $sValorCampo = date("d/m/Y");
                break;
            case 'getdataCadastro':
                $sValorCampo = date("d/m/Y");
                break;                    
            case 'gethoraAlteracao':
                $sValorCampo = date('H:i:s');
                break;
            case 'gethoraCadastro':
                $sValorCampo = date('H:i:s');
                break;                    
            default:
                $sValorCampo = $this->callMethod($this->Model,$sNomeFuncao);
                break;
        }
        return $sValorCampo;
    }
    
    private function exclui_sql() {
    }
    
    public static function getCamposFromTabela() {
        return self::$CamposFromTabela;
    }
    
    public static function setCamposFromTabela($aArrayCampo) {
        array_push(self::$CamposFromTabela,$aArrayCampo);
    }
   
    /**
     * Reseta o array
    */
    public function resetArrayCamposFromTabela() {
       self::$CamposFromTabela = null;
    }

//Persistencia Padrao
    public function insere1() {
        $sSql = "INSERT INTO configuracao.tbusuario(cd_usuario,ds_login,ds_usuario,ds_senha,cd_grupo_usuario,dt_alt,hr_alt,dt_cad,hr_cad,cd_filial,fg_ativo) values("
                . " " . $this->Model->getCd_usuario() . ","
                . "'" . $this->Model->getDs_login() . "',"
                . "'" . $this->Model->getDs_usuario() . "',"
                . "'" . $this->Model->getDs_senha() . "',"
                . "'" . $this->Model->getModelGrupoUsuario() . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "" . $this->Model->getModelFilial() . ","
                . "" . $this->Model->getFg_ativo() . ""
                . ")";
        $this->getQuery()->query($sSql);
    }

    public function altera() {
        $sSql = $this->montaSQL(SQL::ALTERA);
        $this->getQuery()->query($sSql);
    }

    public function insere() {
        $sSql = $this->montaSQL(SQL::INSERE);
        $this->getQuery()->query($sSql);
    }
       
    public function exclui_() {
        $sSql = $this->montaSQL(SQL::ALTERA);
        $this->getQuery()->query($sSql);
    }
    
    public function alteraOriginal() {
        $sSql = "UPDATE configuracao.tbusuario SET "
                . " ds_login='" . $this->Model->getDs_login() . "',"
                . " ds_usuario='" . $this->Model->getDs_usuario() . "',"
                . " ds_senha='" . $this->Model->getDs_senha() . "',"
                . " cd_grupo_usuario=" . $this->Model->getModelGrupoUsuario() . ","
                . " dt_alt=   " . "'" . "01/01/2016" . "',"
                . " hr_alt=   " . "'" . "08:00:23" . "',"
                . " cd_filial=" . " " . $this->Model->getModelFilial() . ","
                . " fg_ativo= " . " " . $this->Model->getFg_ativo() . ""
                . " WHERE "
                . " cd_usuario=" . $this->Model->getCd_usuario();
        $this->getQuery()->query($sSql);
    }

    public function exclui() {
        $sSql = "DELETE FROM CONFIGURACAO.TBUSUARIO WHERE CD_USUARIO=" . $this->Model->getCd_usuario();
        $this->getQuery()->query($sSql);
    }

    public function get() {
        $aUsuarios = Array();
        $sSql = "  SELECT                                                                                    "
                . "    CONFIGURACAO.TBUSUARIO.*,                                                             "
                . "    CONFIGURACAO.TBFILIAL.*,                                                              "
                . "    CONFIGURACAO.TBGRUPO_USUARIO.*                                                        "
                . "FROM                                                                                      "
                . "    CONFIGURACAO.TBUSUARIO                                                                "
                . "INNER  JOIN CONFIGURACAO.TBFILIAL ON                                                      "
                . "    CONFIGURACAO.TBUSUARIO.CD_FILIAL=CONFIGURACAO.TBFILIAL.FILCODIGO                      "
                . "                                                                                          "
                . "INNER JOIN CONFIGURACAO.TBGRUPO_USUARIO ON                                                "
                . "    CONFIGURACAO.TBUSUARIO.CD_FILIAL=CONFIGURACAO.TBGRUPO_USUARIO.CD_FILIAL               "
                . "AND                                                                                       "
                . "    CONFIGURACAO.TBUSUARIO.CD_GRUPO_USUARIO=CONFIGURACAO.TBGRUPO_USUARIO.CD_GRUPO_USUARIO "
                . "WHERE                                                                                     "
                . "    CD_USUARIO=" . $this->Model->getCodigo();

        $aUsuariosBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aUsuariosBanco as $aValor) {
            $oModelUsuario = $this->getModelFromDb($aValor);
            $aUsuarios [] = $oModelUsuario;
        }
        return $aUsuarios;
    }

    public function getAll() {
        $aUsuarios = Array();
        $sSql = "  SELECT                                                                           "
                . "    CONFIGURACAO.TBUSUARIO.*,                                                    "
                . "    CONFIGURACAO.TBFILIAL.*,                                                     "
                . "    CONFIGURACAO.TBGRUPO_USUARIO.*                                               "
                . "FROM                                                                             "
                . "    CONFIGURACAO.TBUSUARIO                                                       "
                . "INNER  JOIN CONFIGURACAO.TBFILIAL ON                                             "
                . "    CONFIGURACAO.TBUSUARIO.CD_FILIAL=CONFIGURACAO.TBFILIAL.FILCODIGO             "
                . "                                                                                 "
                . "INNER JOIN CONFIGURACAO.TBGRUPO_USUARIO ON                                       "
                . "    CONFIGURACAO.TBUSUARIO.CD_FILIAL=CONFIGURACAO.TBGRUPO_USUARIO.CD_FILIAL      "
                . "AND                                                                              "
                . "    CONFIGURACAO.TBUSUARIO.CD_GRUPO_USUARIO =CONFIGURACAO.TBGRUPO_USUARIO.CD_GRUPO_USUARIO"
                . " ORDER BY 1                                                                       ";
                
        $aUsuariosBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aUsuariosBanco as $aValor) {
            $oModelUsuario = $this->getModelFromDb($aValor);
            $aUsuarios [] = $oModelUsuario;
        }
        return $aUsuarios;
    }

    public function getModelFromDb($aValor) {
        $oModelUsuario = new ModelUsuario();
        $oModelUsuario->setCodigo($aValor['cd_usuario']);
        $oModelUsuario->setLogin($aValor['ds_login']);
        $oModelUsuario->setSenha($aValor['ds_senha']);
        $oModelUsuario->setNome($aValor['ds_usuario']);
        $oModelUsuario->setSituacao($aValor['fg_ativo']);

        $oModeloGrupoUsuario = new ModelGrupoUsuario();
        $oModeloGrupoUsuario->setCodigo($aValor['cd_grupo_usuario']);
        $oModeloGrupoUsuario->setDs_grupo($aValor['ds_grupo']);
        
        $oModelUsuario->setGrupoUsuarioCodigo($aValor['cd_grupo_usuario']);

        $oModelFilial = new ModelFilial();
        $oModelFilial->setFilcodigo($aValor['filcodigo']);
        $oModelFilial->setFilnome($aValor['filnome']);
        
        $oModelUsuario->setCodigoFilial($aValor['filcodigo']);

        return $oModelUsuario;
    }
   
    public function callMethod($sClass,$sMethod) {
        if(method_exists($sClass,$sMethod)){
           return call_user_func(Array($sClass,$sMethod));
        }else{
            $sMensagem = (String)'A função chamada não existe!Classe: '.$this->getNomeClasse(). ' Função: '.$sMethod.'()'; 
            Mensagem::mensagemAlerta($sMensagem);
        }        
    }
    
    public function objectToArray($oObject){
        if(is_object($oObject)){
            $aArray = get_object_vars($oObject);
        }else{
            $aArray = $oObject;
        }        
        return $aArray;
    }
    
    
}

class Erro {    
    //MANIPULACAO DE ERROS
    public function manipulaErro($iNumero,$sMensagem,$oArquivo,$iLinha){
        $sMensagem = "Arquivo: $oArquivo; Linha:$iLinha # nº $iNumero: Mensagem: $sMensagem \n";
        //Escreve no log todo tipo de erro
        $sLog = fopen('erros.log', 'a');
        fwrite($sLog, $sMensagem);
        fclose($sLog);
        
        //Se for uma Warning
        if($iNumero == E_WARNING){
            echo $sMensagem;
        }
        
        //Se for uma Warning
        if($iNumero == E_WARNING){
            echo $sMensagem;
        }
        
        //Se for um erro fatal
        if($iNumero == E_USER_ERROR){
            echo $sMensagem;
            die;
        }  
        set_error_handler('manipulaErro');
    }
    
    function abrir($sFile = null){
        if(!$sFile){
            trigger_error('Falta o parâmetro com o nome do arquivo!', E_USER_NOTICE);
            return false;
        }
        
        if(!file_exists($sFile)){
            trigger_error('Arquivo não existe!', E_USER_ERROR);
            return false;
        }
        
        if(!$oRetorno = @file_get_contents($sFile)){
            trigger_error('Impossível ler o arquivo!', E_USER_WARNING);
            return false;
        }
        
        return $retorno;
    }
            
}  