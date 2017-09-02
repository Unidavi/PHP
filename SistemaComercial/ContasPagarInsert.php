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
            	<div class="titulo">Cadastro de Contas Pagar:</div>
                <?php if(isset($_POST['send'])){
					$Identificador = md5($GerarNumero);
					$DataCadastro = date('Y-m-d H:i:s');
					$DataVencimento = $_POST['DataVencimento'];
					$Valor = $_POST['Valor'];
					$Juros = $_POST['Juros'];
					$Fornecedor = $_POST['Fornecedor'];
					
					if($DataVencimento == '' || $Valor == '' || $Fornecedor == ''){
						echo'<span class="ms al">Todos os campos são obrigatórios</span>';
					}else{
						$Insert = mysqli_query($_SG['link'],"INSERT INTO contaspagar(Identificador, IdUsuario, DataCadastro, DataVencimento, Valor, Juros, Status, Fornecedor) VALUES('$Identificador', '$IdUsuario', '$DataCadastro', '$DataVencimento', '$Valor', '$Juros', '0', '$Fornecedor')");
						echo"<script>alert('Conta a pagar cadastrada com sucesso!')</script>";
						echo"<script>window.location = 'ContasPagarInsert.php'</script>";
					}
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Data Vencimento(YYYY-MM-DD HH:MM:SS):</span>
                        <input type="text" name="DataVencimento" value="<?php echo date('Y-m-d H:i:s');?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Valor:</span>
                        <input type="text" name="Valor" value="" />
                    </label>
                    <label class="line">
                    	<span class="data">Juros %:</span>
                        <input type="text" name="Juros" value="" />
                    </label>
                    <label class="line">
                    	<span class="data">Fornecedor:</span>
                        <select name="Fornecedor">
                        	<?php
								$Select = mysqli_query($_SG['link'],"SELECT * FROM fornecedores WHERE IdUsuario = '$IdUsuario'");
								while($ResultadoSelect = mysqli_fetch_array($Select)){
									echo'<option value="'.$ResultadoSelect['Id'].'">'.$ResultadoSelect['Fantasia'].'</option>';
								}
							?>
                        	
                        </select>
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>