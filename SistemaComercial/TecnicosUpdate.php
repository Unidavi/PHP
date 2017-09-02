<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <?php
		$Resgate = $_GET['Tecnicos']; 
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
            	<div class="titulo">Edição de Tecnicos:</div>
                <?php if(isset($_POST['send'])){
					$NomeTecnicos = $_POST['NomeTecnicos'];
					
					
					if($NomeTecnicos == ''){
						echo'<span class="ms al">Nome da forma de pagamento deve ser preenchido!!</span>';
					}else{
						$Update = mysqli_query($_SG['link'],"UPDATE tecnicos SET Nome = '$NomeTecnicos' WHERE Identificador = '$Resgate'");
						echo"<script>alert('Tecnicos editada com sucesso!')</script>";
						echo"<script>window.location = 'TecnicosList.php'</script>";
					}
				}
				?>
                <?php
					$Select = mysqli_query($_SG['link'],"SELECT * FROM tecnicos WHERE Identificador = '$Resgate'");
					while($ResultadoSelect = mysqli_fetch_array($Select)){
						$Nome = $ResultadoSelect['Nome'];
					}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Tecnico:</span>
                        <input type="text" name="NomeTecnicos" value="<?php echo $Nome ?>" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>