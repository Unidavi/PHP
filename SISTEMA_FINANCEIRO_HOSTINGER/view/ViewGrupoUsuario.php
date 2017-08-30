<?php

class ViewGrupoUsuario extends ViewPadrao {

    /**
     * @var ModelGrupoUsuario
     */
    protected $Model;
    protected $listaFilial;

    function getModel() {
        return $this->Model;
    }

    function getListaFilial() {
        return $this->listaFilial;
    }

    function setModel(ModelGrupoUsuario $Model) {
        $this->Model = $Model;
    }

    function setListaFilial($listaFilial) {
        $this->listaFilial = $listaFilial;
    }

    public function montaTitulo() {
        $sHTML = '';
        $sHTML .= '<h4>Cadastro de Grupos de Usuarios</h4>';
        echo $sHTML;
    }

    public function montaConsulta() {
        $sHTML = '';
        $sHTML .= '<table class="tabela_consulta">';
        $sHTML .= '<tr><th colspan="4">Lista de Grupos de Usuarios Cadastrados</th><tr>';
        $sHTML .= '<tr>';
        $sHTML .= '<th>Código</th>';
        $sHTML .= '<th>Descrição</th>';
        $sHTML .= '<th>Filial</th>';
        $sHTML .= '<th colspan="2">Ações</th>';
        $sHTML .= '</tr>';
        if (count($this->listaModel) > 0) {
            foreach ($this->listaModel as $indice => /* @var $oModelGrupoUsuario ModelGrupoUsuario */ $oModelGrupoUsuario) {
                $sHTML.= '<tr>';
                $sHTML.= '<td>' . $oModelGrupoUsuario->getCd_grupo() . '</td>';
                $sHTML.= '<td>' . $oModelGrupoUsuario->getDs_grupo() . '</td>';
                $sHTML .='<td>' . $oModelGrupoUsuario->getModelFilial()->getFilnome() . '</td>';
                $sHTML.= '<td>';
                $sHTML .= '<a href="#"><input class="button" id="botaoAlterar" type="button" value="Alterar" onclick="alteraGrupoUsuario('
                        . '  ' . $oModelGrupoUsuario->getCd_grupo() . ','
                        . '\'' . $oModelGrupoUsuario->getDs_grupo() . '\','
                        . '\'' . $oModelGrupoUsuario->getModelFilial()->getFilnome() . '\''
                        . ')"/></a>';
                $sHTML .= '<input class="button" id="botaoExcluir" type="button" value="Excluir" onclick="excluiGrupoUsuario(' . $oModelGrupoUsuario->getCd_grupo() . ')"/>';
                $sHTML.= '</td>';
                $sHTML.= '</tr>';
            }
        } else {
            $sHTML .= '<tr><td colspan="2" >Nenhum Grupo de Usuario Cadastrado</td></tr>';
        }
        $sHTML .= '</table>';
        $sHTML .= '<hr>';
        echo $sHTML;
    }

    public function montaFormulario() {
        $sHTML = '';
        $sHTML .= '<table class="FormularioCadastro"><tr><td>';
        $sHTML .= '<form method="POST" action="index.php?pagina=GrupoUsuario" id="formularioGrupoUsuario">';
        $sHTML .= '<input type="hidden" name="acao" id="acao" value="inc"/>';
        $sHTML .= '<div class="field">
                       <label for="cd_grupo">Código:</label>
                       <input class="label_formulario" type="text" id="cd_grupo" name="cd_grupo" size="5"/>
                    </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_grupo">Nome:</label>
                       <input class="label_formulario" type="text" id="ds_grupo" name="ds_grupo" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="filcodigo" >Filial:</label>
                            <select class="label_formulario" name="filcodigo" id="filcodigo">';
        $sHTML.= '<option class="label_formulario" value="0">';
        $sHTML.= 'Selecione a Filial...';
        $sHTML.= '</option>';
        if (count($this->listaFilial) > 0) {
            foreach ($this->listaFilial as $indice => /* @var $oModelFilial ModelFilial */ $oModelFilial) {
                $sHTML.= '<option class="label_formulario" value="' . $oModelFilial->getFilcodigo() . '">';
                $sHTML.=$oModelFilial->getFilnome();
                $sHTML.= '</option>';
            }
        } else {
            $sHTML .= '<option>Não existe filial cadastrada</option>';
        }
        $sHTML .='</select></div>';
        $sHTML .= '<div class="botaoAcao">
                        <input type="button" value="Gravar" onclick="validaGrupoUsuario()"/>
                        <input type="reset" value="Limpar"/>
                   </div>';
        $sHTML .= '</form>';
        $sHTML .= '</td></tr></table>';
        echo $sHTML;
    }

}
