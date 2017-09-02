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
            	<div class="titulo">Cadastro de Fornecedores:</div>
                <?php if(isset($_POST['send'])){
					$FantasiaFornecedores 		= $_POST['Fantasia'];
					$RazaoFornecedores 			= $_POST['Razao'];
					$CNPJFornecedores 			= $_POST['CNPJ'];
					$EnderecoFornecedores 		= $_POST['Endereco'];
					$TelefoneFornecedores 		= $_POST['Telefone'];
					$IdentificadorFornecedores 	= md5($GerarNumero);
					
					if($FantasiaFornecedores == '' || $TelefoneFornecedores == ''){
						echo'<span class="ms al">Fantasia e telefone são obrigatórios!</span>';
					}else{
						$Insert = mysqli_query($_SG['link'],"INSERT INTO fornecedores(Identificador, IdUsuario, Fantasia, Razao, CNPJ, Telefone, Endereco, DataCadastro, Status) VALUES('$IdentificadorFornecedores', '$IdUsuario', '$FantasiaFornecedores' ,'$RazaoFornecedores', '$CNPJFornecedores', '$TelefoneFornecedores', '$EnderecoFornecedores', '$DataHoje', '0')");
						echo"<script>alert('Fornecedor cadastro com sucesso!')</script>";
						echo"<script>window.location = 'FornecedoresInsert.php'</script>";
					}
					
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Fantasia:</span>
                        <input type="text" name="Fantasia" value="<?php echo $FantasiaFornecedores ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Razão:</span>
                        <input type="text" name="Razao" value="<?php echo $RazaoFornecedores ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">CNPJ:</span>
                        <input type="text" name="CNPJ" value="<?php echo $CNPJFornecedores ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Endereço:</span>
                        <input type="text" name="Endereco" value="<?php echo $EnderecoFornecedores ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Telefone:</span>
                        <input type="text" name="Telefone" value="<?php echo $TelefoneFornecedores ?>" />
                    </label>
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>