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
            	<div class="titulo">Cadastro de Técnicos:</div>
                <?php if(isset($_POST['send'])){
					$NomeTecnicos = $_POST['NomeTecnicos'];
					$IdentificadorFormaPagamento = md5($GerarNumero);
					
					if($NomeTecnicos == ''){
						echo'<span class="ms al">Nome do Tecnicos deve ser preenchido!!</span>';
					}else{
						$Insert = mysqli_query($_SG['link'],"INSERT INTO tecnicos(Identificador, Nome, DataCadastro, Status, IdUsuario) VALUES('$IdentificadorFormaPagamento', '$NomeTecnicos', '$DataHoje', '0', '$IdUsuario')");
						echo"<script>alert('Tecnicos cadastrada com sucesso!')</script>";
						echo"<script>window.location = 'TecnicosInsert.php'</script>";
					}
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Tecnico:</span>
                        <input type="text" name="NomeTecnicos" value="" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>