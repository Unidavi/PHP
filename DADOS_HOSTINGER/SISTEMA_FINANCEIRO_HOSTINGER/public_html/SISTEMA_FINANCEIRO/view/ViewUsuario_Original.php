<?php

class ViewUsuario extends ViewPadrao {

    /**
     * @var ModelUsuario
     */
    protected $Model;
    protected $listaFilial;
    protected $listaGrupoUsuario;

    function getListaGrupoUsuario() {
        return $this->listaGrupoUsuario;
    }

    function setListaGrupoUsuario($listaGrupoUsuario) {
        $this->listaGrupoUsuario = $listaGrupoUsuario;
    }

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
        $sHTML .= '<h4><p>Cadastro de Usuarios</p></h4>';
        echo $sHTML;
    }

    public function montaConsulta() {
        $sHTML = '';
        $sHTML .= '<hr>';
        $sHTML .= '<h4><p>Lista de Usuarios cadastrados</p></h4>';
        $sHTML .= '<table class="tabela_consulta">';
        $sHTML .= '<tr>';
        $sHTML .= '<th>Código</th>';
        $sHTML .= '<th>Descrição</th>';
        $sHTML .= '<th>Usuario</th>';
        $sHTML .= '<th>Senha</th>';
        $sHTML .= '<th>Grupo de Usuario</th>';
        $sHTML .= '<th>Filial</th>';
        $sHTML .= '<th colspan="2">Ações</th>';
        $sHTML .= '</tr>';
        if (count($this->listaModel) > 0) {
            foreach ($this->listaModel as $indice => /* @var $oModelUsuario ModelUsuario */ $oModelUsuario) {
                $sHTML.= '<tr>';
                $sHTML.= '<td>' . $oModelUsuario->getCd_usuario() . '</td>';
                $sHTML.= '<td>' . $oModelUsuario->getDs_login() . '</td>';
                $sHTML .='<td>' . $oModelUsuario->getDs_usuario() . '</td>';
                $sHTML.= '<td>' . $oModelUsuario->getDs_senha() . '</td>';
                $sHTML .='<td>' . $oModelUsuario->getModelGrupoUsuario()->getDs_grupo() . '</td>';
                $sHTML .='<td>' . $oModelUsuario->getModelFilial()->getFilnome() . '</td>';
                $sHTML.= '<td>' . $oModelUsuario->getFg_ativo() . '</td>';

                $sHTML.= '<td>';
                //(iCodigo, sLogin, sUsuario, sSenha, sGrupoUsuario, iGrupoUsuario, sFilial, iFilial, sAtivo) {
                $sHTML .= '<a href="#"><input class="button" id="botaoAlterar" type="button" value="Alterar" onclick="alteraUsuario('
                        . '  ' . $oModelUsuario->getCd_usuario() . ','
                        . '\'' . $oModelUsuario->getDs_login() . '\','
                        . '\'' . $oModelUsuario->getDs_usuario() . '\','
                        . '\'' . $oModelUsuario->getDs_senha() . '\','
                        . '  ' . $oModelUsuario->getModelGrupoUsuario()->getCd_grupo() . ','
                        . '\'' . $oModelUsuario->getModelGrupoUsuario()->getDs_grupo() . '\','
                        . '  ' . $oModelUsuario->getModelFilial()->getFilcodigo() . ','
                        . '\'' . $oModelUsuario->getModelFilial()->getFilnome() . '\','
                        . '  ' . $oModelUsuario->getFg_ativo() . ''
                        . ')"/></a>';
                $sHTML .= '<input class="button" id="botaoExcluir" type="button" value="Excluir" onclick="excluiUsuario(' . $oModelUsuario->getCd_usuario() . ')"/>';
                $sHTML.= '</td>';
                $sHTML.= '</tr>';
            }
        } else {
            $sHTML .= '<tr><td colspan="2" >Nenhum Usuario Cadastrado</td></tr>';
        }
        $sHTML .= '</table>';
        $sHTML .= '<hr>';
        echo $sHTML;
    }

    public function montaFormulario() {
        $sHTML = '';
        $sHTML .= '<table class="FormularioCadastro"><tr><td>';
        $sHTML .= '<form method="POST" action="index.php?pagina=Usuario" id="formularioUsuario">';
        $sHTML .= '<input type="hidden" name="acao" id="acao" value="inc"/>';
        $sHTML .= '<input type="hidden" name="ativo" id="ativo" value="1"/>';
        $sHTML .= '<div class="field">
                    <label for="fg_ativo">Ativo:</label>
                    <input type="checkbox" id="fg_ativo" name="fg_ativo" checked onclick="validaCheckbox()">
                    </div>';
        $sHTML .= '<div class="field">
                       <label for="cd_usuario">Código:</label>
                       <input class="label_formulario" type="text" id="cd_usuario" name="cd_usuario" size="5"/>
                    </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_login">Login:</label>
                       <input class="label_formulario" type="text" id="ds_login" name="ds_login" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_senha">Senha:</label>
                       <input class="label_formulario" type="password" id="ds_senha" name="ds_senha" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_usuario">Usuario:</label>
                       <input class="label_formulario" type="text" id="ds_usuario" name="ds_usuario" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="cd_grupo" >Grupo Usuario:</label>
                            <select class="label_formulario" name="cd_grupo" id="cd_grupo" >';
        $sHTML.= '<option class="label_formulario" value="0">';
        $sHTML.= 'Selecione Grupo de Usuario...';
        $sHTML.= '</option>';
        if (count($this->listaGrupoUsuario) > 0) {
            foreach ($this->listaGrupoUsuario as $indice => /* @var $oModelGrupoUsuario ModelGrupoUsuario */ $oModelGrupoUsuario) {
                $sHTML.= '<option class="label_formulario" value="' . $oModelGrupoUsuario->getCd_grupo() . '">';
                $sHTML.= $oModelGrupoUsuario->getCd_grupo() . ' - ' . $oModelGrupoUsuario->getDs_grupo();
                $sHTML.= '</option>';
            }
        } else {
            $sHTML .= '<option>Não existe grupo de usuario cadastrado</option>';
        }
        $sHTML .='</select></div>';
        $sHTML .= '<div class="field">
                       <label for="cd_filial" >Filial:</label>
                            <select class="label_formulario" name="cd_filial" id="cd_filial">';
        $sHTML.= '<option class="label_formulario" value="0">';
        $sHTML.= 'Selecione Filial...';
        $sHTML.= '</option>';
        if (count($this->listaFilial) > 0) {
            foreach ($this->listaFilial as $indice => /* @var $oModelFilial ModelFilial */ $oModelFilial) {
                $sHTML.= '<option class="label_formulario" value="' . $oModelFilial->getFilcodigo() . '">';
                $sHTML.=$oModelFilial->getFilcodigo() . ' - ' . $oModelFilial->getFilnome();
                $sHTML.= '</option>';
            }
        } else {
            $sHTML .= '<option>Não existe filial cadastrada</option>';
        }
        $sHTML .='</select></div>';
        $sHTML .= '<div class="botaoAcao">
                        <input type="button" value="Gravar" onclick="validaFormUsuario()"/>
                        <input type="reset" value="Limpar"/>
                   </div>';
        $sHTML .= '</form>';
        $sHTML .= '</td></tr></table>';
        echo $sHTML;
    }

}
