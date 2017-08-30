<?php

class ModelUsuario extends ModelPadrao {
//
//    private $cd_usuario;
//    private $ds_login;
//    private $ds_usuario;
//    private $ds_senha;
//    private $ModelGrupoUsuario;
//    private $ModelFilial;
//    private $fg_ativo;
//
//    function getDs_login() {
//        return $this->ds_login;
//    }
//
//    function getDs_usuario() {
//        return $this->ds_usuario;
//    }
//
//    function getDs_senha() {
//        return $this->ds_senha;
//    }
//
//    function getModelGrupoUsuario() {
//        return $this->ModelGrupoUsuario;
//    }
//
//    function getModelFilial() {
//        return $this->ModelFilial;
//    }
//
//    function getFg_ativo() {
//        return $this->fg_ativo;
//    }
//
//    function setDs_login($ds_login) {
//        $this->ds_login = $ds_login;
//    }
//
//    function setDs_usuario($ds_usuario) {
//        $this->ds_usuario = $ds_usuario;
//    }
//
//    function setDs_senha($ds_senha) {
//        $this->ds_senha = $ds_senha;
//    }
//
//    function setModelGrupoUsuario($ModelGrupoUsuario) {
//        $this->ModelGrupoUsuario = $ModelGrupoUsuario;
//    }
//
//    function setModelFilial($ModelFilial) {
//        $this->ModelFilial = $ModelFilial;
//    }
//
//    function setFg_ativo($fg_ativo) {
//        $this->fg_ativo = $fg_ativo;
//    }
//
//    function getCodigo() {
//        return $this->Codigo;
//    }
//
//    function setCodigo($Codigo) {
//        $this->Codigo = $Codigo;
//    }
    
    
//      cd_usuario integer NOT NULL,
//  ds_usuario character varying,
//  ds_login character varying,
//  ds_senha character varying,
//  fg_ativo smallint,
//  cd_filial smallint,
//  cd_grupo_usuario smallint,
//  dt_alt date,
//  dt_cad date,
//  hr_alt time with time zone,
//  hr_cad time with time zone,
    //METODOS PARA TESTES
    
    private $Codigo;
    private $Nome;    
    private $Login;            
    private $Senha; 
    /**
     * @var ModelGrupoUsuario
     */
    private $GrupoUsuarioCodigo;
    private $dataAlteracao;    
    private $horaAlteracao;    
    private $dataCadastro;    
    private $horaCadastro;
    /**
     *
     * @var ModelFilial
     */
    private $CodigoFilial;     
    private $Situacao;    
    
    function getGrupoUsuarioCodigo() {
        return $this->GrupoUsuarioCodigo;
    }

    function setGrupoUsuarioCodigo($GrupoUsuarioCodigo) {
        $this->GrupoUsuarioCodigo = $GrupoUsuarioCodigo;
    }

    function getCodigo() {
        return $this->Codigo;
    }
    
    function getNome() {
        return $this->Nome;
    }

    function getLogin() {
        return $this->Login;
    }

    function getSenha() {
        return $this->Senha;
    }

    function getDataAlteracao() {
        return $this->dataAlteracao;
    }

    function getHoraAlteracao() {
        return $this->horaAlteracao;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getHoraCadastro() {
        return $this->horaCadastro;
    }

    function getCodigoFilial() {
        return $this->CodigoFilial;
    }

    function getSituacao() {
        return $this->Situacao;
    }

    function setCodigo($Codigo) {
        $this->Codigo = $Codigo;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setLogin($Login) {
        $this->Login = $Login;
    }

    function setSenha($Senha) {
        $this->Senha = $Senha;
    }

    function setDataAlteracao($dataAlteracao) {
        $this->dataAlteracao = $dataAlteracao;
    }

    function setHoraAlteracao($horaAlteracao) {
        $this->horaAlteracao = $horaAlteracao;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setHoraCadastro($horaCadastro) {
        $this->horaCadastro = $horaCadastro;
    }

    function setCodigoFilial($CodigoFilial) {
        $this->CodigoFilial = $CodigoFilial;
    }

    function setSituacao($Situacao) {
        $this->Situacao = $Situacao;
    }
    
    //Teste de classe
    /**
     *
     * @var ModelGrupoUsuario
     */
    private $GrupoUsuario;
    function getGrupoUsuario() {
        return $this->GrupoUsuario;
    }

    function setGrupoUsuario(ModelGrupoUsuario $GrupoUsuario) {
        $this->GrupoUsuario = $GrupoUsuario;
    }
}
