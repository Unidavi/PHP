<?php

class ControllerGrupoUsuario extends ControllerPadrao {

    public function processa() {
        if (Redirecionador::getParametro('acao')) {
            $oPersistenciaGrupoUsuario = new PersistenciaGrupoUsuario();
            $oPersistenciaGrupoUsuario->setModel($this->setModelFromView());
            if ((Redirecionador::getParametro('acao')) == 'del') {
                $this->processaExclusao();
            } else if ((Redirecionador::getParametro('acao')) == 'inc') {
                if ($oPersistenciaGrupoUsuario->get()) {
                    $this->processaAlteracao();
                } else {
                    $this->processaInclusao();
                }
            }
        }
        $this->MontaTela();
    }

    public function setModelFromView() {
        $oModeloGrupoUsuario = new ModelGrupoUsuario();
        $oModeloGrupoUsuario->setCd_grupo(Redirecionador::getParametro('cd_grupo'));
        $oModeloGrupoUsuario->setDs_grupo(Redirecionador::getParametro('ds_grupo'));
        $oModeloGrupoUsuario->setModelFilial(Redirecionador::getParametro('filcodigo'));

        return $oModeloGrupoUsuario;
    }

    public function processaInclusao() {
        $oPersistenciaGrupoUsuario = new PersistenciaGrupoUsuario();
        $oPersistenciaGrupoUsuario->setModel($this->setModelFromView());
        $oPersistenciaGrupoUsuario->insere();
    }

    public function processaAlteracao() {
        $oPersistenciaGrupoUsuario = new PersistenciaGrupoUsuario();
        $oPersistenciaGrupoUsuario->setModel($this->setModelFromView());
        $oPersistenciaGrupoUsuario->altera();
    }

    public function processaExclusao() {
        $oPersistenciaGrupoUsuario = new PersistenciaGrupoUsuario();
        $oPersistenciaGrupoUsuario->setModel($this->setModelFromView());
        $oPersistenciaGrupoUsuario->exclui();
    }

    public function MontaTela() {
        $oPersistenciaGrupoUsuario = new PersistenciaGrupoUsuario();
        $aListaGruposUsuarios = $oPersistenciaGrupoUsuario->getAll();

        $oPersistenciaFilial = new PersistenciaFilial();
        $aListaFiliais = $oPersistenciaFilial->getAll();

        $oViewGrupoUsuario = new ViewGrupoUsuario();
        $oViewGrupoUsuario->setListaFilial($aListaFiliais);
        $oViewGrupoUsuario->setListaModel($aListaGruposUsuarios);

        $oViewGrupoUsuario->montaTela();
    }

}
