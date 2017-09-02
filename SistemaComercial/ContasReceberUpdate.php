<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
<?php
	$Resgate = $_GET['ContasReceber'];
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
            	<div class="titulo">Edição de Contas Receber:</div>
                <?php if(isset($_POST['send'])){
					$DataVencimento = $_POST['DataVencimento'];
					$Valor = $_POST['Valor'];
					$Juros = $_POST['Juros'];
					$Cliente = $_POST['Cliente'];
					
					if($DataVencimento == '' || $Valor == '' || $Cliente == ''){
						echo'<span class="ms al">Todos os campos são obrigatórios</span>';
					}else{
						$Insert = mysqli_query($_SG['link'],"UPDATE contasreceber SET DataVencimento = '$DataVencimento', Valor = '$Valor', Juros = '$Juros',Cliente = '$Cliente' WHERE Identificador = '$Resgate'");
						echo"<script>alert('Conta a receber editada com sucesso!')</script>";
						echo"<script>window.location = 'ContasReceberList.php'</script>";
					}
				}
				?>
                <?php
					$Select1 = mysqli_query($_SG['link'],"SELECT * FROM contasreceber WHERE Identificador = '$Resgate'");
					while($ResultadoSelect1 = mysqli_fetch_array($Select1)){
						$DataVencimento1 = $ResultadoSelect1['DataVencimento'];
						$Valor1 = $ResultadoSelect1['Valor'];
						$Juros1 = $ResultadoSelect1['Juros'];
					}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Data Vencimento(YYYY-MM-DD HH:MM:SS):</span>
                        <input type="text" name="DataVencimento" value="<?php echo $DataVencimento1 ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Valor:</span>
                        <input type="text" name="Valor" value="<?php echo $Valor1 ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Juros %:</span>
                        <input type="text" name="Juros" value="<?php echo $Juros1 ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Cliente:</span>
                        <select name="Cliente">
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