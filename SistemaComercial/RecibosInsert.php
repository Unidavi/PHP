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
            	<div class="titulo">Cadastro de Recibos:</div>
                <?php if(isset($_POST['send'])){
					$ClienteRecibos = $_POST['Cliente'];
					$ValorRecibos = $_POST['Valor'];
					$ReferenteRecibos = $_POST['Referente'];
					$Identificador = md5($GerarNumero);
					$Data = date('d/m/Y');
					
					if($ValorRecibos == '' || $ClienteRecibos == ''){
						echo'<span class="ms no">Campo valor e campo cliente é obrigatório!</span>';
					}else{
						$Insert = mysqli_query($_SG['link'],"INSERT INTO recibos(IdUsuario, Identificador, Valor, Referente, Data, Cliente, Status) VALUES('$IdUsuario', '$Identificador', '$ValorRecibos', '$ReferenteRecibos', '$Data', '$ClienteRecibos', '0')");
						echo"<script>alert('Recibo cadastrado com sucesso!')</script>";
						echo"<script>window.location = 'RecibosInsert.php'</script>";
					}
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Cliente:</span>
                        <select name="Cliente">
                        	<?php
								$Select = mysqli_query($_SG['link'],"SELECT * FROM clientes WHERE IdUsuario = '$IdUsuario'");
								while($ResultadoSelect = mysqli_fetch_array($Select)){
									echo'<option value="'.$ResultadoSelect['Nome'].'">'.$ResultadoSelect['Nome'].'</option>';
								}
							?>
                        </select>
                    </label>
                    <label class="line">
                    	<span class="data">Valor:</span>
                        <input type="text" name="Valor" value="" />
                    </label>
                    <label class="line">
                    	<span class="data">Referente:</span>
                        <input type="text" name="Referente" value="" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>