<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <?php
		//$UpDateVenda = mysqli_query($_SG['link'],"UPDATE produtos SET QtdVenda = '1', Status = '0' WHERE IdUsuario = '$IdUsuario'");
	?>
    <div id="content">
    	<div class="pg">
        	<span style="display:none">
                <span class="ms ok">ok</span>
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </span>
            <div class="bloco list" style="display:block">
            	<div class="titulo">Produtos Não Serem Inseridos na Venda
                	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="id" class="radius" size="30" value="Titulo:" 
                            onclick="if(this.value=='Titulo:')this.value=''" 
                            onblur="if(this.value=='')this.value='Titulo:'"
                            />
                        </label>
                        <input type="submit" value="filtrar resultados" name="sendFiltro" class="btn" />
                    </form>
                
                </div><!-- /titulo -->
                                             
                <table width="1000" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                  	<td>Código:</td>
                    <td>Nome:</td>
                    <td align="center">Preço Venda:</td>
                    <td align="center">QTD Estoque:</td>
                    <td align="center" colspan="3">Ações:</td>
                  </tr>
                  <?php 
				  		$Busca = isset($_POST['id']) ? $_POST['id'] : 'SemBusca';
				  		$Quantidade = 5;
						$Pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
						$Inicio = ($Quantidade * $Pagina) - $Quantidade;
						$Select = mysqli_query($_SG['link'],"SELECT * FROM produtos WHERE Nome LIKE '%$Busca%' AND IdUsuario = '$IdUsuario' AND Status = '0' ORDER BY Id DESC");
						while($ResultadoSelect = mysqli_fetch_array($Select)){
				  ?>
                  
                  <tr>
                  	<td><?php echo $ResultadoSelect['Identificador'] ?></td>
                    <td><?php echo $ResultadoSelect['Nome'] ?></td>
                    <td align="center"><?php echo number_format($ResultadoSelect['PrecoVenda'], 2,",",".") ?></td>
                    <td align="center"><?php echo $ResultadoSelect['QtdEstoque'] ?></td>
                    <?php if(isset($_POST['add'])){
						$QtdVenda = $_POST['Qtd1'];
						$QtdEstoque = $ResultadoSelect['QtdEstoque'] - $QtdVenda;
						$Identificador = $_POST['Identificador'];
						
						
						
						if($QtdVenda > $ResultadoSelect['QtdEstoque']){
							echo"<script>alert('Você não tem estoque suficiente!')</script>";
						}else{
						$UpDateInserirVenda = mysqli_query($_SG['link'],"UPDATE produtos SET QtdVenda = '$QtdVenda', Status = '1', QtdEstoque = '$QtdEstoque' WHERE Identificador = '$Identificador'");
						echo"<script>window.location = 'VendasInsert.php'</script>";
						}
					}
					?>
                    <form action="" method="post">
                    <input type="hidden" value="<?php echo $ResultadoSelect['Identificador'] ?>" name="Identificador"/>
                    <td align="center"><input type="text" value="1" name="Qtd1" style="width:20px"/></td>
                    <td align="center"><input type="submit" name="add" value="ADD" class="btn" style="margin:0;"/></td>
                    </form>
                  </tr>
                  <?php
						}
				  ?>
                </table>
                <div class="paginator">
                <?php
					$ListTotal = mysqli_query($_SG['link'],"SELECT Id FROM produtos WHERE IdUsuario = '$IdUsuario'");
					$ContarTotal = mysqli_num_rows($ListTotal);
					$TotalPagina = ceil($ContarTotal/$Quantidade);
					echo'<a href="?pagina=1">primeira</a>';
					for($i = 1; $i <= $TotalPagina; $i++){
						if($i == $Pagina){
							echo $i;
						}else{
							echo'<span class="selected"><a href="?pagina='.$i.'">'.$i.'</a></span>';
						}
						echo'<a href="?pagina='.$TotalPagina.'">última</a>';
					}
				?>
                </div><!-- /paginator -->
            </div><!-- /bloco list -->  
            <div class="bloco list" style="display:block">
            	<div class="titulo">Produtos na Venda
                	
                </div><!-- /titulo -->
                                             
                <table width="1000" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                  	<td>Código:</td>
                    <td>Nome:</td>
                    <td align="center">Preço Venda:</td>
                    <td align="center">QTD Estoque:</td>
                    <td align="center" colspan="3">Ações:</td>
                  </tr>
                  <?php 
				  		$Busca = isset($_POST['id']) ? $_POST['id'] : 'SemBusca';
				  		$Quantidade = 5;
						$Pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
						$Inicio = ($Quantidade * $Pagina) - $Quantidade;
						$Select = mysqli_query($_SG['link'],"SELECT * FROM produtos WHERE Nome LIKE '%$Busca%' AND IdUsuario = '$IdUsuario' AND Status = '1' ORDER BY Id DESC");
						while($ResultadoSelect = mysqli_fetch_array($Select)){
				  ?>
                  
                  <tr>
                  	<td><?php echo $ResultadoSelect['Identificador'] ?></td>
                    <td><?php echo $ResultadoSelect['Nome'] ?></td>
                    <td align="center"><?php echo number_format($ResultadoSelect['PrecoVenda'], 2,",",".") ?></td>
                    <td align="center"><?php echo $ResultadoSelect['QtdEstoque'] ?></td>
                    <?php if(isset($_POST['del'])){
						$QtdVenda1 = $_POST['Qtd1'];
						$QtdEstoque1 = $ResultadoSelect['QtdEstoque'] + $QtdVenda1;
						$Identificador1 = $_POST['Identificador1'];
						
						$UpDateEstoque = mysqli_query($_SG['link'],"UPDATE produtos SET QtdEstoque = '$QtdEstoque1', Status = '0', QtdVenda = '1' WHERE Identificador = '$Identificador1'");
						
						echo"<script>window.location = 'VendasInsert.php'</script>";
					}
					?>
                    <?php
						$TotalProduto = $ResultadoSelect['PrecoVenda'] * $ResultadoSelect['QtdVenda'];
						$TotalProduto1 = $TotalProduto + $TotalProduto1;
						
                  		
					?>
                    <form action="" method="post">
                    
                    <input type="hidden" value="<?php echo $ResultadoSelect['Identificador'] ?>" name="Identificador1"/>
                    <input type="hidden" name="Total" />
                    <td align="center"><input type="text" value="<?php echo $ResultadoSelect['QtdVenda']; ?>"name="Qtd1" style="width:20px" readonly="readonly"/></td>
                    <td align="center"><input type="submit" name="del" value="DEL"class="btn" style="margin:0;"/></td>
                    </form>
                  </tr>
                  <?php
						}
				  ?>
                </table>
                <div class="paginator">
                <?php
					$ListTotal = mysqli_query($_SG['link'],"SELECT Id FROM produtos WHERE IdUsuario = '$IdUsuario'");
					$ContarTotal = mysqli_num_rows($ListTotal);
					$TotalPagina = ceil($ContarTotal/$Quantidade);
					echo'<a href="?pagina=1">primeira</a>';
					for($i = 1; $i <= $TotalPagina; $i++){
						if($i == $Pagina){
							echo $i;
						}else{
							echo'<span class="selected"><a href="?pagina='.$i.'">'.$i.'</a></span>';
						}
						echo'<a href="?pagina='.$TotalPagina.'">última</a>';
					}
				?>
                </div><!-- /paginator -->
            </div><!-- /bloco list -->  
            <div class="bloco form" style="display:block">
            <div class="titulo" style="margin:0 450px">R$ <?php echo number_format($TotalProduto1, 2,",",".") ?></div>
            </div>
            <div class="bloco form" style="display:block">
            	<div class="titulo">Finalização de Venda:</div>
                <form name="formulario" action="" method="post">
                <?php if(isset($_POST['send'])){
					$ClientesVendas 		= $_POST['Cliente'];
					$FormaPagamentoVendas 	= $_POST['FormaPagamento'];
					$TotalPagoVendas 		= $_POST['ValorPago'];
					$TrocoVendas = $TotalPagoVendas - $TotalProduto1;
					$Identificador2 = md5($GerarNumero);
					
					if($TotalPagoVendas < $TotalProduto1){
						echo"<script>alert('Total pago deve ser maior que total da venda!')</script>";
					}else{
						$Insert = mysqli_query($_SG['link'],"INSERT INTO vendas(IdUsuario, Identificador, FormaPagamento, TotalVenda, TotalPago, Troco, Cliente, DataVenda) VALUES('$IdUsuario', '$Identificador2', '$FormaPagamentoVendas', '$TotalProduto1', '$TotalPagoVendas', '$TrocoVendas', '$ClientesVendas', '$DataHoje')");
						$IdUltimaVenda = mysql_insert_id();
						$Select3 = mysqli_query($_SG['link'],"SELECT * FROM produtos WHERE Status = '1' AND IdUsuario = '$IdUsuario'");
						while($ResultadoSelect3 = mysqli_fetch_array($Select3)){
							$NomeProd = $ResultadoSelect3['Nome'].', ';
							$NomeProdutos = explode(',', $NomeProd);
							$CountProdutos = count($NomeProdutos);
						}
						for($i=0;$i<$CountProdutos;$i++){
							$NomeProdutosInsert = $NomeProdutos[$i];
							$Insert1 = mysqli_query($_SG['link'],"INSERT INTO itensvendas(IdentificadorVenda, Produtos) VALUES('$IdUltimaVenda', '$NomeProdutosInsert')");
						}
						echo"<script>alert('Venda Efetuada com sucesso!!!')</script>";
						echo"<script>window.location = 'VendasComp.php'</script>";
					}
				}
				?>
                
                    <label class="line">
                    	<span class="data">Cliente</span>
                        <select name="Cliente">
                        <?php	
							$Select1 = mysqli_query($_SG['link'],"SELECT * FROM clientes WHERE IdUsuario = '$IdUsuario'");
							while($ResultadoSelect1 = mysqli_fetch_array($Select1)){
								echo'<option value="'.$ResultadoSelect1['Id'].'">'.$ResultadoSelect1['Nome'].'</option>';
							}
						?>
                        </select>
                    </label>
                    <label class="line">
                    	<span class="data">Forma Pagamento</span>
                        <select name="FormaPagamento">
                        <?php	
							$Select2 = mysqli_query($_SG['link'],"SELECT * FROM formapagamento WHERE IdUsuario = '$IdUsuario'");
							while($ResultadoSelect2 = mysqli_fetch_array($Select2)){
								echo'<option value="'.$ResultadoSelect2['Id'].'">'.$ResultadoSelect2['Nome'].'</option>';
							}
						?>
                        </select>
                    </label>
                    <label class="line">
                    	<span class="data">Valor Pago</span>
                        <input type="text" name="ValorPago" value="" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>