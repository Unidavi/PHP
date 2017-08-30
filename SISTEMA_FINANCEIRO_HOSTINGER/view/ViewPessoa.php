<?php

class ViewPessoa extends ViewPadrao {

    /**
     * @var ModelPessoa
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
        $sHTML .= '<h4><p>Cadastro de Pessoas</p></h4>';
        echo $sHTML;
    }

    public function montaConsulta() {
        $sHTML = '';
        $sHTML .= '<table class="tabela_consulta">';
        $sHTML .= '<tr><th colspan="12">Lista de Pessoas cadastradas</th><tr>';        
        $sHTML .= '<tr>';
        $sHTML .= '<th>Código</th>';
        $sHTML .= '<th>Nome</th>';
        $sHTML .= '<th>Endereco</th>';
        $sHTML .= '<th>E-mail</th>';

        $sHTML .= '<th>Telefone</th>';
        $sHTML .= '<th>CPF</th>';
        $sHTML .= '<th>Bairro</th>';
        $sHTML .= '<th>Estado</th>';
        $sHTML .= '<th>Cidade</th>';

        $sHTML .= '<th>Grupo de Usuario</th>';
        $sHTML .= '<th>Filial</th>';
        $sHTML .= '<th colspan="2">Ações</th>';
        $sHTML .= '</tr>';
        if (count($this->listaModel) > 0) {
            foreach ($this->listaModel as $indice => /* @var $oModelPessoa ModelPessoa */ $oModelPessoa) {
                $sHTML.= '<tr>';
                $sHTML.= '<td>' . $oModelPessoa->getCd_pessoa() . '</td>';
                $sHTML.= '<td>' . $oModelPessoa->getNm_pessoa() . '</td>';
                $sHTML .='<td>' . $oModelPessoa->getDs_endereco() . '</td>';
                $sHTML.= '<td>' . $oModelPessoa->getDs_email() . '</td>';
                $sHTML.= '<td>' . $oModelPessoa->getNr_telefone() . '</td>';
                $sHTML.= '<td>' . $oModelPessoa->getCd_cpf() . '</td>';
                $sHTML.= '<td>' . $oModelPessoa->getDs_bairro() . '</td>';
                $sHTML .='<td>' . $oModelPessoa->getDs_estado() . '</td>';
                $sHTML.= '<td>' . $oModelPessoa->getDs_cidade() . '</td>';
                $sHTML .='<td>' . $oModelPessoa->getModelGrupoUsuario()->getDs_grupo() . '</td>';
                $sHTML .='<td>' . $oModelPessoa->getModelFilial()->getFilnome() . '</td>';
                $sHTML.= '<td>' . $oModelPessoa->getFg_ativo() . '</td>';

                $sHTML.= '<td>';
                //(iCodigo, sLogin, sUsuario, sSenha, sGrupoUsuario, iGrupoUsuario, sFilial, iFilial, sAtivo) {
                $sHTML .= '<a href="#"><input class="button" id="botaoAlterar" type="button" value="Alterar" onclick="alteraUsuario('
                        . '  ' . $oModelUsuario->getCd_usuario() . ','
                        . '\'' . $oModelUsuario->getDs_login() . '\','
                        . '  ' . $oModelUsuario->getFg_ativo() . ''
                        . ')"/></a>';
                $sHTML .= '<input class="button" id="botaoExcluir" type="button" value="Excluir" onclick="excluiUsuario(' . $oModelUsuario->getCd_usuario() . ')"/>';
                $sHTML.= '</td>';
                $sHTML.= '</tr>';
            }
        } else {
            $sHTML .= '<tr><td colspan="2" >Nenhuma Pessoa Cadastrada</td></tr>';
        }
        $sHTML .= '</table>';
        $sHTML .= '<hr>';
        echo $sHTML;
    }

    public function montaFormulario() {
        $sHTML = '';
        $sHTML .= '<table class="FormularioCadastro"><tr><td>';
        $sHTML .= '<form method="POST" action="index.php?pagina=Pessoa" id="formularioPessoa">';
        $sHTML .= '<input type="hidden" name="acao" id="acao" value="inc"/>';
        $sHTML .= '<input type="hidden" name="ativo" id="ativo" value="1"/>';
        $sHTML .= '<div class="field">
                        <label for="fg_ativo">Ativo:</label>
                        <input type="checkbox" id="fg_ativo" name="fg_ativo" checked onclick="validaCheckbox()">                                     
                  </div>';
        $sHTML .= '<div class="field">
                        <label for="cd_pessoa">Código:</label>
                        <input class="label_formulario" type="text" id="cd_pessoa" name="cd_pessoa" size="5"/>
                   </div>';
        $sHTML .= '<div class="field">
                       <label for="nm_pessoa">Nome:</label>
                       <input class="label_formulario" type="text" id="nm_pessoa" name="nm_pessoa" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_endereco">Endereço:</label>
                       <input class="label_formulario" type="text" id="ds_endereco" name="ds_endereco" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_email">E-mail:</label>
                       <input class="label_formulario" type="text" id="ds_email" name="ds_email" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="nr_telefone">Telefone:</label>
                       <input class="label_formulario" type="text" id="nr_telefone" name="nr_telefone" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="cd_cpf">CPF:</label>
                       <input class="label_formulario" type="text" id="cd_cpf" name="cd_cpf" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_bairro">Bairro:</label>
                       <input class="label_formulario" type="text" id="ds_bairro" name="ds_bairro" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_estado">Estado:</label>
                       <input class="label_formulario" type="text" id="ds_estado" name="ds_estado" size="50"/>
                     </div>';
        $sHTML .= '<div class="field">
                       <label for="ds_cidade">Cidade:</label>
                       <input class="label_formulario" type="text" id="ds_cidade" name="ds_cidade" size="50"/>
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
