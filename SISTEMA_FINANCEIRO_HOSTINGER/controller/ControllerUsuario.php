<?php

class ControllerUsuario extends ControllerPadrao {

    public function processa() {
        if (Redirecionador::getParametro('acao')) {
            $oPersistenciaUsuario = new PersistenciaUsuario();
            $oPersistenciaUsuario->setModel($this->setModelFromView());
            if ((Redirecionador::getParametro('acao')) == 'del') {
                $this->processaExclusao();
            } else if ((Redirecionador::getParametro('acao')) == 'inc') {
                if ($oPersistenciaUsuario->get()) {
                    $this->processaAlteracao();
                } else {
                    $this->processaInclusao();
                }
            }
        }
        $this->MontaTela();
    }

    public function setModelFromView() {
        $oModeloUsuario = new ModelUsuario();
        $oModeloUsuario->setCodigo(Redirecionador::getParametro('cd_usuario'));
        $oModeloUsuario->setLogin(Redirecionador::getParametro('ds_login'));
        $oModeloUsuario->setSenha(Redirecionador::getParametro('ds_senha'));
        $oModeloUsuario->setNome(Redirecionador::getParametro('ds_usuario'));
        $oModeloUsuario->setSituacao(Redirecionador::getParametro('ativo'));
        $oModeloUsuario->setCodigoFilial(Redirecionador::getParametro('cd_filial'));
        $oModeloUsuario->setGrupoUsuarioCodigo(Redirecionador::getParametro('cd_grupo'));
        $oModeloUsuario->getGrupoUsuario()->getPessoa()->setCodigo(Redirecionador::getParametro('cd_grupo'));

        return $oModeloUsuario;
    }

    public function processaInclusao() {
        $oPersistenciaUsuario = new PersistenciaUsuario();
        $oPersistenciaUsuario->setModel($this->setModelFromView());
        $oPersistenciaUsuario->insere();
    }

    public function processaAlteracao() {
        $oPersistenciaUsuario = new PersistenciaUsuario();
        $oPersistenciaUsuario->setModel($this->setModelFromView());
        $oPersistenciaUsuario->altera();
    }

    public function processaExclusao() {
        $oPersistenciaUsuario = new PersistenciaUsuario();
        $oPersistenciaUsuario->setModel($this->setModelFromView());
        $oPersistenciaUsuario->exclui();
    }

    public function MontaTela() {
        $oPersistenciaUsuario = new PersistenciaUsuario();
        $aListaUsuarios = $oPersistenciaUsuario->getAll();

        $oPersistenciaGrupoUsuario = new PersistenciaGrupoUsuario();
        $aListaGruposUsuarios = $oPersistenciaGrupoUsuario->getAll();

        $oPersistenciaFilial = new PersistenciaFilial();
        $aListaFiliais = $oPersistenciaFilial->getAll();

        $oViewUsuario = new ViewUsuario();
        $oViewUsuario->setListaModel($aListaUsuarios);
        $oViewUsuario->setListaFilial($aListaFiliais);
        $oViewUsuario->setListaGrupoUsuario($aListaGruposUsuarios);

        $oViewUsuario->montaTela();
    }

    public function processaDados() {
        
    }

}
