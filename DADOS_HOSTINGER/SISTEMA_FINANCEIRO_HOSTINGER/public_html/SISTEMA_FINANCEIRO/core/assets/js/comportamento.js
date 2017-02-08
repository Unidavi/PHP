function invokeFormulario(sPagina, sAcao, xChave) {
    var oForm = document.createElement('form');
    oForm.setAttribute('action', '?pagina=' + sPagina + '&acao=' + sAcao + '&chave=' + xChave);
    oForm.setAttribute('method', 'POST');
    oForm.submit();
}
/*
 -------------------
 |MODULO CADASTROS |
 -------------------
 */

/*
 ---------------------
 |MODULO FATURAMENTO |
 ---------------------
 */

/*
 --------------------
 |MODULO FINANCEIRO |
 --------------------
 */

/*
 -----------------
 |MODULO COMPRAS |
 -----------------
 */

/*
 --------------------
 |MODULO RELATORIOS |
 --------------------
 */

/*
 ----------------------
 |MODULO CONFIGURACAO |
 ----------------------
 */

function alteraFilial(iCodigo, sNome, sEndereco, sCep, sBairro, sEstado, sMunicipio, sCnpj) {
    document.getElementById('filcodigo').value = iCodigo;
    document.getElementById('filnome').value = sNome;
    document.getElementById('filendereco').value = sEndereco;
    document.getElementById('filcep').value = sCep;
    document.getElementById('filbairro').value = sBairro;
    document.getElementById('filestado').value = sEstado;
    document.getElementById('filmunicipio').value = sMunicipio;
    document.getElementById('filcnpj').value = sCnpj;
}
function excluiFilial(iCodigo) {
    if (window.confirm("Deseja apagar o registro?")) {
        document.getElementById('filcodigo').value = iCodigo;
        document.getElementById('acao').value = 'del';
        document.getElementById('formularioFilial').submit();
    }
}
function validaFormFilial() {
    /*
     var oCodigo = document.getElementById('filfcodigo').value;
     var oNome = document.getElementById('filtitulo').value;
     var oTrailer = document.getElementById('filtrailer').value;
     var oDataEstreia = document.getElementById('fildataestreia').value;
     var oCategoria = document.getElementById('catcodigo').value;
     var oSinopse = document.getElementById('filsinopse').value;
     if (oCodigo === '') {
     alert('Preencha o código!');
     return false;
     } else if (oNome === '') {
     alert('Preencha o nome!');
     return false;
     } else if (oTrailer === '') {
     alert('Preencha o trailer!');
     return false;
     } else if (oDataEstreia === '') {
     alert('Preencha a data de estreia!');
     return false;
     } else if (oCategoria === '') {
     alert('Preencha a categoria!');
     return false;
     } else if (oSinopse === '') {
     alert('Preencha a sinopse!');
     return false;
     } else {
     document.getElementById('formularioFilial').submit();
     }
     */
    document.getElementById('formularioFilial').submit();
}

function alteraGrupoUsuario(iCodigo, sNome, sFilial) {
    document.getElementById('cd_grupo').value = iCodigo;
    document.getElementById('ds_grupo').value = sNome;

    var oCodigoGrupoUsuario = document.getElementById('filcodigo');
    oCodigoGrupoUsuario.value = iCodigo;
    oCodigoGrupoUsuario.options[oCodigoGrupoUsuario.selectedIndex].text = sFilial;
}
function excluiGrupoUsuario(iCodigo) {
    if (window.confirm("Deseja apagar o registro?")) {
        document.getElementById('cd_usuario').value = iCodigo;
        document.getElementById('acao').value = 'del';
        document.getElementById('formularioGrupoUsuario').submit();
    }
}
function validaGrupoUsuario() {
    var oCodigo = document.getElementById('cd_grupo').value;
    var oNome = document.getElementById('ds_grupo').value;
    if (oCodigo === '') {
        //alert('Preencha o Código!');
       // return false;
       oCodigo.value = 5;
    } else if (oNome === '') {
        alert('Preencha o Nome!');
        return false;
    } else {
        document.getElementById('formularioGrupoUsuario').submit();
    }
}

