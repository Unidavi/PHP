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
            	<div class="titulo">Cadastro de Clientes:</div>
                <?php if(isset($_POST['send'])){
					$NomeClientes 			= $_POST['Nome'];
					$EnderecoClientes 		= $_POST['Endereco'];
					$TelefoneClientes 		= $_POST['Telefone'];
					$CelularClientes 		= $_POST['Celular'];
					$CPFClientes 			= $_POST['CPF'];
					$RgClientes 			= $_POST['Rg'];
					$IdentificadorClientes 	= md5($GerarNumero);
					
					if($NomeClientes == '' || $TelefoneClientes == ''){
						echo"<span class=\"ms al\">O campo nome e campo telefone devem ser preenchidos</span>";
					}else{
						$Insert = mysqli_query($_SG['link'],"INSERT INTO clientes(Identificador, IdUsuario, Nome, Endereco, Telefone, Celular, DataCadastro, Status, Rg, Cpf) VALUES('$IdentificadorClientes', '$IdUsuario', '$NomeClientes', '$EnderecoClientes', '$TelefoneClientes', '$CelularClientes', '$DataHoje', '0', '$RgClientes', '$CPFClientes')");
						echo"<script>alert('Cliente cadastro com sucesso!')</script>";
						echo"<script>window.location = 'ClientesInsert.php'</script>";
					}
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="Nome" value="<?php echo $NomeClientes ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Endereço:</span>
                        <input type="text" name="Endereco" value="<?php echo $EnderecoClientes ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Telefone:</span>
                        <input type="text" name="Telefone" value="<?php echo $TelefoneClientes ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Celular:</span>
                        <input type="text" name="Celular" value="<?php echo $CelularClientes ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Rg:</span>
                        <input type="text" name="Rg" value="<?php echo $RgClientes ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">CPF:</span>
                        <input type="text" name="CPF" value="<?php echo $CPFClientes ?>" />
                    </label>
                    <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>