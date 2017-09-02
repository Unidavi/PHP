<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <?php
		$Resgate = $_GET['Os'];
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
            	<div class="titulo">Cadastro de Os:</div>
                <?php if(isset($_POST['send'])){
					$ClienteOs = $_POST['Cliente'];
					$TecnicoOs = $_POST['Tecnico'];
					$ReferenciaOs = $_POST['Referencia'];
					$SituacaoOs = $_POST['Situacao'];
					$DataInicioOs = $_POST['DataInicio'];
					$DataFinalOs = $_POST['DataFinal'];
					$DefeitoRelatadoOs = $_POST['DefeitoRelatado'];
					$LaudoTecnicoOs = $_POST['LaudoTecnico'];
					$ObsGeraisOs = $_POST['ObsGeral'];
					$PrecoOs = $_POST['Preco'];
					$Identificador = md5($GerarNumero);
					
					$Insert = mysqli_query($_SG['link'],"UPDATE os SET Cliente = '$ClienteOs', Tecnico = '$TecnicoOs', Referencia = '$ReferenciaOs', Situacao = '$SituacaoOs', DataInicio = '$DataInicioOs', DataFinal = '$DataFinalOs', DefeitoRelatado = '$DefeitoRelatadoOs', LaudoTecnico = '$LaudoTecnicoOs', ObsGerais = '$ObsGeraisOs', Preco = '$PrecoOs' WHERE Identificador = '$Resgate'");
					echo"<script>alert('Os editada com sucesso!')</script>";
					echo"<script>window.location = 'OsList.php'</script>";
				}
				?>
                <?php
					$Select1 = mysqli_query($_SG['link'],"SELECT * FROM os WHERE Identificador = '$Resgate'");
					while($ResultadoSelect1 = mysqli_fetch_array($Select1)){
						$Cliente = $ResultadoSelect1['Cliente'];
						$Tecnico = $ResultadoSelect1['Tecnico'];
						$Referencia = $ResultadoSelect1['Referencia'];
						$Situacao = $ResultadoSelect1['Situacao'];
						$DataInicio = $ResultadoSelect1['DataInicio'];
						$DataFinal = $ResultadoSelect1['DataFinal'];
						$DefeitoRelatado = $ResultadoSelect1['DefeitoRelatado'];
						$LaudoTecnico = $ResultadoSelect1['LaudoTecnico'];
						$ObsGerais = $ResultadoSelect1['ObsGerais'];
						$Preco = $ResultadoSelect1['Preco'];
					}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Cliente:</span>
                        <select name="Cliente">
                        	<option value="<?php echo $Cliente ?>"><?php echo $Cliente ?></option>
                        	<?php
								$Select = mysqli_query($_SG['link'],"SELECT * FROM clientes WHERE IdUsuario = '$IdUsuario'");
								while($ResultadoSelect = mysqli_fetch_array($Select)){
									echo'<option value="'.$ResultadoSelect['Id'].'">'.$ResultadoSelect['Nome'].'</option>';
								}
							?>
                        </select>
                    </label>
                    <label class="line">
                    	<span class="data">Técnico:</span>
                        <select name="Tecnico">
                        	<option value="<?php echo $Tecnico ?>"><?php echo $Tecnico ?></option>
                        	<?php
								$Select = mysqli_query($_SG['link'],"SELECT * FROM tecnicos WHERE IdUsuario = '$IdUsuario'");
								while($ResultadoSelect = mysqli_fetch_array($Select)){
									echo'<option value="'.$ResultadoSelect['Id'].'">'.$ResultadoSelect['Nome'].'</option>';
								}
							?>
                        </select>
                    </label>
                    <label class="line">
                    	<span class="data">Referencia:</span>
                        <input type="text" name="Referencia" value="<?php echo $Referencia ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Situação:</span>
                        <select name="Situacao">
                        	<option value="<?php echo $Situacao ?>"><?php echo $Situacao ?></option>
                            <option value="" disabled="disabled">------------------------</option>
                        	<option value="Orçamento">Orçamento</option>
                            <option value="Em espera">Em espera</option>
                            <option value="Em execução">Em execução</option>
                            <option value="Finalizada">Finalizada</option>
                            <option value="Entrege">Entrege</option>
                        </select>
                    </label>
                    <label class="line">
                    	<span class="data">Data Inicio:</span>
                        <input type="text" name="DataInicio" value="<?php echo $DataInicio ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Data Final:</span>
                        <input type="text" name="DataFinal" value="<?php echo $DataFinal ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Defeito Relatado:</span>
                        <input type="text" name="DefeitoRelatado" value="<?php echo $DefeitoRelatado ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">LaudoTécnico:</span>
                        <input type="text" name="LaudoTecnico" value="<?php echo $LaudoTecnico ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Obs Geral:</span>
                        <input type="text" name="ObsGeral" value="<?php echo $ObsGerais ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Preço:</span>
                        <input type="text" name="Preco" value="<?php echo $Preco ?>" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>