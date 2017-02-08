<?php

/* Controller Global da Estrutura
 * @package GLW
 * @subpackage View
 * @author Gelvazio Camargo
 * @since 19/07/2016
 */
require_once('../persistencia/glw_class_persistencia_manutencao_padrao.inc');

class ControllerManutencaoPadrao extends ControllerPadrao {

    CONST ACAO = 'acao';
    CONST ACAO_INCLUIR = 'inc';
    CONST ACAO_ALTERAR = 'alt';
    CONST ACAO_EXCLUIR = 'exc';
    CONST ACAO_CONSULTAR = 'con';

    protected function processaDados() {
        if (Redirecionador::getParametro(self::ACAO)) {
            $oPersistenciaManutencaoPadrao = new PersistenciaManutencaoPadrao();
            $oPersistenciaManutencaoPadrao->setModel($this->setModelFromView());
            switch (Redirecionador::getParametro(self::ACAO)) {
                case self::ACAO_INCLUIR:
                    $this->processaDadosInclusao();
                    break;
                case self::ACAO_EXCLUIR:
                    $this->processaDadosExclusao();
                    break;
                case self::ACAO_ALTERAR:
                    $this->processaDadosAlteracao();
                    break;
                case self::ACAO_CONSULTAR:
                    $this->processaDadosSemTela();
                    break;
            }
        }
        $this->MontaTela();
    }

    protected function setModelFromView() {
        $oModeloFilial = new ModelFilial();
        $oModeloFilial->setFilcodigo(Redirecionador::getParametro('filcodigo'));
        $oModeloFilial->setFilnome(Redirecionador::getParametro('filnome'));
        $oModeloFilial->setFilendereco(Redirecionador::getParametro('filendereco'));
        $oModeloFilial->setFilcep(Redirecionador::getParametro('filcep'));
        $oModeloFilial->setFilbairro(Redirecionador::getParametro('filbairro'));
        $oModeloFilial->setFilestado(Redirecionador::getParametro('filestado'));
        $oModeloFilial->setFilmunicipio(Redirecionador::getParametro('filmunicipio'));
        $oModeloFilial->setFilcnpj(Redirecionador::getParametro('filcnpj'));

        return $oModeloFilial;
    }

    protected function processaDadosInclusao() {
        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
        $this->getPersistenciaManutencaoPadrao()->insere();
    }

    protected function processaDadosAlteracao() {
        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
        $this->getPersistenciaManutencaoPadrao()->altera();
    }

    protected function processaDadosExclusao() {
        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
        $this->getPersistenciaManutencaoPadrao()->exclui();
    }

    protected function processaDadosSemTela() {
        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
        $this->getPersistenciaManutencaoPadrao()->consulta();
    }

    protected function MontaTela() {
        $oPersistenciaFilial = new PersistenciaFilial();
        $aListaFiliais = $oPersistenciaFilial->getAll();

        $oViewFilial = new ViewFilial();
        $oViewFilial->setListaModel($aListaFiliais);
        $oViewFilial->montaTela();
    }

    /**
     * Retorna a persistencia Padrao
     * @static var PersistenciaManutencaoPadrao $oPersistenciaManutencaoPadrao
     * @return \PersistenciaManutencaoPadrao
     */
    protected function getPersistenciaManutencaoPadrao() {
        /**
         * @var PersistenciaManutencaoPadrao $oPersistenciaManutencaoPadrao
         */
        static $oPersistenciaManutencaoPadrao;
        if (isset($oPersistenciaManutencaoPadrao)) {
            $oPersistenciaManutencaoPadrao = new PersistenciaManutencaoPadrao;
        }
        return $oPersistenciaManutencaoPadrao;
    }

    public function processa() {
        
    }
}

    /*PROGRAMAÇÃO NOVA DA MODELO DA IPM */
class ControllerManutencaoPadraoIpm{
    
    CONST ACAO = 'acao';
    CONST ACAO_INCLUIR = 'inc';
    CONST ACAO_ALTERAR = 'alt';
    CONST ACAO_EXCLUIR = 'exc';
    CONST ACAO_CONSULTAR = 'con';

    private $Model;
    
    private $Tela;
    
