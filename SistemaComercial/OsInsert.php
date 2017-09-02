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
					
					$Insert = mysqli_query($_SG['link'],"INSERT INTO os(Identificador, IdUsuario, Cliente, Tecnico, Referencia, Situacao, DataInicio, DataFinal, DefeitoRelatado, LaudoTecnico, ObsGerais, Preco) VALUES('$Identificador', '$IdUsuario', '$ClienteOs', '$TecnicoOs', '$ReferenciaOs', '$SituacaoOs', '$DataInicioOs', '$DataFinalOs', '$DefeitoRelatadoOs', '$LaudoTecnicoOs', '$ObsGeraisOs', '$PrecoOs')");
					echo"<script>alert('Os cadastrada com sucesso!')</script>";
					echo"<script>window.location = 'OsInsert.php'</script>";
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Cliente:</span>
                        <select name="Cliente">
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
                        <input type="text" name="Referencia" value="" />
                    </label>
                    <label class="line">
                    	<span class="data">Situação:</span>
                        <select name="Situacao">
                        	<option value="Orçamento">Orçamento</option>
                            <option value="Em espera">Em espera</option>
                            <option value="Em execução">Em execução</option>
                            <option value="Finalizada">Finalizada</option>
                            <option value="Entrege">Entrege</option>
                        </select>
                    </label>
                    <label class="line">
                    	<span class="data">Data Inicio:</span>
                        <input type="text" name="DataInicio" value="<?php echo date('Y-m-d H:i:s') ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Data Final:</span>
                        <input type="text" name="DataFinal" value="<?php echo date('Y-m-d H:i:s') ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Defeito Relatado:</span>
                        <input type="text" name="DefeitoRelatado" value="" />
                    </label>
                    <label class="line">
                    	<span class="data">LaudoTécnico:</span>
                        <input type="text" name="LaudoTecnico" value="" />
                    </label>
                    <label class="line">
                    	<span class="data">Obs Geral:</span>
                        <input type="text" name="ObsGeral" value="" />
                    </label>
                    <label class="line">
                    	<span class="data">Preço:</span>
                        <input type="text" name="Preco" value="" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>