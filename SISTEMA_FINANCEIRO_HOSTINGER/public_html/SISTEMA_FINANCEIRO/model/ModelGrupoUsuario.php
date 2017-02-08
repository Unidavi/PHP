<?php

class ModelGrupoUsuario extends ModelPadrao {

    private $codigo;
    private $ds_grupo;
    private $ModelFilial;

    /*@var ModelPessoa*/
    private $Pessoa;
    
    function getPessoa() {
        if(!isset($this->Pessoa)){
            $oModel = new ModelPessoa();
            $this->setPessoa($oModel);
        }
        return $this->Pessoa;
    }

    function setPessoa($Pessoa) {
        $this->Pessoa = $Pessoa;
    }

    function getDs_grupo() {
        return $this->ds_grupo;
    }

    function getModelFilial() {
        return $this->ModelFilial;
    }

    function setDs_grupo($ds_grupo) {
        $this->ds_grupo = $ds_grupo;
    }

    function setModelFilial($ModelFilial) {
        $this->ModelFilial = $ModelFilial;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
}
