<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <?php
		$Resgate = $_GET['Produto']; 
	?>
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
						$Update = mysqli_query($_SG['link'],"UPDATE produtos SET IdCategoria = '$NomeCatProdutos', Nome = '$NomeProdutos', Descricao = '$DescricaoProdutos', PrecoCompra = '$PrecoCompraProdutos', PrecoVenda = '$PrecoVendaProdutos', QtdEstoque = '$QtdEstoqueProdutos' WHERE Identificador = '$Resgate'");
						echo"<script>alert('Produto editado com sucesso!')</script>";
						echo"<script>window.location = 'ProdutoList.php'</script>";
					}
				}
				?>
                <?php
					$Select = mysqli_query($_SG['link'],"SELECT * FROM produtos WHERE Identificador = '$Resgate'");
					while($ResultadoSelect = mysqli_fetch_array($Select)){
						$IdCategoria = $ResultadoSelect['IdCategoria'];
						$Nome = $ResultadoSelect['Nome'];
						$Descricao = $ResultadoSelect['Descricao'];
						$PrecoCompra = $ResultadoSelect['PrecoCompra'];
						$PrecoVenda = $ResultadoSelect['PrecoVenda'];
						$QtdEstoque = $ResultadoSelect['QtdEstoque'];
						$CPF = $ResultadoSelect['Cpf'];
					}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Categoria:</span>
                        <select name="Categoria">
                        <?php
							echo'<option value="'.$IdCategoria.'">'.$IdCategoria.'</option>';
							echo'<option value="" disabled="disabled">---------------------------</option>';
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
                        <input type="text" name="Nome" value="<?php echo $Nome ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Descrição:</span>
                        <input type="text" name="Descricao" value="<?php echo $Descricao ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Preço de Compra:</span>
                        <input type="text" name="PrecoCompra" value="<?php echo $PrecoCompra ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Preço de Venda:</span>
                        <input type="text" name="PrecoVenda" value="<?php echo $PrecoVenda ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Quantidade Estoque:</span>
                        <input type="text" name="QtdEstoque" value="<?php echo $QtdEstoque ?>" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>