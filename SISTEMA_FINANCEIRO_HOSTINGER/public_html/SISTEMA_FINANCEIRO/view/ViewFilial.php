<?php

class ViewFilial extends ViewPadrao {

    /**
     * @var ModelFilial
     */
    protected $Model;

    public function montaTitulo() {
        $sHTML = '';
        $sHTML .= '<h4><p>Cadastro de Filial</p></h4>';
        echo $sHTML;
    }

    public function montaConsulta() {
        $sHTML = '';
        $sHTML .= '<table class="tabela_consulta">';
        $sHTML .= '<tr><th colspan="10">Lista de Filiais Cadastradas</th><tr>';
        $sHTML .= '<tr>';
        $sHTML .= '<th>Selecionar</th>';
        $sHTML .= '<th>Código</th>';
        $sHTML .= '<th>Nome</th>';
        $sHTML .= '<th>Endereço</th>';
        $sHTML .= '<th>Cep</th>';
        $sHTML .= '<th>Bairro</th>';
        $sHTML .= '<th>Estado</th>';
        $sHTML .= '<th>Municipio</th>';
        $sHTML .= '<th>CNPJ</th>';
        $sHTML .= '<th colspan="2">Ações</th>';
        $sHTML .= '</tr>';
        if (count($this->listaModel) > 0) {
            foreach ($this->listaModel as /* @var $oModelFilial ModelFilial */ $oModelFilial) {
                $sHTML.= '<tr>';
                $sHTML.= '<td><input id="botaoSelecionar" type="checkbox" /></td>';
                $sHTML.= '<td>' . $oModelFilial->getFilcodigo() .  '</td>';
                $sHTML.= '<td>' . $oModelFilial->getFilnome() .    '</td>';
                $sHTML.= '<td>' . $oModelFilial->getFilendereco() .'</td>';
                $sHTML.= '<td>' . $oModelFilial->getFilcep() .     '</td>';
                $sHTML.= '<td>' . $oModelFilial->getFilbairro() .  '</td>';
                $sHTML.= '<td>' . $oModelFilial->getFilestado() .  '</td>';
                $sHTML.= '<td>' . $oModelFilial->getFilmunicipio().'</td>';
                $sHTML.= '<td>' . $oModelFilial->getFilcnpj() .    '</td>';
                $sHTML.= '<td>';
                $sHTML .= '<a href="#"><input class="button" id="botaoAlterar" type="button" value="Alterar" onclick="alteraFilial('
                        . '  ' . $oModelFilial->getFilcodigo() . ','
                        . '\'' . $oModelFilial->getFilnome() . '\','
                        . '\'' . $oModelFilial->getFilendereco() . '\','
                        . '\'' . $oModelFilial->getFilcep() . '\','
                        . '\'' . $oModelFilial->getFilbairro() . '\','
                        . '\'' . $oModelFilial->getFilestado() . '\','
                        . '\'' . $oModelFilial->getFilmunicipio() . '\','
                        . '\'' . $oModelFilial->getFilcnpj() . '\''
                        . ')"/></a>';
                $sHTML .= '<input class="button" id="botaoExcluir" type="button" value="Excluir" onclick="excluiFilial(' . $oModelFilial->getFilcodigo() . ')"/>';
                $sHTML.= '</td>';
                $sHTML.= '</tr>';
            }
        } else {
            $sHTML .= '<tr><td colspan="9" >Nenhuma Filial Cadastrada</td></tr>';
        }
        $sHTML .= '</table>';
        $sHTML .= '<hr>';
        echo $sHTML;
    }

    public function montaFormulario() {
        $sHTML = '';
        $sHTML .= '<table class="FormularioCadastro"><tr><td>';
        $sHTML .= '<form method="POST" action="index.php?pagina=Filial" id="formularioFilial">';
        $sHTML .= '<input type="hidden" name="acao" id="acao" value="inc"/>';
        $sHTML .= '<div class="field">
                       <label for="filcodigo">Código:</label>
                       <input class="label_formulario" type="text" id="filcodigo" name="filcodigo" size="5"/>
                    </div>';
        $sHTML .= '<div class="field">
                       <label for="filnome">Nome:</label>
                       <input class="label_formulario" type="text" id="filnome" name="filnome" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="filcnpj">CNPJ:</label>
                       <input class="label_formulario" type="text" id="filcnpj" name="filcnpj" size="50"/>
                    </div>';
        $sHTML .= '<div class="field">
                       <label for="filcep">Cep:</label>
                       <input class="label_formulario" type="text" id="filcep" name="filcep" size="50"/>
                    </div>';
        $sHTML .= '<div class="field">
                       <label for="filendereco">Endereço:</label>
                       <input class="label_formulario" type="text" id="filendereco" name="filendereco" size="50"/>
                    </div>';
        $sHTML .= '<div class="field">
                       <label for="filbairro">Bairro:</label>
                       <input class="label_formulario" type="text" id="filbairro" name="filbairro" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="filestado">Estado:</label>
                       <input class="label_formulario" type="text" id="filestado" name="filestado" size="50"/>
                    </div>';
        $sHTML .= '<div class="field">
                       <label for="filmunicipio">Municipio:</label>
                       <input class="label_formulario" type="text" id="filmunicipio" name="filmunicipio" size="50"/>
                     </div>';
        $sHTML .= '<div class="botaoAcao">
                        <input type="button" value="Gravar" onclick="validaFormFilial()"/>
                        <input type="reset" value="Limpar"/>
                   </div>';
        $sHTML .= '</form>';
        $sHTML .= '</td></tr></table>';
        echo $sHTML;
    }

}
