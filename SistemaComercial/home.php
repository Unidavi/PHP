<div class="pg">
        	<span style="display:none">
                <span class="ms ok">ok</span>
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </span>
            

            
            <div class="bloco home" style="display:block">
            	<div class="titulo">Relatório do sistema:</div>
                
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
				<script type="text/javascript">
                  google.load("visualization", "1", {packages:["corechart"]});
                  google.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Year');
                    data.addColumn('number', 'Contas a Receber');
					data.addColumn('number', 'Contas a Pagar');
                    data.addRows([
                      ['01/2012', <?php echo '88881';?>, <?php echo '11350';?>],
					  ['02/2012', <?php echo '21190';?>, <?php echo '17510';?>],
					  ['03/2012', <?php echo '18910';?>, <?php echo '19510';?>],
					  ['Mês atual', <?php echo '7512';?>, <?php echo '6810';?>]
                    ]);
            
                    var options = {
					  width: 980, height: 200,
                      title: 'Movimento Mensal:',
                      hAxis: {title: 'relátorio de 3 meses', titleTextStyle: {color: 'red'}},
					  pointSize: 8,
					  focusTarget: 'category'
                    };
            
                    var chart = new google.visualization.LineChart(document.getElementById('chart_divDois'));
                    chart.draw(data, options);
                  }
                </script>
                <div id="chart_divDois" style="width:990px; height:200px; float:left; border:3px solid #CCC; margin-bottom:15px;"></div>
                
                
                
				<table width="994" border="0" class="tbdados" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>Usuários cadastrados:</td>
                    <td>52</td>
                  </tr>
                  <tr>
                    <td>Usuários logados:</td>
                    <td>12</td>
                  </tr>
                  <tr class="ses">
                    <td colspan="2">Sessões:</td>
                  </tr>
                  <tr>
                    <td>Categorias:</td>
                    <td>8</td>
                  </tr>
                  <tr>
                    <td>Páginas:</td>
                    <td>2</td>
                  </tr>
                </table>
                
               
            </div><!-- /bloco home -->
            
            
        </div><!-- pg -->
