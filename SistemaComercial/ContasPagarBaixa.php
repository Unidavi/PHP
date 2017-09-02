<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
<?php
	$Resgate = $_GET['ContasPagar'];
?>
    <div id="content">
    	<div class="pg">
        	<span style="display:none">
                <span class="ms ok">ok</span>
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </span>
             <?php
					$Select1 = mysqli_query($_SG['link'],"SELECT * FROM contaspagar WHERE Identificador = '$Resgate'");
					while($ResultadoSelect1 = mysqli_fetch_array($Select1)){
						$DataVencimento1 = $ResultadoSelect1['DataVencimento'];
						$Valor1 = $ResultadoSelect1['Valor'];
						$Juros1 = $ResultadoSelect1['Juros'];
						if($DataVencimento1 < date('Y-m-d H:i:s')){
							$TotalPagar = $Juros1 / 100 * $Valor1;
							$TotalPagar1 = $TotalPagar + $Valor1;
						}
						
					}
				?>
            <div class="bloco form" style="display:block">
            	<div class="titulo">Cadastro de Contas Pagar:</div>
                <?php if(isset($_POST['send'])){
					$Historico = $_POST['Historico'];
					$ValorPago = $_POST['ValorPago'];
					if($ValorPago < $TotalPagar1){
						echo"<script>alert('Você deve pagar tudo!')</script>";
					}elseif($Historico == '' || $ValorPago == ''){
						echo"<script>alert('Você deve preencher tudo!')</script>";
					}else{
					$Insert = mysqli_query($_SG['link'],"UPDATE contaspagar SET Historico = '$Historico', ValorPago = '$ValorPago', Status = '1'  WHERE Identificador = '$Resgate'");
					echo"<script>alert('Conta a pagar baixada com sucesso!')</script>";
					echo"<script>window.location = 'ContasPagarList.php'</script>";
					}
				}
				?>
               
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Data Vencimento(YYYY-MM-DD HH:MM:SS):</span>
                        <input type="text" name="DataVencimento" value="<?php echo $DataVencimento1 ?>" readonly="readonly"/>
                    </label>
                    <label class="line">
                    	<span class="data">Valor:</span>
                        <input type="text" name="Valor" value="<?php echo $Valor1 ?>" readonly="readonly"/>
                    </label>
                    <label class="line">
                    	<span class="data">Juros %:</span>
                        <input type="text" name="Juros" value="<?php echo $Juros1 ?>" readonly="readonly"/>
                    </label>
                    <label class="line">
                    	<span class="data">Total a Pagar:</span>
                        <input type="text" name="TotalPagar" value="<?php echo $TotalPagar1 ?>" readonly="readonly"/>
                    </label>
                    <label class="line">
                    	<span class="data">Histórico:</span>
                        <input type="text" name="Historico" value=""/>
                    </label>
                    <label class="line">
                    	<span class="data">Valor Pago:</span>
                        <input type="text" name="ValorPago" value=""/>
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>