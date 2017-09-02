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
            	<div class="titulo">Listagem Os:<span class="btn"><a href="OsInsert.php">Inserir Novo</a></span>
                
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
                    <td>Técnico:</td>
                    <td>Situação:</td>
                    <td>Data Final:</td>
                    <td align="center" colspan="3">Ações:</td>
                  </tr>
                  <?php 
				  		$Busca = isset($_POST['id']) ? $_POST['id'] : 'SemBusca';
				  		$Quantidade = 10;
						$Pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
						$Inicio = ($Quantidade * $Pagina) - $Quantidade;
						$Select = mysqli_query($_SG['link'],"SELECT * FROM os WHERE Identificador LIKE '%$Busca%' AND IdUsuario = '$IdUsuario' AND Situacao = 'Orçamento' OR Situacao = 'Em espera' OR Situacao = 'Em execução' OR Situacao = 'Finalizada' ORDER BY Id DESC");
						while($ResultadoSelect = mysqli_fetch_array($Select)){
				  ?>
                  <?php if(isset($_GET['Os'])){
					  $Resgate = $_GET['Os'];
					  $Delete = mysqli_query($_SG['link'],"DELETE FROM os WHERE Identificador = '$Resgate'");
					  echo"<script>alert('Os deletado com sucesso!')</script>";
					  echo"<script>window.location = 'OsList.php'</script>";
				  }
				  ?>
                  <tr>
                  	 <td><?php echo $ResultadoSelect['Identificador'] ?></td>
                    <td><?php echo $ResultadoSelect['Tecnico'] ?></td>
                    <td><?php echo $ResultadoSelect['Situacao'] ?></td>
                    <td><?php echo $ResultadoSelect['DataFinal'] ?></td>
                    <td align="center"><a href="OsUpdate.php?Os=<?php echo $ResultadoSelect['Identificador'] ?>" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="OsList.php?Os=<?php echo $ResultadoSelect['Identificador'] ?>" title="excluir"><img src="ico/no.png" alt="excluir" title="excluir" /></a></td>
                    <td align="center"><a href="OsInfo.php?Os=<?php echo $ResultadoSelect['Identificador'] ?>" title="informações"><img src="ico/info.png" alt="informações" title="informações" /></a></td>
                  </tr>
                  <?php
						}
				  ?>
                </table>
                <div class="paginator">
                <?php
					$ListTotal = mysqli_query($_SG['link'],"SELECT Id FROM tecnicos WHERE IdUsuario = '$IdUsuario'");
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