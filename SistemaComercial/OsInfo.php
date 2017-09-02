<?php include_once("includes/header.php");?>
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
            <?php
				$Select = mysqli_query($_SG['link'],"SELECT * FROM os WHERE Identificador = '$Resgate'");
				while($ResultadoSelect = mysqli_fetch_array($Select)){
					$Identificador = $ResultadoSelect['Identificador'];
					$Valor = $ResultadoSelect['Preco'];
					$Cliente = $ResultadoSelect['Cliente'];
					$Tecnico = $ResultadoSelect['Tecnico'];
					$Referencia = $ResultadoSelect['Referencia'];
					$Situacao = $ResultadoSelect['Situacao'];
					$DataIncio = $ResultadoSelect['DataInicio'];
					$DataFinal = $ResultadoSelect['DataFinal'];
					$DefeitoRelatado = $ResultadoSelect['DefeitoRelatado'];
					$LaudoTecnico = $ResultadoSelect['LaudoTecnico'];
					$ObsGerais = $ResultadoSelect['ObsGerais'];
				}
			?>
            <span style="margin:0 900px;">
            <a href="OsList.php"><< Voltar</a>
            </span>
            <div class="bloco list" style="display:block">
            	<div class="titulo"><?php echo $Identificador ?> - <?php echo number_format($Valor,2,",",".") ?>
                
                	
                </div><!-- /titulo -->
                                             
                <table width="1000" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td align="center">Cliente:</td>
                    <td align="center">Técnicos:</td>
                    <td align="center">Referencia:</td>
                    <td align="center">Situação:</td>
                  </tr>
                  <tr>
                    <td align="center"><?php echo $Cliente; ?></td>
                    <td align="center"><?php echo $Tecnico; ?></td>
                    <td align="center"><?php echo $Referencia; ?></td>
                    <td align="center"><?php echo $Situacao; ?></td>
                  </tr>
                  <tr class="ses">
                    <td align="center">Data Inicio:</td>
                    <td align="center">Data Final:</td>
                    <td align="center">Defeito Relatado:</td>
                    <td align="center">Laudo Técnico:</td>
                  </tr>
                  <tr>
                    <td align="center"><?php echo $DataIncio; ?></td>
                    <td align="center"><?php echo $DataFinal; ?></td>
                    <td align="center"><?php echo $DefeitoRelatado; ?></td>
                    <td align="center"><?php echo $LaudoTecnico; ?></td>
                  </tr>
                  <tr class="ses">
                    <td align="center">Obs Geral:</td>
                    <td align="center">Preço:</td>
                    <td align="center" colspan="2">Código:</td>
                  </tr>
                  <tr>
                    <td align="center"><?php echo $ObsGerais; ?></td>
                    <td align="center"><?php echo $Valor; ?></td>
                    <td align="center" colspan="2"><?php echo $Identificador; ?></td>
                  </tr>
                </table>
            </div><!-- /bloco list -->     
            
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>