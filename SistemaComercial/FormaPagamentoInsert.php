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
            	<div class="titulo">Cadastro de Formas de Pagamento:</div>
                <?php if(isset($_POST['send'])){
					$NomeFormaPagamento = $_POST['FormaPagamento'];
					$IdentificadorFormaPagamento = md5($GerarNumero);
					
					if($NomeFormaPagamento == ''){
						echo'<span class="ms al">Nome da forma de pagamento deve ser preenchido!!</span>';
					}else{
						$Insert = mysqli_query($_SG['link'],"INSERT INTO formapagamento(Identificador, Nome, DataCadastro, Status, IdUsuario) VALUES('$IdentificadorFormaPagamento', '$NomeFormaPagamento', '$DataHoje', '0', '$IdUsuario')");
						echo"<script>alert('Forma de pagamento cadastrada com sucesso!')</script>";
						echo"<script>window.location = 'FormaPagamentoInsert.php'</script>";
					}
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Forma de Pagamento:</span>
                        <input type="text" name="FormaPagamento" value="" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>