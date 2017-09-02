<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <?php
		$Resgate = $_GET['Cliente']; 
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
            	<div class="titulo">Cadastro de Clientes:</div>
                <?php if(isset($_POST['send'])){
					$NomeClientes 			= $_POST['Nome'];
					$EnderecoClientes 		= $_POST['Endereco'];
					$TelefoneClientes 		= $_POST['Telefone'];
					$CelularClientes 		= $_POST['Celular'];
					$CPFClientes 			= $_POST['CPF'];
					$RgClientes 			= $_POST['Rg'];
					
					if($NomeClientes == '' || $TelefoneClientes == ''){
						echo"<span class=\"ms al\">O campo nome e campo telefone devem ser preenchidos</span>";
					}else{
						$Update = mysqli_query($_SG['link'],"UPDATE clientes SET Nome = '$NomeClientes', Endereco = '$EnderecoClientes', Telefone = '$TelefoneClientes', Celular = '$CelularClientes', Cpf = '$CPFClientes', Rg = '$RgClientes' WHERE Identificador = '$Resgate'");
						echo"<script>alert('Cliente editado com sucesso!')</script>";
						echo"<script>window.location = 'ClientesList.php'</script>";
					}
				}
				?>
                <?php
					$Select = mysqli_query($_SG['link'],"SELECT * FROM clientes WHERE Identificador = '$Resgate'");
					while($ResultadoSelect = mysqli_fetch_array($Select)){
						$Nome = $ResultadoSelect['Nome'];
						$Endereco = $ResultadoSelect['Endereco'];
						$Telefone = $ResultadoSelect['Telefone'];
						$Celular = $ResultadoSelect['Celular'];
						$Rg = $ResultadoSelect['Rg'];
						$CPF = $ResultadoSelect['Cpf'];
					}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="Nome" value="<?php echo $Nome ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Endereço:</span>
                        <input type="text" name="Endereco" value="<?php echo $Endereco ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Telefone:</span>
                        <input type="text" name="Telefone" value="<?php echo $Telefone ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Celular:</span>
                        <input type="text" name="Celular" value="<?php echo $Celular ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Rg:</span>
                        <input type="text" name="Rg" value="<?php echo $Rg ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">CPF:</span>
                        <input type="text" name="CPF" value="<?php echo $CPF ?>" />
                    </label>
                    <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>