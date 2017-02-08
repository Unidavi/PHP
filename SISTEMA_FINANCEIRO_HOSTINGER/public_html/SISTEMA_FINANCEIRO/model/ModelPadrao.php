<?php

/* Representa o modelo padrão de dados
  Caso exista um campo ou método padrão a todos os modelos este deve ser construído aqui */

class ModelPadrao {

    private $nomeClasse;

    function getNomeClasse() {
        return $this->nomeClasse;
    }

    function setNomeClasse($nomeClasse) {
        $this->nomeClasse = $nomeClasse;
    }

}
