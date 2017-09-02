<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <?php
		$Resgate = $_GET['Fornecedor']; 
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
						$Update = mysqli_query($_SG['link'],"UPDATE fornecedores SET Fantasia = '$FantasiaFornecedores', Razao = '$RazaoFornecedores', CNPJ = '$CNPJFornecedores', Telefone = '$TelefoneFornecedores', Endereco = '$EnderecoFornecedores' WHERE Identificador = '$Resgate'");
						echo"<script>alert('Fornecedor editado com sucesso!')</script>";
						echo"<script>window.location = 'FornecedoresList.php'</script>";
					}
					
				}
				?>
                <?php
					$Select = mysqli_query($_SG['link'],"SELECT * FROM fornecedores WHERE Identificador = '$Resgate'");
					while($ResultadoSelect = mysqli_fetch_array($Select)){
						$Fantasia = $ResultadoSelect['Fantasia'];
						$Razao = $ResultadoSelect['Razao'];
						$CNPJ = $ResultadoSelect['CNPJ'];
						$Telefone = $ResultadoSelect['Telefone'];
						$Endereco = $ResultadoSelect['Endereco'];
					}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Fantasia:</span>
                        <input type="text" name="Fantasia" value="<?php echo $Fantasia ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Razão:</span>
                        <input type="text" name="Razao" value="<?php echo $Razao ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">CNPJ:</span>
                        <input type="text" name="CNPJ" value="<?php echo $CNPJ ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Endereço:</span>
                        <input type="text" name="Endereco" value="<?php echo $Endereco ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Telefone:</span>
                        <input type="text" name="Telefone" value="<?php echo $Telefone ?>" />
                    </label>
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>