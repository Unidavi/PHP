<?php

class ModelPessoa extends ModelPadrao {

    private $cd_pessoa;
    private $nm_pessoa;
    private $ds_endereco;
    private $ds_email;
    private $nr_telefone;
    private $cd_cpf;
    private $ds_bairro;
    private $ds_estado;
    private $ds_cidade;
    private $ModelUsuario;
    private $ModelFilial;
    private $fg_ativo;

    function getFg_ativo() {
        return $this->fg_ativo;
    }

    function setFg_ativo($fg_ativo) {
        $this->fg_ativo = $fg_ativo;
    }

    function getCd_pessoa() {
        return $this->cd_pessoa;
    }

    function getNm_pessoa() {
        return $this->nm_pessoa;
    }

    function getDs_endereco() {
        return $this->ds_endereco;
    }

    function getDs_email() {
        return $this->ds_email;
    }

    function getNr_telefone() {
        return $this->nr_telefone;
    }

    function getCd_cpf() {
        return $this->cd_cpf;
    }

    function getDs_bairro() {
        return $this->ds_bairro;
    }

    function getDs_estado() {
        return $this->ds_estado;
    }

    function getDs_cidade() {
        return $this->ds_cidade;
    }

    function getModelUsuario() {
        return $this->ModelUsuario;
    }

    function getModelFilial() {
        return $this->ModelFilial;
    }

    function setCd_pessoa($cd_pessoa) {
        $this->cd_pessoa = $cd_pessoa;
    }

    function setNm_pessoa($nm_pessoa) {
        $this->nm_pessoa = $nm_pessoa;
    }

    function setDs_endereco($ds_endereco) {
        $this->ds_endereco = $ds_endereco;
    }

    function setDs_email($ds_email) {
        $this->ds_email = $ds_email;
    }

    function setNr_telefone($nr_telefone) {
        $this->nr_telefone = $nr_telefone;
    }

    function setCd_cpf($cd_cpf) {
        $this->cd_cpf = $cd_cpf;
    }

    function setDs_bairro($ds_bairro) {
        $this->ds_bairro = $ds_bairro;
    }

    function setDs_estado($ds_estado) {
        $this->ds_estado = $ds_estado;
    }

    function setDs_cidade($ds_cidade) {
        $this->ds_cidade = $ds_cidade;
    }

    function setModelUsuario($ModelUsuario) {
        $this->ModelUsuario = $ModelUsuario;
    }

    function setModelFilial($ModelFilial) {
        $this->ModelFilial = $ModelFilial;
    }

}
