<?php

/* Representa o modelo padr�o de dados
  Caso exista um campo ou m�todo padr�o a todos os modelos este deve ser constru�do aqui */

class ModelPadrao {

    private $nomeClasse;

    function getNomeClasse() {
        return $this->nomeClasse;
    }

    function setNomeClasse($nomeClasse) {
        $this->nomeClasse = $nomeClasse;
    }

}
