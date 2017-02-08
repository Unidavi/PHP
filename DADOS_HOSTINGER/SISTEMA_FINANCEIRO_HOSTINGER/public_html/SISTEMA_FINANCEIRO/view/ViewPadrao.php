<?php

/**
 * Responsável por apresentar os dados aos usuários
 */
abstract class ViewPadrao {
    /* Em caso de consultas, representa o array com os modelos para criação da tabela */

    protected $listaModel;

    /* Responsável por montar o cabeçalho */

    abstract function montaTitulo();

    public function montaCabecalho() {
        $sHTML = '';
        $sHTML .= '<!-- Header -->
            <header id="header">
                <nav id="nav">
                    <ul>
                        <li><a href="index.php?pagina=Home">Home</a></li>
                        <li>
                            <a href="cadastro.php">Cadastros</a>
                            <ul>
                                <li><a href="index.php?pagina=Pessoa">Pessoa</a></li>
                                <li><a href="index.php?pagina=Home">Produto</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?pagina=Home">Faturamento</a>
                            <ul>
                                <li><a href="index.php?pagina=Home">Pedido</a></li>
                                <li><a href="index.php?pagina=Home">Nota</a></li>
                                <li><a href="index.php?pagina=Home">Grupo Fiscal</a></li>
                                <li><a href="index.php?pagina=Home">Tipo de Nota</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?pagina=Home">Financeiro</a>
                            <ul>
                                <li><a href="index.php?pagina=Home">Contas a Pagar</a></li>
                                <li><a href="index.php?pagina=Home">Contas a Receber</a></li>
                                <li><a href="index.php?pagina=Home">Baixa Conta a Pagar</a></li>
                                <li><a href="index.php?pagina=Home">Baixa Contas a Receber</a></li>
                                <li><a href="index.php?pagina=Home">Condicao de Pagamento</a></li>
                                <li><a href="index.php?pagina=Home">Tipo de Cobranca</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?pagina=Home">Compras</a>
                            <ul>
                                <li><a href="index.php?pagina=Home">Controle de Estoque</a></li>
                                <li><a href="index.php?pagina=Home">Nota de Entrada</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?pagina=Home">Relatorios</a>
                            <ul>
                                <li><a href="index.php?pagina=Home">Pessoa</a></li>
                                <li><a href="index.php?pagina=Home">Grupo Fiscal</a></li>
                                <li><a href="index.php?pagina=Home">Produto</a></li>
                                <li>
                                    <a href="index.php?pagina=Home">País / Estado / Município</a>
                                    <ul>
                                        <li><a href="index.php?pagina=Home">País</a></li>
                                        <li><a href="index.php?pagina=Home">Estado</a></li>
                                        <li><a href="#">Município</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?pagina=Home">Configuracao</a>
                            <ul>
                                <li><a href="?pagina=Filial">Filial</a></li>
                                <li><a href="index.php?pagina=Usuario">Usuario</a></li>
                                <li><a href="index.php?pagina=GrupoUsuario">Grupo de Usuario</a></li>
                                <li><a href="index.php?pagina=Atualizacao">Atualizacao</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php?pagina=Usuario"><input type="button" value="Cadastrar"/></a>
                        </li>
                        <li>
                            <a href="index.php?pagina=Home"><input type="button" value="Entrar"/></a>
                        </li>
                    </ul>
                </nav>
            </header>';
        echo $sHTML;
    }

    /* Responsável por montar a consulta */

    public function montaConsulta() {

    }

    /* Responsável por montar o formulário para cadastrar as informações */

    abstract public function montaFormulario();

    /* Procedimento chamado para inicialização da tela */

    public function montaTela() {
        $this->montaCabecalho();
        $this->montaTitulo();
        $this->montaFormulario();
        $this->montaConsulta();
        $this->montaRodape();
    }

    /* Setter's e Getter's */

    function getListaModel() {
        return $this->listaModel;
    }

    function setListaModel($listaModel) {
        $this->listaModel = $listaModel;
    }

    /* Responsável por montar o rodapé padrão */

    public function montaRodape() {
        $sHTML = '';
        $sHTML .= '<!-- Five -->
            <section id="five" class="wrapper style2 special fade">
                <div class="container">
                    <header>
                        <h2>Magna faucibus lorem diam</h2>
                        <p>Ante metus praesent faucibus ante integer id accumsan eleifend</p>
                    </header>
                    <form method="post" action="#" class="container 50%">
                        <div class="row uniform 50%">
                            <div class="8u 12u$(xsmall)"><input type="email" name="email" id="email" placeholder="Your Email Address" /></div>
                            <div class="4u$ 12u$(xsmall)"><input type="submit" value="Get Started" class="fit special" /></div>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Footer -->
            <footer id="footer">
                <ul class="icons">
                    <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
                    <li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; Gelvazio Camargo. All rights reserved.</li><li>Design by:<a href="http://html5up.net">HTML5 UP</a></li>;
                </ul>
            </footer>';
        echo $sHTML;
    }

}
