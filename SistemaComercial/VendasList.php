<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <?php
		$UpDate = mysqli_query($_SG['link'],"UPDATE produtos SET Status = '0' WHERE IdUsuario = '$IdUsuario'");
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
            	<div class="titulo">Listagem Vendas:<span class="btn"><a href="VendasInsert.php">Inserir Novo</a></span>
                
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
                    <td align="center">Total Venda:</td>
                    <td align="center">Forma Pagamento:</td>
                    <td align="center">Cliente:</td>
                    <td align="center" colspan="2">Ações:</td>
                  </tr>
                  <?php 
				  		$Busca = isset($_POST['id']) ? $_POST['id'] : 'SemBusca';
				  		$Quantidade = 10;
						$Pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
						$Inicio = ($Quantidade * $Pagina) - $Quantidade;
						$Select = mysqli_query($_SG['link'],"SELECT * FROM vendas WHERE Identificador LIKE '%$Busca%' AND IdUsuario = '$IdUsuario' ORDER BY Id DESC");
						while($ResultadoSelect = mysqli_fetch_array($Select)){
				  ?>
                  <?php if(isset($_GET['Venda'])){
					  $Resgate = $_GET['Venda'];
					  $Delete = mysqli_query($_SG['link'],"DELETE FROM vendas WHERE Identificador = '$Resgate'");
					  echo"<script>alert('Venda deletada com sucesso!')</script>";
					  echo"<script>window.location = 'VendasList.php'</script>";
				  }
				  ?>
                  <tr>
                    <td><?php echo $ResultadoSelect['Identificador'] ?></td>
                    <td align="center"><?php echo number_format($ResultadoSelect['TotalVenda'],2,",",".") ?></td>
                    <td align="center"><?php echo $ResultadoSelect['FormaPagamento'] ?></td>
                    <td align="center"><?php echo $ResultadoSelect['Cliente'] ?></td>
                    <td align="center"><a href="ProdutoList.php?Venda=<?php echo $ResultadoSelect['Identificador'] ?>" title="editar"><img src="ico/no.png" alt="excluir" title="excluir" /></a></td>
                  </tr>
                  <?php
						}
				  ?>
                </table>
                <div class="paginator">
                <?php
					$ListTotal = mysqli_query($_SG['link'],"SELECT Id FROM vendas WHERE IdUsuario = '$IdUsuario'");
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
            
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>