<?php

class PersistenciaUsuario extends PersistenciaPadrao {

    /**  @var ModelUsuario */
    protected $Model;

    public function insere() {
        $sSql = "INSERT INTO configuracao.tbusuario(cd_usuario,ds_login,ds_usuario,ds_senha,cd_grupo_usuario,dt_alt,hr_alt,dt_cad,hr_cad,cd_filial,fg_ativo) values("
                . " " . $this->Model->getCd_usuario() . ","
                . "'" . $this->Model->getDs_login() . "',"
                . "'" . $this->Model->getDs_usuario() . "',"
                . "'" . $this->Model->getDs_senha() . "',"
                . "'" . $this->Model->getModelGrupoUsuario() . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "'" . "01/01/2016" . "',"
                . "'" . "08:00:23" . "',"
                . "" . $this->Model->getModelFilial() . ","
                . "" . $this->Model->getFg_ativo() . ""
                . ")";
        $this->getQuery()->query($sSql);
    }

    public function altera() {
        $sSql = "UPDATE configuracao.tbusuario SET "
                . " ds_login='" . $this->Model->getDs_login() . "',"
                . " ds_usuario='" . $this->Model->getDs_usuario() . "',"
                . " ds_senha='" . $this->Model->getDs_senha() . "',"
                . " cd_grupo_usuario=" . $this->Model->getModelGrupoUsuario() . ","
                . " dt_alt=   " . "'" . "01/01/2016" . "',"
                . " hr_alt=   " . "'" . "08:00:23" . "',"
                . " cd_filial=" . " " . $this->Model->getModelFilial() . ","
                . " fg_ativo= " . " " . $this->Model->getFg_ativo() . ""
                . " WHERE "
                . " cd_usuario=" . $this->Model->getCd_usuario();
        $this->getQuery()->query($sSql);
    }

    public function exclui() {
        $sSql = "DELETE FROM CONFIGURACAO.TBUSUARIO WHERE CD_USUARIO=" . $this->Model->getCd_usuario();
        $this->getQuery()->query($sSql);
    }

    public function get() {
        $aUsuarios = Array();
        $sSql = "  SELECT                                                                                    "
                . "    CONFIGURACAO.TBUSUARIO.*,                                                             "
                . "    CONFIGURACAO.TBFILIAL.*,                                                              "
                . "    CONFIGURACAO.TBGRUPO_USUARIO.*                                                        "
                . "FROM                                                                                      "
                . "    CONFIGURACAO.TBUSUARIO                                                                "
                . "INNER  JOIN CONFIGURACAO.TBFILIAL ON                                                      "
                . "    CONFIGURACAO.TBUSUARIO.CD_FILIAL=CONFIGURACAO.TBFILIAL.FILCODIGO                      "
                . "                                                                                          "
                . "INNER JOIN CONFIGURACAO.TBGRUPO_USUARIO ON                                                "
                . "    CONFIGURACAO.TBUSUARIO.CD_FILIAL=CONFIGURACAO.TBGRUPO_USUARIO.CD_FILIAL               "
                . "AND                                                                                       "
                . "    CONFIGURACAO.TBUSUARIO.CD_GRUPO_USUARIO=CONFIGURACAO.TBGRUPO_USUARIO.CD_GRUPO_USUARIO "
                . "WHERE                                                                                     "
                . "    CD_USUARIO=" . $this->Model->getCd_usuario();

        $aUsuariosBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aUsuariosBanco as $aValor) {
            $oModelUsuario = $this->getModelFromDb($aValor);
            $aUsuarios [] = $oModelUsuario;
        }
        return $aUsuarios;
    }

    public function getAll() {
        $aUsuarios = Array();
        $sSql = "  SELECT                                                                           "
                . "    CONFIGURACAO.TBUSUARIO.*,                                                    "
                . "    CONFIGURACAO.TBFILIAL.*,                                                     "
                . "    CONFIGURACAO.TBGRUPO_USUARIO.*                                               "
                . "FROM                                                                             "
                . "    CONFIGURACAO.TBUSUARIO                                                       "
                . "INNER  JOIN CONFIGURACAO.TBFILIAL ON                                             "
                . "    CONFIGURACAO.TBUSUARIO.CD_FILIAL=CONFIGURACAO.TBFILIAL.FILCODIGO             "
                . "                                                                                 "
                . "INNER JOIN CONFIGURACAO.TBGRUPO_USUARIO ON                                       "
                . "    CONFIGURACAO.TBUSUARIO.CD_FILIAL=CONFIGURACAO.TBGRUPO_USUARIO.CD_FILIAL      "
                . "AND                                                                              "
                . "    CONFIGURACAO.TBUSUARIO.CD_GRUPO_USUARIO =CONFIGURACAO.TBGRUPO_USUARIO.CD_GRUPO_USUARIO"
                . " ORDER BY 1                                                                       ";
                
        $aUsuariosBanco = $this->getQuery()->selectAll($sSql);
        foreach ($aUsuariosBanco as $aValor) {
            $oModelUsuario = $this->getModelFromDb($aValor);
            $aUsuarios [] = $oModelUsuario;
        }
        return $aUsuarios;
    }

    public function getModelFromDb($aValor) {
        $oModelUsuario = new ModelUsuario();
        $oModelUsuario->setCd_usuario($aValor['cd_usuario']);
        $oModelUsuario->setDs_login($aValor['ds_login']);
        $oModelUsuario->setDs_senha($aValor['ds_senha']);
        $oModelUsuario->setDs_usuario($aValor['ds_usuario']);
        $oModelUsuario->setFg_ativo($aValor['fg_ativo']);

        $oModeloGrupoUsuario = new ModelGrupoUsuario();
        $oModeloGrupoUsuario->setCd_grupo($aValor['cd_grupo_usuario']);
        $oModeloGrupoUsuario->setDs_grupo($aValor['ds_grupo']);
        $oModelUsuario->setModelGrupoUsuario($oModeloGrupoUsuario);

        $oModelFilial = new ModelFilial();
        $oModelFilial->setFilcodigo($aValor['filcodigo']);
        $oModelFilial->setFilnome($aValor['filnome']);
        $oModelUsuario->setModelFilial($oModelFilial);

        return $oModelUsuario;
    }

}
