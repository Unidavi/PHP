<?php

class ControllerFilial extends ControllerPadrao {

    public function processa() {
        if (Redirecionador::getParametro('acao')) {
            $oPersistenciaFilial = new PersistenciaFilial();
            $oPersistenciaFilial->setModel($this->setModelFromView());
            if ((Redirecionador::getParametro('acao')) == 'del') {
                $this->processaExclusao();
            } else if ((Redirecionador::getParametro('acao')) == 'inc') {
                if ($oPersistenciaFilial->get()) {
                    $this->processaAlteracao();
                } else {
                    $this->processaInclusao();
                }
            }
        }
        $this->MontaTela();
    }

    public function setModelFromView() {
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

    public function processaInclusao() {
        $oPersistenciaFilial = new PersistenciaFilial();
        $oPersistenciaFilial->setModel($this->setModelFromView());
        $oPersistenciaFilial->insere();
    }

    public function processaAlteracao() {
        $oPersistenciaFilial = new PersistenciaFilial();
        $oPersistenciaFilial->setModel($this->setModelFromView());
        $oPersistenciaFilial->altera();
    }

    public function processaExclusao() {
        $oPersistenciaFilial = new PersistenciaFilial();
        $oPersistenciaFilial->setModel($this->setModelFromView());
        $oPersistenciaFilial->exclui();
    }

    public function MontaTela() {
        $oPersistenciaFilial = new PersistenciaFilial();
        $aListaFiliais = $oPersistenciaFilial->getAll();

        $oViewFilial = new ViewFilial();
        $oViewFilial->setListaModel($aListaFiliais);
        $oViewFilial->montaTela();
    }

}
