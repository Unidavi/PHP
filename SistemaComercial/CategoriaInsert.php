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
            	<div class="titulo">Cadastro de Categorias:</div>
                <?php 
                if(isset($_POST['send'])){
                    $NomeCategoria = $_POST['NomeCat'];
                    $IdentificadorCategoria = md5($GerarNumero);

                    if($NomeCategoria == ''){
                        echo"<span class=\"ms al\">O campo nome deve ser preenchidos</span>";
                    }else{
                        $Insert = mysqli_query($_SG['link'],    "INSERT INTO categoria(Identificador, IdUsuario, Nome, DataCadastro, Status) VALUES('$IdentificadorCategoria', '$IdUsuario', '$NomeCategoria', '$DataHoje', '0')");
                        echo"<script>alert('Categoria cadastra com sucesso!')</script>";
                        echo"<script>window.location = 'CategoriaInsert.php'</script>";
                    }
                }
		?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Nome Categoria:</span>
                        <input type="text" name="NomeCat" value="" />
                    </label>
                   
                   <input type="submit" value="Salvar" name="send" class="btn" />
                    
                </form>
                	
            </div>
        </div>
    </div>
<?php include_once("includes/footer.php");?>