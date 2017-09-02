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
            	<div class="titulo">Formulário:</div>
                
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Campo:</span>
                        <input type="text" name="" value="" />
                        <span class="data">Campo:</span>
                        <input type="text" name="" value="" />
                        <span class="data">Campo:</span>
                        <input type="text" name="" value="" />
                    </label>
                    
                    <label class="line">
                    	<span class="data">Texto:</span>
                        <textarea name="" class="" rows="10"></textarea>
                    </label>
                    
                    <label class="line">
                    	<span class="data">Select:</span>
                        <select name="">
                        	<option value="">Selecione uma opção &nbsp;&nbsp;</option>
                        </select>
                    </label>
                    
                    <label class="line">
                    	<span class="data">Arquivo:</span>
                        <input type="file" class="fileinput" name="img" size="60" style="cursor:pointer; background:#FFF;" />
                    </label>
                    
                    <div class="check">
                    	<span class="data">CheckBox:</span>
                        <ul>
                            <li><label><input type="checkbox" value="1" /> Valor</label></li>
                            <li><label><input type="checkbox" value="1" /> Valor</label></li>
                            <li><label><input type="checkbox" value="1" /> Valor</label></li>
                            <li><label><input type="checkbox" value="1" /> Valor</label></li>
                        </ul>
                    </div>
                    
                    <div class="check">
                    	<span class="data">RadioButton:</span>
                        <ul>
                            <li><label><input type="radio" value="1" name="0" /> Valor</label></li>
                            <li><label><input type="radio" value="1" name="0" /> Valor</label></li>
                            <li class="last"><label><input type="radio" value="1" name="0" /> Valor</label></li>
                        </ul>
                    </div>
                    
                    <input type="reset" value="Limpar Campos" class="btnalt" />
                    <input type="submit" value="Cadastrar" name="sena" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
        </div><!-- pg -->
    </div><!-- /content -->
<?php include_once("includes/footer.php");?>