    protected function processaDados() {
        if (Redirecionador::getParametro(self::ACAO)) {
            $oPersistenciaManutencaoPadrao = new PersistenciaManutencaoPadrao();
            $oPersistenciaManutencaoPadrao->setModel($this->setModelFromView());
            switch (Redirecionador::getParametro(self::ACAO)) {
                case self::ACAO_INCLUIR:
                    $this->processaDadosInclusao();
                    break;
                case self::ACAO_EXCLUIR:
                    $this->processaDadosExclusao();
                    break;
                case self::ACAO_ALTERAR:
                    $this->processaDadosAlteracao();
                    break;
                case self::ACAO_CONSULTAR:
                    $this->processaDadosSemTela();
                    break;
            }
        }
        $this->MontaTela();
    }

    protected function setModelFromView() {
        $oModeloFilial = new ModelFilial();
        $oModeloFilial->setFilcodigo(Redirecionador::getParametro('filcodigo'));
        $oModeloFilial->setFilnome(Redirecionador::getParametro('filnome'));
        $oModeloFilial->setFilendereco(Redirecionador::getParametro('filendereco'));
        $oModeloFilial->setFilcep(Redirecionador::getParametro('filcep'));
        $oModeloFilial->setFilbairro(Redirecionador::getParametro('filbairro'));
        $oModeloFilial->setFilestado(Redirecionador::getParametro('filestado'));
        $oModeloFilial->setFilmunicipio(Redirecionador::getParametro('filmunicipio'));
        $oModeloFilial->setFilcnpj(Redirecionador::getParametro('filcnpj'));

        return $oModeloFilial;
    }

    protected function processaDadosInclusao() {
//        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
//        $this->getPersistenciaManutencaoPadrao()->insere();
        
        //Seta os dados do Modelo na tela
        $this->setBean($this->Model,$this->Tela);    
        //Seta as chaves 
        $this->getPersistenciaManutencaoPadrao()->setaChaves();
        //Busca os dados baseado na Chave
        $this->buscaDados();
        //Carrega os dados do Modelo na tela-Acao de Alterar
        $this->loadFromBean($this->Model,$this->Tela);
        //Imprime a tela
        $this->imprimiTela();
    }
    

    function getModel() {
        return $this->Model;
    }

    function getTela() {
        return $this->Tela;
    }

    function setModel($Model) {
        $this->Model = $Model;
    }

    function setTela($Tela) {
        $this->Tela = $Tela;
    }

    public function getInstanceModel() {
        if(isset($this->Model)){
            $this->setModel(Factory::loadStaticModel('GLW', 'Padrao'));
        }
        return $this->Model;
    }
    
    public function getInstanceTela() {
        if(isset($this->Tela)){
            $this->setTela(Factory::loadStaticModel('GLW', 'Padrao'));
        }
        return $this->Tela;
    }
    
    protected function processaDadosAlteracao() {
        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
        $this->getPersistenciaManutencaoPadrao()->altera();

        //        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
//        $this->getPersistenciaManutencaoPadrao()->insere();
        
        //Seta os dados do Modelo na tela
        $this->setBean($this->Model,$this->Tela);    
        //Seta as chaves 
        $this->getPersistenciaManutencaoPadrao()->setaChaves();
        //Busca os dados baseado na Chave
        $this->buscaDados();
        //Carrega os dados do Modelo na tela-Acao de Alterar
        $this->loadFromBean($this->Model,$this->Tela);
        //Imprime a tela
        $this->imprimiTela();

        
    }

    protected function processaDadosExclusao() {
        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
        $this->getPersistenciaManutencaoPadrao()->exclui();
    }

    protected function processaDadosSemTela() {
        $this->getPersistenciaManutencaoPadrao()->setModel($this->setModelFromView());
        $this->getPersistenciaManutencaoPadrao()->consulta();
    }

    protected function MontaTela() {
        $oPersistenciaFilial = new PersistenciaFilial();
        $aListaFiliais = $oPersistenciaFilial->getAll();

        $oViewFilial = new ViewFilial();
        $oViewFilial->setListaModel($aListaFiliais);
        $oViewFilial->montaTela();
    }

    /**
     * Retorna a persistencia Padrao
     * @static var PersistenciaManutencaoPadrao $oPersistenciaManutencaoPadrao
     * @return \PersistenciaManutencaoPadrao
     */
    protected function getPersistenciaManutencaoPadrao() {
        /**
         * @var PersistenciaManutencaoPadrao $oPersistenciaManutencaoPadrao
         */
        static $oPersistenciaManutencaoPadrao;
        if (isset($oPersistenciaManutencaoPadrao)) {
            $oPersistenciaManutencaoPadrao = new PersistenciaManutencaoPadrao;
        }
        return $oPersistenciaManutencaoPadrao;
    }

    
}









