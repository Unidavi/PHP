<?php 
$NivelUsuario = isset($NivelUsuario) ? $NivelUsuario : false;

if($NivelUsuario == 'admin'){
?>
<ul id="MenuBar1" class="MenuBarHorizontal" style="font:12px Arial, Helvetica, sans-serif; margin:0 10px;">
  <li><a href="#" class="MenuBarItemSubmenu">Administra&ccedil;&atilde;o</a>
    <ul>
      <li><a href="MudarSenha.php">Mudar Senha</a></li>
      <li><a href="../sair.php">Sair</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Cadastros</a>
    <ul>
      <li><a href="ClientesList.php">Clientes</a></li>
      <li><a href="FornecedoresList.php">Fornecedores</a></li>
      <li><a href="CategoriaList.php">Categorias</a></li>
      <li><a href="ProdutoList.php">Produtos</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Estoque</a>
    <ul>
      <li><a href="Saidas.php">Saidas</a></li>
      <li><a href="Entradas.php">Entradas</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Docs Fiscais</a>
    <ul>
      <li><a href="FormaPagamentoList.php">Formas de Pagamento</a></li>
      <li><a href="VendasList.php">Vendas</a></li>
      <li><a href="FluxoCaixaList.php">Fluxo de Caixa</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Financeiro</a>
    <ul>
      <li><a href="ContasPagarList.php">Contas Pagar</a></li>
      <li><a href="ContasReceberList.php">Contas Receber</a></li>
      <li><a href="#" class="MenuBarItemSubmenu">Manuten&ccedil;&atilde;o</a>
        <ul>
          <li><a href="ContasPagarListManu.php">Contas Pagar</a></li>
          <li><a href="ContasReceberListManu.php">Contas Receber</a></li>
        </ul>
      </li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Ordem de Servi&ccedil;o</a>
    <ul>
      <li><a href="OsList.php">Nova Ordem de Servi&ccedil;o</a></li>
      <li><a href="TecnicosList.php">T&eacute;cnicos</a></li>
      <li><a href="#" class="MenuBarItemSubmenu">Manuten&ccedil;&atilde;o</a>
        <ul>
          <li><a href="OsListManu.php">Ordem de Servi&ccedil;o</a></li>
        </ul>
      </li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Utilidades</a>
    <ul>
      <li><a href="RecibosList.php">Recibos</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Relat&oacute;rios</a>
    <ul>
      <li><a href="CategoriaRel.php">Categorias</a></li>
      <li><a href="FormaPagamentoRel.php">Formas de Pagamento</a></li>
      <li><a href="TecnicosRel.php">T&eacute;cnicos</a></li>
      <li><a href="ClientesRel.php">Clientes</a></li>
      <li><a href="ProdutosRel.php">Produtos</a></li>
      <li><a href="FornecedoresRel.php">Fornecedores</a></li>
    </ul>
  </li>
</ul>
<?php
} elseif  ($NivelUsuario == 'cliente'){
?>
<ul id="MenuBar1" class="MenuBarHorizontal" style="font:12px Arial, Helvetica, sans-serif; margin:0 10px;">
  <li><a href="#" class="MenuBarItemSubmenu">Cliente</a>
    <ul>
      <li><a href="MudarSenha.php">Mudar Senha</a></li>
      <li><a href="../sair.php">Sair</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Conte&uacute;do Curso</a>
    <ul>
      <li><a href="#">M&oacute;dulo #1</a></li>
      <li><a href="#">M&oacute;dulo #2</a></li>
      <li><a href="#">M&oacute;dulo #3</a></li>
      <li><a href="#">M&oacute;dulo #4</a></li>
      <li><a href="#">M&oacute;dulo #5</a></li>
      <li><a href="#">M&oacute;dulo #6</a></li>
      <li><a href="#">M&oacute;dulo #7</a></li>
      <li><a href="#">M&oacute;dulo #8</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Vendas</a>
    <ul>
      <li><a href="#">Minhas Vendas</a></li>
      <li><a href="#">Estatisticas</a></li>
    </ul>
  </li>
  <li><a href="#" class="MenuBarItemSubmenu">Divulga&ccedil;&atilde;o</a>
    <ul>
      <li><a href="#">Banners</a></li>
    </ul>
  </li>
</ul>
<?php
}
?>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
