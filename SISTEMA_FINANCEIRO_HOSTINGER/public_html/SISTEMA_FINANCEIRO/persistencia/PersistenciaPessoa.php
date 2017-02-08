<?php

class PersistenciaPessoa extends PersistenciaPadrao {

    /**  @var ModelPessoa */
    protected $Model;

    /*
     *   cd_pessoa integer NOT NULL,
      nm_pessoa character varying(400),
      ds_endereco character varying(400),
      ds_email character varying(200),
      nr_telefone character varying(200),
      cd_cpf character varying(25),
      ds_bairro character varying(200),
      ds_estado character varying(2),
      ds_cidade integer,

      cd_filial integer NOT NULL,
      cd_usuario smallint NOT NULL,
      dt_alt date NOT NULL,
      hr_alt time without time zone NOT NULL,
      dt_cad date NOT NULL,
      hr_cad time without time zone NOT NULL
     */

    public function insere() {
        $sSql = "INSERT INTO cadastro.tbpessoa("
                . "cd_pessoa,"
                . "nm_pessoa,"
                . "ds_endereco,"
                . "ds_email,"
                . "nr_telefone,"
                . "cd_cpf,"
                . "ds_bairro,"
                . "ds_estado,"
                . "ds_cidade,"
                . "cd_filial,"
                . "cd_usuario,"
                . "dt_alt,"
                . "hr_alt,"
                . "dt_cad,"
                . "hr_cad,"
                . "fg_ativo) "
                . "values("
                . " " . $this->Model->getCd_pessoa() . ","
                . "'" . $this->Model->getNm_pessoa() . "',"
                . "'" . $this->Model->getDs_endereco() . "',"
                . "'" . $this->Model->getDs_email() . "',"
                . "'" . $this->Model->getNr_telefone() . "',"
                . "'" . $this->Model->getCd_cpf() . "',"
                . "'" . $this->Model->getDs_bairro() . "',"
                . "'" . $this->Model->getDs_estado() . "',"
                . "'" . $this->Model->getDs_cidade() . "',"
                . "" . $this->Model->getModelFilial() . ","
                . "'" . $this->Model->getModelGrupoUsuario() . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "" . $this->Model->getFg_ativo() . ""
                . ")";
        $this->getQuery()->query($sSql);
    }

    public function altera() {
        $sSql = "   UPDATE CADASTRO.TBPESSOA SET "
                . " NM_PESSOA=   '" . $this->MODEL->GETNM_PESSOA() . "',"
                . " DS_ENDERECO= '" . $this->MODEL->GETDS_ENDERECO() . "',"
                . " DS_EMAIL=    '" . $this->MODEL->GETDS_EMAIL() . "',"
                . " NR_TELEFONE= '" . $this->MODEL->GETNR_TELEFONE() . "',"
                . " CD_CPF=      '" . $this->MODEL->GETCD_CPF() . "',"
                . " DS_BAIRRO=   '" . $this->MODEL->GETDS_BAIRRO() . "',"
                . " DS_ESTADO=   '" . $this->MODEL->GETDS_ESTADO() . "',"
                . " DS_CIDADE=   '" . $this->MODEL->GETDS_CIDADE() . "',"
                . " CD_FILIAL=    " . $this->MODEL->GETMODELFILIAL() . ","
                . " CD_GRUPO=     " . $this->MODEL->GETMODELGRUPOUSUARIO() . ","
                . " DT_ALT=      '" . "01/01/2016" . "',"
                . " HR_ALT=      '" . "08:00:23" . "',"
                . " FG_ATIVO=     " . $this->MODEL->GETFG_ATIVO() . ""
                . " WHERE CD_PESSOA=" . $this->MODEL->GETCD_USUARIO();
        $sSql1 = "UPDATE cadastro.tbpessoa SET "
                . " nm_pessoa=   '" . $this->Model->getNm_pessoa() . "',"
                . " ds_endereco= '" . $this->Model->getDs_endereco() . "',"
                . " ds_email=    '" . $this->Model->getDs_email() . "',"
                . " nr_telefone= '" . $this->Model->getNr_telefone() . "',"
                . " cd_cpf=      '" . $this->Model->getCd_cpf() . "',"
                . " ds_bairro=   '" . $this->Model->getDs_bairro() . "',"
                . " ds_estado=   '" . $this->Mcidadeodel->getDs_estado() . "',"
                . " ds_cidade=   '" . $this->Model->getDs_cidade() . "',"
                . " cd_filial=    " . $this->Model->getModelFilial() . ","
                . " cd_grupo=     " . $this->Model->getModelGrupoUsuario() . ","
                . " dt_alt=      '" . "01/01/2016" . "',"
                . " hr_alt=      '" . "08:00:23" . "',"
                . " fg_ativo=     " . $this->Model->getFg_ativo() . ""
                . " WHERE cd_pessoa=" . $this->Model->getCd_usuario();
        $this->getQuery()->query($sSql);
    }

