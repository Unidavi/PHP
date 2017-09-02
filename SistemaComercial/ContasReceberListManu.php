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
            <div class="bloco list" style="display:block">
            	<div class="titulo">Listagem Contas Pagar:<span class="btn"><a href="ContasPagarInsert.php">Inserir Novo</a></span>
                
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
                    <td align="center">Valor:</td>
                    <td align="center">Fornecedor:</td>
                    <td align="center">Data Vencimento:</td>
                    
                  </tr>
                  <?php 
				  		$Busca = isset($_POST['id']) ? $_POST['id'] : 'SemBusca';
				  		$Quantidade = 10;
						$Pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
						$Inicio = ($Quantidade * $Pagina) - $Quantidade;
						$Select = mysqli_query($_SG['link'],"SELECT * FROM contasreceber WHERE Identificador LIKE '%$Busca%' AND IdUsuario = '$IdUsuario' AND Status = '1' ORDER BY Id DESC");
						while($ResultadoSelect = mysqli_fetch_array($Select)){
				  ?>
                 
                  <tr>
                    <td><?php echo $ResultadoSelect['Identificador'] ?></td>
                    <td align="center"><?php echo number_format($ResultadoSelect['Valor'],2,",",".") ?></td>
                    <td align="center"><?php echo $ResultadoSelect['Fornecedor'] ?></td>
                    <td align="center"><?php echo $ResultadoSelect['DataVencimento'] ?></td>
                    
                  </tr>
                  <?php
						}
				  ?>
                </table>
                <div class="paginator">
                <?php
					$ListTotal = mysqli_query($_SG['link'],"SELECT Id FROM contasreceber WHERE IdUsuario = '$IdUsuario'");
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