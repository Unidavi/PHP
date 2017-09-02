<?php include_once("includes/header.php");?>
<?php
	$IdUltimaVenda = mysql_insert_id();
	$Select = mysqli_query($_SG['link'],"SELECT * FROM vendas WHERE IdUsuario = '$IdUsuario' ORDER BY Id DESC LIMIT 1");
	while($ResultadoSelect = mysqli_fetch_array($Select)){
		$Identificador = $ResultadoSelect['Identificador'];
		$Troco		   = $ResultadoSelect['Troco'];
	}
?>
    <div id="content">
    	<div class="pg">
        	<span style="display:none">
                <span class="ms ok">ok</span>
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </span>
            <span style="margin:0 900px;">
            <a href="VendasList.php"><< Voltar</a>
            </span>
            <div class="bloco list" style="display:block">
            	<div class="titulo"><?php echo $Identificador ?> - <?php echo number_format($Troco,2,",",".") ?>
                
                	
                </div><!-- /titulo -->
                                             
                <table width="1000" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td align="center">Produtos:</td>
                    <td align="center">Quantidade:</td>
                    <td align="center">Valor Unitário:</td>
                    <td align="center">Valor Total:</td>
                  </tr>
                  <?php
				  		$Select1 = mysqli_query($_SG['link'],"SELECT * FROM produtos WHERE IdUsuario = '$IdUsuario' AND Status = '1'");
						while($ResultadoSelect1 = mysqli_fetch_array($Select1)){
							$Total = $ResultadoSelect1['PrecoVenda'] * $ResultadoSelect1['QtdVenda'];
				  ?>
                  <tr>
                    <td align="center"><?php echo $ResultadoSelect1['Nome']; ?></td>
                    <td align="center"><?php echo $ResultadoSelect1['QtdVenda']; ?></td>
                    <td align="center"><?php echo $ResultadoSelect1['PrecoVenda']; ?></td>
                    <td align="center"><?php echo $Total; ?></td>
                  </tr>
                  <?php 
				  		}
				  ?>
                </table>
            </div><!-- /bloco list -->     
            
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>