<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    <?php
		$Resgate = $_GET['Categoria']; 
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
            	<div class="titulo">Cadastro de Fornecedores:</div>
                <?php if(isset($_POST['send'])){
					$NomeCategoria = $_POST['NomeCat'];
					$IdentificadorCategoria = md5($GerarNumero);
					
					if($NomeCategoria == ''){
						echo"<span class=\"ms al\">O campo nome deve ser preenchidos</span>";
					}else{
						$Update = mysqli_query($_SG['link'],"UPDATE categoria SET Nome = '$NomeCategoria' WHERE Identificador = '$Resgate'");
						echo"<script>alert('Categoria editada com sucesso!')</script>";
						echo"<script>window.location = 'CategoriaList.php'</script>";
					}
				}
				?>
                <?php
					$Select = mysqli_query($_SG['link'],"SELECT * FROM categoria WHERE Identificador = '$Resgate'");
					while($ResultadoSelect = mysqli_fetch_array($Select)){
						$Nome = $ResultadoSelect['Nome'];
					}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Nome Categoria:</span>
                        <input type="text" name="NomeCat" value="<?php echo $Nome ?>" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>