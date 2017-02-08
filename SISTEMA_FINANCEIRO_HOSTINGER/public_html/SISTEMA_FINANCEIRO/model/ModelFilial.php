<?php

class ModelFilial extends ModelPadrao {

    private $filcodigo;
    private $filnome;
    private $filendereco;
    private $filcep;
    private $filbairro;
    private $filestado;
    private $filmunicipio;
    private $filcnpj;

    function getFilcodigo() {
        return $this->filcodigo;
    }

    function getFilnome() {
        return $this->filnome;
    }

    function getFilendereco() {
        return $this->filendereco;
    }

    function getFilcep() {
        return $this->filcep;
    }

    function getFilbairro() {
        return $this->filbairro;
    }

    function getFilestado() {
        return $this->filestado;
    }

    function getFilmunicipio() {
        return $this->filmunicipio;
    }

    function getFilcnpj() {
        return $this->filcnpj;
    }

    function setFilcodigo($filcodigo) {
        $this->filcodigo = $filcodigo;
    }

    function setFilnome($filnome) {
        $this->filnome = $filnome;
    }

    function setFilendereco($filendereco) {
        $this->filendereco = $filendereco;
    }

    function setFilcep($filcep) {
        $this->filcep = $filcep;
    }

    function setFilbairro($filbairro) {
        $this->filbairro = $filbairro;
    }

    function setFilestado($filestado) {
        $this->filestado = $filestado;
    }

    function setFilmunicipio($filmunicipio) {
        $this->filmunicipio = $filmunicipio;
    }

    function setFilcnpj($filcnpj) {
        $this->filcnpj = $filcnpj;
    }

}