function alteraUsuario(iCodigo, sLogin, sUsuario, sSenha, iGrupoUsuario, sGrupoUsuario, iFilial, sFilial, iAtivo) {
    document.getElementById('cd_usuario').value = iCodigo;
    document.getElementById('ds_login').value = sLogin;
    document.getElementById('ds_usuario').value = sUsuario;
    document.getElementById('ds_senha').value = sSenha;

    var oCodigoGrupoUsuario = document.getElementById('cd_grupo');
    oCodigoGrupoUsuario.value = iGrupoUsuario;
    oCodigoGrupoUsuario.options[oCodigoGrupoUsuario.selectedIndex].text = sGrupoUsuario;

    var oCodigoFilial = document.getElementById('cd_filial');
    oCodigoFilial.value = iFilial;
    oCodigoFilial.options[oCodigoFilial.selectedIndex].text = sFilial;

    oAtivo = document.getElementById('fg_ativo');
    if ((iAtivo) == 1) {
        oAtivo.setAttribute('value', 'unchecked');
    } else if ((iAtivo) == 0) {
        oAtivo.setAttribute('value', 'checked');
    }
}
function excluiUsuario(iCodigo) {
    if (window.confirm("Deseja apagar o registro?")) {
        document.getElementById('cd_usuario').value = iCodigo;
        document.getElementById('acao').value = 'del';
        document.getElementById('formularioUsuario').submit();
    }
}
function validaCheckbox() {
    var oAtivo = document.getElementById('fg_ativo');
    if ((oAtivo.value) === 'on') {
        oAtivo.setAttribute('value', 'unchecked');
    } else {
        oAtivo.setAttribute('value', 'checked');
    }

    var oAtivo = document.getElementById('fg_ativo').value;
    if (oAtivo == 'checked') {
        document.getElementById('ativo').value = 1;
    } else if (oAtivo == 'unchecked') {
        document.getElementById('ativo').value = 0;
    }
}
function validaFormUsuario() {
    /*
     var oCodigo = document.getElementById('filfcodigo').value;
     var oNome = document.getElementById('filtitulo').value;
     var oTrailer = document.getElementById('filtrailer').value;
     var oDataEstreia = document.getElementById('fildataestreia').value;
     var oCategoria = document.getElementById('catcodigo').value;
     var oSinopse = document.getElementById('filsinopse').value;
     if (oCodigo === '') {
     alert('Preencha o código!');
     return false;
     } else if (oNome === '') {
     alert('Preencha o nome!');
     return false;
     } else if (oTrailer === '') {
     alert('Preencha o trailer!');
     return false;
     } else if (oDataEstreia === '') {
     alert('Preencha a data de estreia!');
     return false;
     } else if (oCategoria === '') {
     alert('Preencha a categoria!');
     return false;
     } else if (oSinopse === '') {
     alert('Preencha a sinopse!');
     return false;
     } else {
     document.getElementById('formularioFilial').submit();
     }
     */
    document.getElementById('formularioUsuario').submit();
}

/*
 ------------------
 |MODULO DE TESTES |
 ------------------
 */
