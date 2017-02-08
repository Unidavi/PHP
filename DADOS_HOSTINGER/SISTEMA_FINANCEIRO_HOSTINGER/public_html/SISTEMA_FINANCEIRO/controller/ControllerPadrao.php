<?php

abstract class ControllerPadrao {
    /* M�todo disparado no Redirecionador.php, deve implementar o m�todo padr�o do controlador */

    abstract function processa();

    /* Processa informa��es para inclus�o, deve carregar um modelo de dados com as informa��es vindas do POST e mandar gravar */

    public function processaInclusao() {

    }

    /* Processa informa��es para alteracao, deve carregar um modelo de dados com as informa��es vindas do POST e mandar alterar */

    public function processaAlteracao() {

    }

    /* Processa informa��es para exclusao, deve carregar um modelo de dados com as informa��es vindas do POST e mandar alterar */

    public function processaExclusao() {

    }

    /* Respons�vel por instanciar e chamar a montagem da tela
      Aqui vai a montagem da lista para a tela, bem como, informa��es de campos que precisam de dados do banco (select's, por Exemplo) */

    public function montaTela() {
        //busca o metodo montaTela de ViewPadrao
    }

}
