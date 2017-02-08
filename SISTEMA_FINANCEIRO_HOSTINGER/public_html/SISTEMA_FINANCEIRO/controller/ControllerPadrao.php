<?php

abstract class ControllerPadrao {
    /* Método disparado no Redirecionador.php, deve implementar o método padrão do controlador */

    abstract function processa();

    /* Processa informações para inclusão, deve carregar um modelo de dados com as informações vindas do POST e mandar gravar */

    public function processaInclusao() {

    }

    /* Processa informações para alteracao, deve carregar um modelo de dados com as informações vindas do POST e mandar alterar */

    public function processaAlteracao() {

    }

    /* Processa informações para exclusao, deve carregar um modelo de dados com as informações vindas do POST e mandar alterar */

    public function processaExclusao() {

    }

    /* Responsável por instanciar e chamar a montagem da tela
      Aqui vai a montagem da lista para a tela, bem como, informações de campos que precisam de dados do banco (select's, por Exemplo) */

    public function montaTela() {
        //busca o metodo montaTela de ViewPadrao
    }

}