function alteraCategoria(iCodigo, sNome) {
    document.getElementById('catcodigo').value = iCodigo;
    document.getElementById('catnome').value = sNome;
    var labelNome = document.getElementById('idlabel_mensagem');
    labelNome.innerHTML = 'Pressione o botao Gravar para finalizar a operacao de Alteracao!';
}
function excluiCategoria(iCodigo) {
    if (window.confirm("Deseja apagar o registro?")) {
        document.getElementById('catcodigo').value = iCodigo;
        document.getElementById('acao').value = 'del';
        document.getElementById('formularioCategoria').submit();
    }
}
function alteraAtor(iCodigo, sNome) {
    document.getElementById('atocodigo').value = iCodigo;
    document.getElementById('atonome').value = sNome;
    var labelNome = document.getElementById('idlabel_mensagem');
    labelNome.innerHTML = 'Pressione o botao Gravar para finalizar a operacao de Alteracao!';
}
function excluiAtor(iCodigo) {
    if (window.confirm("Deseja apagar o registro?")) {
        document.getElementById('atocodigo').value = iCodigo;
        document.getElementById('acao').value = 'del';
        document.getElementById('formularioAtor').submit();
    }
}
function alteraFilme(iCodigo, sNome, sSinopse, sDataEstreia, sTrailer, iCodigoCategoria, sNomeCategoria) {
    document.getElementById('filcodigo').value = iCodigo;
    document.getElementById('filtitulo').value = sNome;
    document.getElementById('filsinopse').value = sSinopse;
    document.getElementById('fildataestreia').value = sDataEstreia;
    document.getElementById('filtrailer').value = sTrailer;
    var oCodigoCategoria = document.getElementById('catcodigo');
    oCodigoCategoria.value = iCodigoCategoria;
    oCodigoCategoria.options[oCodigoCategoria.selectedIndex].text = sNomeCategoria;
    var labelNome = document.getElementById('idlabel_mensagem');
    labelNome.innerHTML = 'Selecione a Categoria antes de pressionar o botao Gravar!';
}
function excluiFilme(iCodigo) {
    if (window.confirm("Deseja apagar o registro?")) {
        document.getElementById('filcodigo').value = iCodigo;
        document.getElementById('acao').value = 'del';
        document.getElementById('formularioFilme').submit();
    }
}
function alteraFilmeAtor(sPapelAtor, sTituloFilme, sNomeAtor, iCodigoAtor, iCodigoFilme) {
    var oCodigoAtor = document.getElementById('atocodigo');
    oCodigoAtor.value = iCodigoAtor;
    oCodigoAtor.options[oCodigoAtor.selectedIndex].text = sNomeAtor;
    var oCodigoFilme = document.getElementById('filcodigo');
    oCodigoFilme.value = iCodigoFilme;
    oCodigoFilme.options[oCodigoFilme.selectedIndex].text = sTituloFilme;
    document.getElementById('atfpapel').value = sPapelAtor;
    var labelNome = document.getElementById('idlabel_mensagem');
    labelNome.innerHTML = 'Pressionar o botao Gravar para efetuar a operacao!';
}
function excluiFilmeAtor(filmeCodigo, AtorCodigo) {
    if (window.confirm("Deseja apagar o registro?")) {
        document.getElementById('filcodigo').value = filmeCodigo;
        document.getElementById('atocodigo').value = AtorCodigo;
        document.getElementById('acao').value = 'del';
        document.getElementById('formularioFilmeAtor').submit();
    }
}
function validaFormAtor() {
    var oCodigo = document.getElementById('atocodigo').value;
    var oNome = document.getElementById('atonome').value;
    if (oCodigo === '') {
        alert('Preencha o código!');
        return false;
    } else if (oNome === '') {
        alert('Preencha o nome!');
        return false;
    } else {
        document.getElementById('formularioAtor').submit();
    }
}
function validaFormCategoria() {
    var oCodigo = document.getElementById('catcodigo').value;
    var oNome = document.getElementById('catnome').value;
    if (oCodigo === '') {
        alert('Preencha o código!');
        return false;
    } else if (oNome === '') {
        alert('Preencha o nome!');
        return false;
    } else {
        document.getElementById('formularioCategoria').submit();
    }
}
function validaFormFilme() {
    var oCodigo = document.getElementById('filcodigo').value;
    var oNome = document.getElementById('filtitulo').value;
    var oTrailer = document.getElementById('filtrailer').value;
    var oDataEstreia = document.getElementById('fildataestreia').value;
    var oCategoria = document.getElementById('catcodigo').value;
    var oSinopse = document.getElementById('filsinopse').value;
    if (oCodigo === '') {
        alert('Preencha o código!');
        return false;
    } else if (oNome === '') {
        alert('Preencha o nome!');
        return false;
    } else if (oTrailer === '') {
        alert('Preencha o trailer!');
        return false;
    } else if (oDataEstreia === '') {
        alert('Preencha a data de estreia!');
        return false;
    } else if (oCategoria === '') {
        alert('Preencha a categoria!');
        return false;
    } else if (oSinopse === '') {
        alert('Preencha a sinopse!');
        return false;
    } else {
        document.getElementById('formularioFilme').submit();
    }
}
function validaFormFilmeAtor() {
    var oPapel = document.getElementById('atfpapel').value;
    if (oPapel === '') {
        alert('Preencha papel!');
        return false;
    } else {
        document.getElementById('formularioFilmeAtor').submit();
    }
}