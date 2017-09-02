<?php include_once("includes/header.php");?>
    <?php include_once('includes/menu.php');?>
    pagina cliente
    
    <div id="content">
    	<div class="pg">
        	<span style="display:none">
                <span class="ms ok">ok</span>
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </span>
            <div class="bloco form" style="display:block">
            	<div class="titulo">Configurações:</div>
                
                <?php if(isset($_POST['sena'])){
					$Nome = $_POST['Nome'];
					$Senha = $_POST['Senha'];
					
					if($Nome == '' || $Senha == ''){
						echo"<script>alert('Campo nome e campo senha são obrigatórios')</script>";
					}else{
						$EditarLogin = mysqli_query($_SG['link'],"UPDATE usuarios SET nome = '$Nome', senha = '$Senha' WHERE id = '$IdUsuario'");
						echo"<script>alert('Login alterado com sucesso!')</script>";
					}
				}
				?>
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="Nome" value="<?php echo $NomeUsuario ?>" />
                    </label>
                    <label class="line">
                    	<span class="data">Usuário:</span>
                        <input type="text" name="" value="<?php echo $LoginUsuario ?>" readonly/>
                    </label>
                    <label class="line">
                    	<span class="data">Senha:</span>
                        <input type="password" name="Senha" value="<?php echo $SenhaUsuario ?>" />
                    </label>
                    
                   
                    
                    
                    <input type="submit" value="Editar" name="sena" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>