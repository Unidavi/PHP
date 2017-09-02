<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <div id="content">
    	<div class="pg">
        	<span style="display:none">
                <span class="ms ok">ok</span>
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </span>
            <div class="bloco form" style="display:block">
            	<div class="titulo">Cadastro de Produtos:</div>
				<?php if(isset($_POST['send'])){
					$NomeCatProdutos		= $_POST['Categoria'];
					$NomeProdutos 			= $_POST['Nome'];
					$DescricaoProdutos 		= $_POST['Descricao'];
					$PrecoCompraProdutos 	= $_POST['PrecoCompra'];
					$PrecoVendaProdutos 	= $_POST['PrecoVenda'];
					$QtdEstoqueProdutos 	= $_POST['QtdEstoque'];
					$IdentificadorProdutos 	= md5($GerarNumero);
					
					if($NomeCatProdutos == '' || $NomeProdutos == '' || $PrecoVendaProdutos == ''){
						echo"<span class=\"ms al\">O campo categoria, nome e campo preço venda devem ser preenchidos</span>";
					}else{
						$Insert = mysqli_query($_SG['link'],"INSERT INTO produtos(Identificador, IdUsuario,IdCategoria, Nome, Descricao, PrecoCompra, PrecoVenda, DataCadastro, Status, QtdEstoque) VALUES('$IdentificadorProdutos', '$IdUsuario', '$NomeCatProdutos', '$NomeProdutos', '$DescricaoProdutos', '$PrecoCompraProdutos', '$PrecoVendaProdutos', '$DataHoje', '0', '$QtdEstoqueProdutos')");
						echo"<script>alert('Produto cadastro com sucesso!')</script>";
						echo"<script>window.location = 'ProdutoInsert.php'</script>";
					}
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Categoria:</span>
                        <select name="Categoria">
                        <?php
							$Select = mysqli_query($_SG['link'],"SELECT * FROM categoria WHERE IdUsuario = '$IdUsuario'");
							$Contar = mysqli_num_rows($Select);
							if($Contar == 0){
								echo'<option value="" disabled="disabled">Não temos categorias</option>';
							}else{
								while($ResultadoSelect = mysqli_fetch_array($Select)){
									echo'<option value="'.$ResultadoSelect['Id'].'">'.$ResultadoSelect['Nome'].'</option>';
								}
							}
						?>
                        </select>
                    </label>
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="Nome" value="<?php echo $NomeProdutos ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Descrição:</span>
                        <input type="text" name="Descricao" value="<?php echo $DescricaoProdutos ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Preço de Compra:</span>
                        <input type="text" name="PrecoCompra" value="<?php echo $PrecoCompraProdutos ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Preço de Venda:</span>
                        <input type="text" name="PrecoVenda" value="<?php echo $PrecoVendaProdutos ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Quantidade Estoque:</span>
                        <input type="text" name="QtdEstoque" value="<?php echo $QtdEstoqueProdutos ?>" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>