    public function exclui() {
        $sSql = "DELETE FROM CONFIGURACAO.TBPESSOA WHERE CD_PESSOA=" . $this->Model->getCd_usuario();
        $this->getQuery()->query($sSql);
    }

    public function get() {
        $aPessoas = Array();
        $sSql = "  SELECT                                                                "
                . "    CADASTRO.TBPESSOA.*,                                              "
                . "    CONFIGURACAO.TBFILIAL.*,                                          "
                . "    CONFIGURACAO.TBUSUARIO.*                                          "
                . "FROM                                                                  "
                . "    CADASTRO.TBPESSOA                                                 "
                . "INNER  JOIN CONFIGURACAO.TBFILIAL ON                                  "
                . "    CADASTRO.TBPESSOA.CD_FILIAL=CONFIGURACAO.TBFILIAL.FILCODIGO       "
                . "INNER JOIN CONFIGURACAO.TBUSUARIO ON                                  "
                . "    CADASTRO.TBPESSOA.CD_USUARIO=CONFIGURACAO.TBUSUARIO.CD_USUARIO    "
                . "WHERE                                                                 "
                . "    CD_PESSOA=" . $this->Model->getCd_usuario();

        $aPessoasBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aPessoasBanco as $aValor) {
            $oModelPessoa = $this->getModelFromDb($aValor);
            $aPessoas [] = $oModelPessoa;
        }
        return $aPessoas;
    }

    public function getAll() {
        $aPessoas = Array();
        $sSql = "  SELECT                                                                "
                . "    CADASTRO.TBPESSOA.*,                                              "
                . "    CONFIGURACAO.TBFILIAL.*,                                          "
                . "    CONFIGURACAO.TBUSUARIO.*                                          "
                . "FROM                                                                  "
                . "    CADASTRO.TBPESSOA                                                 "
                . "INNER  JOIN CONFIGURACAO.TBFILIAL ON                                  "
                . "    CADASTRO.TBPESSOA.CD_FILIAL=CONFIGURACAO.TBFILIAL.FILCODIGO       "
                . "INNER JOIN CONFIGURACAO.TBUSUARIO ON                                  "
                . "    CADASTRO.TBPESSOA.CD_USUARIO=CONFIGURACAO.TBUSUARIO.CD_USUARIO    "
                . "ORDER BY                                                              "
                . "    1                                                                 ";

        $aPessoasBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aPessoasBanco as $aValor) {
            $oModelPessoa = $this->getModelFromDb($aValor);
            $aPessoas [] = $oModelPessoa;
        }
        return $aPessoas;
    }

    public function getModelFromDb($aValor) {
        $oModelPessoa = new ModelPessoa();
        $oModelPessoa->setCd_pessoa($aValor['cd_pessoa']);
        $oModelPessoa->setNm_pessoa($aValor['nm_pessoa']);
        $oModelPessoa->setDs_endereco($aValor['ds_endereco']);
        $oModelPessoa->setDs_email($aValor['ds_email']);
        $oModelPessoa->setNr_telefone($aValor['nr_telefone']);
        $oModelPessoa->setCd_cpf($aValor['cd_cpf']);
        $oModelPessoa->setDs_bairro($aValor['ds_bairro']);
        $oModelPessoa->setDs_estado($aValor['ds_estado']);
        $oModelPessoa->setDs_cidade($aValor['ds_cidade']);

        $oModelUsuario = new ModelUsuario();
        $oModelUsuario->setCd_usuario($aValor['cd_usuario']);
        $oModelUsuario->setDs_login($aValor['ds_login']);
        $oModelUsuario->setDs_senha($aValor['ds_senha']);
        $oModelUsuario->setDs_usuario($aValor['ds_usuario']);
        $oModelUsuario->setFg_ativo($aValor['fg_ativo']);

        $oModelFilial = new ModelFilial();
        $oModelFilial->setFilcodigo($aValor['filcodigo']);
        $oModelFilial->setFilnome($aValor['filnome']);

        $this->setModel($oModelPessoa);
        $oModelPessoa->setModelFilial($oModelFilial);
        $oModelPessoa->setModelUsuario($oModelUsuario);

        return $oModelPessoa;
    }

}
